<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    public function index() {
        $promocodes = Promocode::all();
        return view('promocodes.index', compact('promocodes'));
    }

    public function store(Request $request) {
        $newPromocode = Promocode::createFromRequest($request);
        return redirect()->route('promocodes.index');
    }
}
