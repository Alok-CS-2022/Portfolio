<?php

namespace App\Http\Controllers;

use App\Models\Pov;
use App\Models\SiteSetting;

class PovPageController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key');
        $povs = Pov::orderBy('sort_order')->get();

        return view('povs', compact('settings', 'povs'));
    }

    public function show(Pov $pov)
    {
        $settings = SiteSetting::pluck('value', 'key');

        return view('pov-show', compact('settings', 'pov'));
    }
}
