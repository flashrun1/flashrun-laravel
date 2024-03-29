<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\RaceForm;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
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
                    ';',
                    json_decode($races[$race->id]['forms'][$raceForm->id]['distance'], true)['distance']
                );

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
                        foreach ($races[$race->id]['forms'][$raceForm->id]['payments'] as &$payments) {
                            $payments['end_date'] = Carbon::parse($payments['end_date'])->rawFormat('d.m');
                            if (array_key_exists('start_date', $payments) && $payments['start_date'] !== '') {
                                $payments['start_date'] = Carbon::parse($payments['start_date'])->rawFormat('d.m');
                            }
                        }
                    }
                }
            }
        }

        return view('index.index', [
            'races' => $races
        ]);
    }
}
