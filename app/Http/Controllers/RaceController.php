<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\RaceRegistered;
use App\Models\Order;
use App\Models\Promocode;
use App\Models\Race;
use App\Models\RaceForm;
use App\Models\RaceType;
use App\Rules\ReCaptchaV3;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use LiqPay;

class RaceController extends Controller
{
    /**
     * @param Race $raceModel
     * @param RaceType $raceTypeModel
     * @param RaceForm $raceFormModel
     */
    public function __construct(
        private Race $raceModel,
        private RaceType $raceTypeModel,
        private RaceForm $raceFormModel
    ) {
    }

    /**
     * @param Request $request
     * @return RedirectResponse|string
     * @throws ValidationException
     */
    public function register(Request $request): string|RedirectResponse
    {
        $this->validate($request, [
            'g-recaptcha-response' => ['required', new ReCaptchaV3('raceRegister', 0.6)]
        ]);

        $description = Race::query()->where('id', '=', $request->race_id)->first()->title
            . ' | ' . $request->name . ' | ' . $request->email . ' | ' . $request->distance . 'm' . ' | '
            . RaceType::query()->where('id', '=', $request->type_id)->first()->type_label;

        $price = $request->price;

        // if promocode entered - apply to price
        if ($request->has('code') && !empty($request->code)) {
            $code = $request->code;
            $promocode = Promocode::findByCode($code);
            $description .= ' | promo entered: ' . $code;

            if ($promocode && $promocode->isValid()) {
                $price = $promocode->applyTo($price);
                $request->merge([
                    'amount' => $price,
                    'price' => $price
                ]);
            }
        }

        $order = Order::query()->where('race_id', '=', $request->race_id)
            ->where('type_id', '=', $request->type_id)
            ->orderBy('id', 'desc')
            ->first();

        if ($order) {
            $request->merge(['number' => ++$order->number]);
        } else {
            $raceForm = RaceForm::query()->where('race_id', '=', $request->race_id)
                ->where('type_id', '=', $request->type_id)
                ->first();
            $request->merge(['number' => $raceForm->number_starts_from]);
        }

        // create order with unpaid status
        $newOrder = Order::createFromRequest($request);

        if ($price) {
            $paymentRequest = [
                'public_key' => config('liqpay.public_key'),
                'version' => '3',
                'action' => 'pay',
                'amount' => $price,
                'currency' => LiqPay::CURRENCY_UAH,
                'description' => $description,
                'order_id' => $newOrder->id,
            ];

            $paymentRequestText = json_encode($paymentRequest);

            $data = base64_encode($paymentRequestText);

            //private_key + data + private_key
            $sign_string = config('liqpay.private_key')
                . $data
                . config('liqpay.private_key');

            // base64_encode( sha1( sign_string) )
            $signature = base64_encode(sha1($sign_string));

            /**
             * curl --silent -XPOST https://www.liqpay.ua/api/request --data-urlencode
             * data="eyJwdWJsaWNfa2V5IjoiaTAwMDAwMDAwIiwidmVyc2lvbiI6IjMiLCJhY3Rpb24iOiJwYXkiLCJhbW91bnQiOiIzIiwiY3VycmVuY3kiOiJVQUgiLCJkZXNjcmlwdGlvbiI6InRlc3QiLCJvcmRlcl9pZCI6IjAwMDAwMSJ9" --data-urlencode
             * signature="wR+UZDC4jjeL/qUOvIsofIWpZh8="
             */

            $liqpay = new LiqPay(config('liqpay.public_key'), config('liqpay.private_key'));

            return $liqpay->cnb_form([
                'action' => 'pay',
                'amount' => $request->price,
                'currency' => 'UAH',
                'description' => $description,
                'order_id' => $newOrder->id,
                'version' => '3',
                'result_url' => route('callback-status'),
                'sender_last_name' => $request->name,
                'server_url' => route('callback-status'),
            ]);
        } else {
            // send email
            Mail::to($request->email)->send(new RaceRegistered($request));

            return redirect()->to('/')->with(
                'success',
                'Дякуємо за реєстрацію, перевірте будь ласка пошту ' . $request->email
            );
        }
    }

