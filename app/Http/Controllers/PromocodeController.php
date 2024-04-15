<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Promocode;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PromocodeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $promocodes = Promocode::all();

        return view('promocodes.index', compact('promocodes'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->merge([
            'from' => Carbon::parse($request->toArray()['from'])->toDateString(),
            'to' => Carbon::parse($request->toArray()['to'])->toDateString()
        ]);

        Promocode::createFromRequest($request);

        return redirect()->route('promocodes');
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function edit(Request $request): Factory|View|Application
    {
        $promocode = Promocode::query()->where('id', '=', $request->id)->first();

        return view('promocodes.edit', compact('promocode'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function editPost(Request $request): RedirectResponse
    {
        $request->merge([
            'status' => Arr::get($request->toArray(), 'status') ? 1 : 0,
            'from' => Carbon::parse($request->toArray()['from'])->toDateString(),
            'to' => Carbon::parse($request->toArray()['to'])->toDateString()
        ]);

        Promocode::query()->where('id', '=', $request->id)->first()->update($request->toArray());

        return redirect()->route('promocodes');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        Promocode::query()->where('id', '=', $request->id)->first()->delete();

        return redirect()->route('promocodes');
    }
}
