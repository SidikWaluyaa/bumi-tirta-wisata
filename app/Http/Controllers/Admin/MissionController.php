<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::ordered()->get();
        return view('admin.missions.index', compact('missions'));
    }

    public function create()
    {
        return view('admin.missions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mission_text' => 'required|string',
        ]);

        $maxOrder = Mission::max('order') ?? 0;

        Mission::create([
            'mission_text' => $request->mission_text,
            'order' => $maxOrder + 1,
            'is_active' => true,
        ]);

        return redirect()->route('admin.missions.index')->with('success', 'Mission berhasil ditambahkan!');
    }

    public function edit(Mission $mission)
    {
        return view('admin.missions.edit', compact('mission'));
    }

    public function update(Request $request, Mission $mission)
    {
        $request->validate([
            'mission_text' => 'required|string',
        ]);

        $mission->update([
            'mission_text' => $request->mission_text,
        ]);

        return redirect()->route('admin.missions.index')->with('success', 'Mission berhasil diupdate!');
    }

    public function destroy(Mission $mission)
    {
        $mission->delete();
        return redirect()->route('admin.missions.index')->with('success', 'Mission berhasil dihapus!');
    }

    // AJAX: Toggle active status
    public function toggle(Mission $mission)
    {
        $mission->update(['is_active' => !$mission->is_active]);
        return response()->json(['success' => true, 'is_active' => $mission->is_active]);
    }

    // AJAX: Reorder missions
    public function reorder(Request $request)
    {
        $order = $request->order; // array of IDs in new order
        
        foreach ($order as $index => $id) {
            Mission::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