    /**
     * @param $raceId
     * @return View|Factory|Application
     */
    public function participants($raceId): View|Factory|Application
    {
        $orders = Order::query()->select(['orders.*', 'race_type.type_label'])
            ->where('race_id', '=', $raceId)
            ->where('status', Order::STATUS_REGISTERED_PAID)
            ->join('race_type', 'race_type.id', '=', 'orders.type_id')
            ->get()
            ->groupBy('type_label')
            ->all();

        return view('orders.race-participants', compact('orders'));
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $races = [];

        foreach (Race::all() as $race) {
            $races[$race->id] = $race->getAttributes();

            $raceForms = RaceForm::query()->select(['race_form.*', 'race_type.type_label'])
                ->join('race_type', 'race_form.type_id', '=', 'race_type.id')
                ->where('race_id', '=', $race->id)
                ->get()->all();

            foreach ($raceForms as $raceForm) {
                $races[$race->id]['forms'][$raceForm->id] = $raceForm->getAttributes();
                $races[$race->id]['forms'][$raceForm->id]['distance'] = explode(
                    ':',
                    json_decode($races[$race->id]['forms'][$raceForm->id]['distance'], true)['distance']
                )[0];

                if (!str_contains($races[$race->id]['forms'][$raceForm->id]['payments'], ';')) {
                    $races[$race->id]['forms'][$raceForm->id]['payments'] =
                        json_decode($races[$race->id]['forms'][$raceForm->id]['payments'], true)['payments'];
                    $races[$race->id]['forms'][$raceForm->id]['current_price'] =
                        $races[$race->id]['forms'][$raceForm->id]['payments'];
                } else {
                    $races[$race->id]['forms'][$raceForm->id]['payments'] = explode(
                        ';',
                        json_decode(
                            preg_replace('/\s+/', '', $races[$race->id]['forms'][$raceForm->id]['payments']),
                            true
                        )['payments']
                    );

                    if (str_contains(Arr::first($races[$race->id]['forms'][$raceForm->id]['payments']), ':')) {
                        $isCurrentPriceCalculated = false;
                        foreach ($races[$race->id]['forms'][$raceForm->id]['payments'] as $key => $payment) {
                            $races[$race->id]['forms'][$raceForm->id]['payments'][$key] =
                                explode(':', $payment);
                            if (str_contains(Arr::first($races[$race->id]['forms'][$raceForm->id]['payments'][$key]), '-')) {
                                $races[$race->id]['forms'][$raceForm->id]['payments'][$key]['dates'] =
                                    explode('-', $races[$race->id]['forms'][$raceForm->id]['payments'][$key][0]);

                                $races[$race->id]['forms'][$raceForm->id]['payments'][$key]['start_date'] =
                                    $races[$race->id]['forms'][$raceForm->id]['payments'][$key]['dates'][0];
                                $races[$race->id]['forms'][$raceForm->id]['payments'][$key]['end_date'] =
                                    $races[$race->id]['forms'][$raceForm->id]['payments'][$key]['dates'][1];
                                $races[$race->id]['forms'][$raceForm->id]['payments'][$key]['price'] =
                                    $races[$race->id]['forms'][$raceForm->id]['payments'][$key][1];

                                unset($races[$race->id]['forms'][$raceForm->id]['payments'][$key]['dates']);

                                if (array_key_exists($key - 1, $races[$race->id]['forms'][$raceForm->id]['payments'])) {
                                    if (!$races[$race->id]['forms'][$raceForm->id]['payments'][$key]['start_date']) {
                                        $races[$race->id]['forms'][$raceForm->id]['payments'][$key]['start_date'] =
                                            Carbon::parse($races[$race->id]['forms'][$raceForm->id]['payments'][$key - 1]['end_date'])
                                                ->addDays()
                                                ->rawFormat('d.m.Y');
                                    }
                                }
                            } else {
                                $races[$race->id]['forms'][$raceForm->id]['payments'][$key]['end_date'] =
                                    $races[$race->id]['forms'][$raceForm->id]['payments'][$key][0];
                                $races[$race->id]['forms'][$raceForm->id]['payments'][$key]['price'] =
                                    $races[$race->id]['forms'][$raceForm->id]['payments'][$key][1];
                            }

                            unset($races[$race->id]['forms'][$raceForm->id]['payments'][$key][0]);
                            unset($races[$race->id]['forms'][$raceForm->id]['payments'][$key][1]);

                            if (!Carbon::parse($races[$race->id]['forms'][$raceForm->id]['payments'][$key]['end_date'])->isPast()
                                && !$isCurrentPriceCalculated
                            ) {
                                $isCurrentPriceCalculated = true;
                                $races[$race->id]['forms'][$raceForm->id]['current_price'] =
                                    $races[$race->id]['forms'][$raceForm->id]['payments'][$key]['price'];
                            }
                        }
                    }

                    if (is_array($races[$race->id]['forms'][$raceForm->id]['payments'])) {
                        foreach ($races[$race->id]['forms'][$raceForm->id]['payments'] as &$payment) {
                            $payment['end_date'] = Carbon::parse($payment['end_date'])->rawFormat('d.m');
                            if (array_key_exists('start_date', $payment) && $payment['start_date'] !== '') {
                                $payment['start_date'] = Carbon::parse($payment['start_date'])->rawFormat('d.m');
                            }
                        }
                    }
                }
            }
        }

        return view('races.index', [
            'races' => $races,
            'racesCount' => count($races)
        ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function raceTypesIndex(Request $request): View|Factory|Application
    {
        $raceTypes = RaceType::all()->toArray();

        return view('races.race-types-index', [
            'raceTypes' => $raceTypes,
            'raceTypesCount' => count($raceTypes)
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function createRaceIndex(): View|Factory|Application
    {
        return view('races.create-race');
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function createRaceStore(Request $request): Factory|View|Application
    {
        $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'logo' => ['required', 'mimes:jpg,jpeg,png,gif|max:1024'],
            'document' => ['file']
        ]);

        $raceData = $request->toArray();
        $raceData['is_active'] = array_key_exists('is_active', $raceData);

        $logo = $request->logo;
        $logoName = $raceData['logo'] = $logo->getClientOriginalName();
        $logo->storeAs('images/logo', $logoName, 'resource_upload');

        if ($request->document) {
            $document = $request->file('document');
            $documentName = $raceData['document'] = $document->getClientOriginalName();
            $document->storeAs('files', $documentName, 'resource_upload');
        }

        $this->raceModel->fill($raceData)->save();

        return $this->index();
    }

    /**
     * @return Application|Factory|View
     */
    public function createRaceTypeIndex(): View|Factory|Application
    {
        return view('races.create-race-type');
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function createRaceTypeStore(Request $request): Factory|View|Application
    {
        $this->raceTypeModel->fill($request->toArray())->save();

        return $this->raceTypesIndex($request);
    }

    /**
     * @param Request $request
     * @return View|Factory|Application
     */
    public function createRaceFormIndex(Request $request): View|Factory|Application
    {
        $races = Race::all();
        $types = RaceType::all();

        return view('races.create-race-form', [
            'selectedRaceId' => $request->id,
            'races' => $races,
            'types' => $types
        ]);
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function createRaceFormStore(Request $request): Factory|View|Application
    {
        $raceFormData = $request->toArray();
        $raceFormData['distance'] = json_encode($request->all('distance'));
        $raceFormData['payments'] = json_encode($request->all('payments'));
        $this->raceFormModel->fill($raceFormData)->save();

        return $this->index();
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function updateRaceView(Request $request): Factory|View|Application
    {
        $race = Race::query()->where('id', '=', $request->id)->first()->getAttributes();

        $raceForms = RaceForm::query()->select(['race_form.*', 'race_type.type_label'])
            ->join('race_type', 'race_form.type_id', '=', 'race_type.id')
            ->where('race_id', '=', $race['id'])
            ->get()->all();

        foreach ($raceForms as $raceForm) {
            $race['forms'][$raceForm->id] = $raceForm->getAttributes();
            $race['forms'][$raceForm->id]['distance'] = explode(
                ':',
                json_decode($race['forms'][$raceForm->id]['distance'], true)['distance']
            )[0];

            if (!str_contains($race['forms'][$raceForm->id]['payments'], ';')) {
                $race['forms'][$raceForm->id]['payments'] =
                    json_decode($race['forms'][$raceForm->id]['payments'], true)['payments'];
                $race['forms'][$raceForm->id]['current_price'] = $race['forms'][$raceForm->id]['payments'];
            } else {
                $race['forms'][$raceForm->id]['payments'] = explode(
                    ';',
                    json_decode(preg_replace('/\s+/', '', $race['forms'][$raceForm->id]['payments']), true)['payments']
                );

                foreach ($race['forms'][$raceForm->id]['payments'] as &$payment) {
                    $payment = explode(':', $payment);
                }

                foreach ($race['forms'][$raceForm->id]['payments'] as $payment) {
                    if (!Carbon::parse(explode('-', $payment[0])[1])->isPast()) {
                        $race['forms'][$raceForm->id]['current_price'] = $payment[1];
                        break;
                    }
                }
            }
        }

        return view('races.edit-race', ['race' => $race]);
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function updateRace(Request $request): Factory|View|Application
    {
        $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'logo' => ['mimes:jpg,jpeg,png,gif|max:1024'],
            'document' => ['file']
        ]);

        $raceData = $request->toArray();
        $raceData['is_active'] = array_key_exists('is_active', $raceData);

        if ($request->logo) {
            $logo = $request->file('logo');
            $logoName = $raceData['logo'] = $logo->getClientOriginalName();
            $logo->storeAs('images/logo', $logoName, 'resource_upload');
        }

        if ($request->document) {
            $document = $request->file('document');
            $documentName = $raceData['document'] = $document->getClientOriginalName();
            $document->storeAs('files', $documentName, 'resource_upload');
        }

        Race::query()->where('id', '=', $request->id)->first()->update($raceData);

        return $this->index();
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function updateRaceTypeView(Request $request): Factory|View|Application
    {
        $raceType = RaceType::query()->where('id', '=', $request->id)->first()->getAttributes();

        return view('races.edit-race-type', [
            'raceType' => $raceType
        ]);
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function updateRaceType(Request $request): Factory|View|Application
    {
        RaceType::query()->where('id', '=', $request->id)->first()->update($request->toArray());

        return $this->raceTypesIndex($request);
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function updateRaceFormView(Request $request): Factory|View|Application
    {
        $races = Race::all();
        $types = RaceType::all();
        $raceForm = RaceForm::query()->where('id', '=', $request->id)->first()->getAttributes();

        $raceForm['distance'] = explode(
            'distance',
            json_decode($raceForm['distance'], true)['distance']
        )[0];

        $raceForm['payments'] = explode(
            'payments',
            json_decode($raceForm['payments'], true)['payments'] ?? '0'
        )[0];

        return view('races.edit-race-form', [
            'raceForm' => $raceForm,
            'races' => $races,
            'types' => $types
        ]);
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function updateRaceForm(Request $request): Factory|View|Application
    {
        $raceFormData = $request->toArray();
        $raceFormData['distance'] = json_encode($request->all('distance'));
        $raceFormData['payments'] = json_encode($request->all('payments'));
        RaceForm::query()->where('id', '=', $request->id)->first()->update($raceFormData);

        return $this->index();
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function deleteRace(Request $request): Factory|View|Application
    {
        Race::query()->where('id', '=', $request->id)->first()->delete();

        return $this->index();
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function deleteRaceType(Request $request): Factory|View|Application
    {
        RaceType::query()->where('id', '=', $request->id)->first()->delete();

        return $this->raceTypesIndex($request);
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function deleteRaceForm(Request $request): Factory|View|Application
    {
        RaceForm::query()->where('id', '=', $request->id)->first()->delete();

        return $this->updateRaceFormView($request);
    }
}
