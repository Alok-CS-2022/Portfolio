<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchController extends Controller
{
    public function index()
    {
        $researchItems = Research::orderBy('sort_order')->get();
        return view('admin.research.index', compact('researchItems'));
    }

    public function create()
    {
        return view('admin.research.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url|max:255',
            'thumbnail' => 'nullable|image|max:4096',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail_path'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        unset($validated['thumbnail']);

        Research::create($validated);

        return redirect()->route('admin.research.index')->with('success', 'Research item added successfully.');
    }

    public function edit(Research $research)
    {
        return view('admin.research.edit', compact('research'));
    }

    public function update(Request $request, Research $research)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url|max:255',
            'thumbnail' => 'nullable|image|max:4096',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($research->thumbnail_path) {
                Storage::disk('public')->delete($research->thumbnail_path);
            }
            $validated['thumbnail_path'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        unset($validated['thumbnail']);

        $research->update($validated);

        return redirect()->route('admin.research.index')->with('success', 'Research item updated successfully.');
    }

    public function destroy(Research $research)
    {
        if ($research->thumbnail_path) {
            Storage::disk('public')->delete($research->thumbnail_path);
        }

        $research->delete();

        return redirect()->route('admin.research.index')->with('success', 'Research item deleted successfully.');
    }
}
