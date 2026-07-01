<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use App\Models\Research;
use App\Models\Pov;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key');

        $featuredProject = Project::where('is_featured', true)
            ->orderBy('sort_order')
            ->first();

        $projects = Project::where('is_featured', false)
            ->orWhereNull('is_featured')
            ->orderBy('sort_order')
            ->get();

        $experiences = Experience::orderBy('sort_order')->get();

        $research = Research::orderBy('sort_order')->get();

        $povs = Pov::orderBy('sort_order')->get();

        return view('home', compact(
            'settings',
            'featuredProject',
            'projects',
            'experiences',
            'research',
            'povs'
        ));
    }
}
