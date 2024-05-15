<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\RaceForm;
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

        return view('index.index', [
            'races' => $races
        ]);
    }
}
