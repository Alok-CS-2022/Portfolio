<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pov;
use Illuminate\Http\Request;

class PovController extends Controller
{
    public function index()
    {
        $povs = Pov::orderBy('sort_order')->get();
        return view('admin.povs.index', compact('povs'));
    }

    public function create()
    {
        return view('admin.povs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        Pov::create($validated);

        return redirect()->route('admin.povs.index')->with('success', 'POV added successfully.');
    }

    public function edit(Pov $pov)
    {
        return view('admin.povs.edit', compact('pov'));
    }

    public function update(Request $request, Pov $pov)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $pov->update($validated);

        return redirect()->route('admin.povs.index')->with('success', 'POV updated successfully.');
    }

    public function destroy(Pov $pov)
    {
        $pov->delete();

        return redirect()->route('admin.povs.index')->with('success', 'POV deleted successfully.');
    }
}
