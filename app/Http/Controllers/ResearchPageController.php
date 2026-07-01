<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\SiteSetting;

class ResearchPageController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key');
        $research = Research::orderBy('sort_order')->get();

        return view('research', compact('settings', 'research'));
    }
}
