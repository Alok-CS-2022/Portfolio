<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('sort_order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'tech_stack' => 'nullable|string',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $project = new Project();
        $project->title = $validated['title'];
        $project->slug = Str::slug($validated['title']) . '-' . Str::random(5);
        $project->description = $validated['description'];
        $project->tech_stack = $validated['tech_stack']
            ? array_map('trim', explode(',', $validated['tech_stack']))
            : [];
        $project->live_url = $validated['live_url'] ?? null;
        $project->github_url = $validated['github_url'] ?? null;
        $project->is_featured = $request->boolean('is_featured');
        $project->sort_order = $validated['sort_order'] ?? 0;

        if ($request->hasFile('thumbnail')) {
            $project->thumbnail_path = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'tech_stack' => 'nullable|string',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $project->title = $validated['title'];
        $project->description = $validated['description'];
        $project->tech_stack = $validated['tech_stack']
            ? array_map('trim', explode(',', $validated['tech_stack']))
            : [];
        $project->live_url = $validated['live_url'] ?? null;
        $project->github_url = $validated['github_url'] ?? null;
        $project->is_featured = $request->boolean('is_featured');
        $project->sort_order = $validated['sort_order'] ?? 0;

        if ($request->hasFile('thumbnail')) {
            $project->thumbnail_path = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
