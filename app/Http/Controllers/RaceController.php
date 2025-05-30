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
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use LiqPay;

class RaceController extends Controller
{
    /**
     * Deploy NVM export command
     */
    private const DEPLOY_NVM_EXPORT_COMMAND = 'export NVM_DIR="$([ -z "${XDG_CONFIG_HOME-}" ] && printf %s "${HOME}/.nvm" || printf %s "${XDG_CONFIG_HOME}/nvm")"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"';

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
     *
     * @return RedirectResponse|string
     *
     * @throws ValidationException
     */
    public function register(Request $request): string|RedirectResponse
    {
        $this->validate($request, [
            'g-recaptcha-response' => ['required', new ReCaptchaV3('raceRegister', 0.6)],
            'name' => 'required|max:80',
            'email' => 'required|email',
            'phone' => 'required|max:20',
            'city' => 'required|max:30'
        ], [
            'name.required' => 'Заповніть поле введення імені та прізвища',
            'email.required' => 'Заповніть поле введення email',
            'phone.required' => 'Заповніть поле введення телефону',
            'city.required' => 'Заповніть поле введення міста'
        ]);

        $description = Race::query()->where('id', '=', $request->race_id)->first()->title
            . ' | ' . $request->name . ' | ' . $request->email . ' | ' . $request->distance . 'm' . ' | '
            . RaceType::query()->where('id', '=', $request->type_id)->first()->type_label;

        $race = RaceForm::query()->where('race_id', '=', $request->race_id)
            ->where('type_id', '=', $request->type_id)->get()->first();

        if (count(explode(',', json_decode($race->payments, true)['payments'])) === 1) {
            $price = array_fill_keys(
                explode(',', json_decode($race->distance, true)['distance']),
                Arr::first(explode(',', json_decode($race->payments, true)['payments']))
            )[$request->distance];
        } else {
            $price = array_combine(
                explode(',', json_decode($race->distance, true)['distance']),
                explode(',', json_decode($race->payments, true)['payments'])
            )[$request->distance];
        }

        $request->merge([
            'amount' => $price,
            'price' => $price
        ]);

        // if promocode entered - apply to price
        if ($request->promocode && $price) {
            $promocode = Promocode::findByCode($request->promocode);
            $description .= ' | promo entered: ' . $request->promocode;

            if ($promocode && $promocode->isValid()) {
                $price = $promocode->applyTo($price);
                $request->merge([
                    'amount' => $price,
                    'price' => $price
                ]);
            }
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
            $newOrder->setPaid();

            $newOrder->assignNumber();

            $request->merge([
                'race_name' => Race::query()->where('id', '=', $request->race_id)->first()->title
            ]);

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
     *
     * @return View|Factory|Application
     */
    public function participants($raceId): View|Factory|Application
    {
        $orders = Order::query()->select(['orders.*', 'race_type.type_label'])
            ->where('race_id', '=', $raceId)
            ->where('status', Order::STATUS_REGISTERED_PAID)
            ->join('race_type', 'race_type.id', '=', 'orders.type_id')
            ->orderBy('number')
            ->get()
            ->groupBy(['type_label', 'distance'])
            ->all();

        return view('orders.race-participants', compact('orders'));
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $races = [];

        foreach (Race::all()->sortBy('position') as $race) {
            $races[$race->id] = $race->getAttributes();

            $raceForms = RaceForm::query()->select(['race_form.*', 'race_type.type_label'])
                ->join('race_type', 'race_form.type_id', '=', 'race_type.id')
                ->where('race_id', '=', $race->id)
                ->get()->all();

            foreach ($raceForms as $raceForm) {
                $races[$race->id]['forms'][$raceForm->id] = $raceForm->getAttributes();
                $races[$race->id]['forms'][$raceForm->id]['distance'] = explode(
                    ',',
                    Arr::get(json_decode($races[$race->id]['forms'][$raceForm->id]['distance'], true), 'distance')
                );

                if (!str_contains($races[$race->id]['forms'][$raceForm->id]['payments'], ',')) {
                    $races[$race->id]['forms'][$raceForm->id]['payments'] =
                        Arr::get(json_decode($races[$race->id]['forms'][$raceForm->id]['payments'], true), 'payments');
                } else {
                    $races[$race->id]['forms'][$raceForm->id]['payments'] = explode(
                        ',',
                        Arr::get(json_decode($races[$race->id]['forms'][$raceForm->id]['payments'], true), 'payments')
                    );
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
     *
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
     *
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

        if ($document = $request->file('document')) {
            $documentName = $raceData['document'] = $document->getClientOriginalName();
            $document->storeAs('files', $documentName, 'resource_upload');
        }

        $raceData['position'] = Race::query()->count() ? ++Race::query()->orderBy('position')->get()->last()->position : 1;

        $this->raceModel->fill($raceData)->save();

        $this->runDeploy();

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
     *
     * @return Factory|View|Application
     */
    public function createRaceTypeStore(Request $request): Factory|View|Application
    {
        $this->raceTypeModel->fill($request->toArray())->save();

        return $this->raceTypesIndex($request);
    }

    /**
     * @param Request $request
     *
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
     *
     * @return Factory|View|Application
     */
    public function createRaceFormStore(Request $request): Factory|View|Application
    {
        $raceFormData = $request->toArray();
        $raceFormData['distance'] = json_encode($request->all('distance'));
        $raceFormData['number_starts_from'] = json_encode($request->all('number_starts_from'));
        $raceFormData['payments'] = json_encode($request->all('payments'));
        $this->raceFormModel->fill($raceFormData)->save();

        return $this->index();
    }

    /**
     * @param Request $request
     *
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

            $race['forms'][$raceForm->id]['distance'] =
                Arr::get(json_decode($race['forms'][$raceForm->id]['distance'], true), 'distance');
            $race['forms'][$raceForm->id]['number_starts_from'] =
                Arr::get(json_decode($race['forms'][$raceForm->id]['number_starts_from'], true), 'number_starts_from');
            $race['forms'][$raceForm->id]['payments'] =
                Arr::get(json_decode($race['forms'][$raceForm->id]['payments'], true), 'payments');
        }

        return view('races.edit-race', ['race' => $race]);
    }

    /**
     * @param Request $request
     *
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

        $raceOldData = Race::query()->where('id', '=', $request->id)->first();

        if ($logo = $request->file('logo')) {
            File::delete(resource_path('images/logo/' . $raceOldData->logo));
            $logoName = $raceData['logo'] = $logo->getClientOriginalName();
            $logo->storeAs('images/logo', $logoName, 'resource_upload');
        }

        if ($document = $request->file('document')) {
            File::delete(resource_path('files/' . $raceOldData->document));
            $documentName = $raceData['document'] = $document->getClientOriginalName();
            $document->storeAs('files', $documentName, 'resource_upload');
        }

        Race::query()->where('id', '=', $request->id)->first()->update($raceData);

        $this->runDeploy();

        return $this->index();
    }

    /**
     * @param Request $request
     *
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
     *
     * @return Factory|View|Application
     */
    public function updateRaceType(Request $request): Factory|View|Application
    {
        RaceType::query()->where('id', '=', $request->id)->first()->update($request->toArray());

        return $this->raceTypesIndex($request);
    }

    /**
     * @param Request $request
     *
     * @return Factory|View|Application
     */
    public function updateRaceFormView(Request $request): Factory|View|Application
    {
        $races = Race::all();
        $types = RaceType::all();
        $raceForm = RaceForm::query()->where('id', '=', $request->id)->first()->getAttributes();

        $raceForm['distance'] = Arr::first(explode(
            'distance',
            Arr::get(json_decode($raceForm['distance'], true), 'distance') ?? ''
        ));

        $raceForm['number_starts_from'] = Arr::first(explode(
            'number_starts_from',
            Arr::get(json_decode($raceForm['number_starts_from'], true), 'number_starts_from') ?? ''
        ));

        $raceForm['payments'] = Arr::first(explode(
            'payments',
            Arr::get(json_decode($raceForm['payments'], true), 'payments') ?? '0'
        ));

        return view('races.edit-race-form', [
            'raceForm' => $raceForm,
            'races' => $races,
            'types' => $types
        ]);
    }

    /**
     * @param Request $request
     *
     * @return Factory|View|Application
     */
    public function updateRaceForm(Request $request): Factory|View|Application
    {
        $raceFormData = $request->toArray();
        $raceFormData['distance'] = json_encode($request->all('distance'));
        $raceFormData['number_starts_from'] = json_encode($request->all('number_starts_from'));
        $raceFormData['payments'] = json_encode($request->all('payments'));

        RaceForm::query()->where('id', '=', $request->id)->first()->update($raceFormData);

        return $this->index();
    }

    /**
     * @param Request $request
     *
     * @return Factory|View|Application
     */
    public function deleteRace(Request $request): Factory|View|Application
    {
        $race = Race::query()->where('id', '=', $request->id)->first();

        if ($race?->logo) {
            File::delete(resource_path('images/logo/' . $race->logo));
        }

        if ($race?->document) {
            File::delete(resource_path('files/' . $race->document));
        }

        $race->delete();

        $this->runDeploy();

        return $this->index();
    }

    /**
     * @param Request $request
     *
     * @return Factory|View|Application
     */
    public function deleteRaceType(Request $request): Factory|View|Application
    {
        RaceType::query()->where('id', '=', $request->id)->first()->delete();

        return $this->raceTypesIndex($request);
    }

    /**
     * @param Request $request
     *
     * @return Factory|View|Application
     */
    public function deleteRaceForm(Request $request): Factory|View|Application
    {
        RaceForm::query()->where('id', '=', $request->id)->first()->delete();

        return $this->updateRaceFormView($request);
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    public function racePositionManagement(Request $request): void
    {
        $positions = $request->position;

        foreach ($positions as $key => $item) {
            Race::query()->where('id', '=', $item)->first()->update(['position' => $key]);
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function runDeploy(): Application|Factory|View
    {
        $output = shell_exec(self::DEPLOY_NVM_EXPORT_COMMAND .
            ' && cd /var/www/flashrun.org && npm run production 2>&1'
        );

        Log::channel('node')->info($output);

        return $this->index();
    }

    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function removeСompetitionКegulations(Request $request): Factory|View|Application
    {
        $race = Race::query()->where('id', '=', $request->id)->first();

        File::delete(resource_path('files/' . $race->document));

        $race->update(['document' => null]);

        $this->runDeploy();

        return $this->index();
    }
}
