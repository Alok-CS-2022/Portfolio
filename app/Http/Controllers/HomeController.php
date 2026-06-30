<?php
namespace App\Http\Controllers;
use App\Models\Project;
class HomeController extends Controller
{
    public function index()
    {
        $featuredProject = Project::where('is_featured', true)
            ->orderBy('sort_order')
            ->first();

        $projects = Project::where('is_featured', false)
            ->orWhereNull('is_featured')
            ->orderBy('sort_order')
            ->get();

        return view('home', compact('featuredProject', 'projects'));
    }
}
