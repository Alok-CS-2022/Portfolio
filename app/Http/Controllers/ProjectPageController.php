<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SiteSetting;

class ProjectPageController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key');
        $featuredProject = Project::where('is_featured', true)->orderBy('sort_order')->first();
        $projects = Project::where('is_featured', false)->orWhereNull('is_featured')->orderBy('sort_order')->get();

        return view('projects', compact('settings', 'featuredProject', 'projects'));
    }
}
