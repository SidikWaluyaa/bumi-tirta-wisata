<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::ordered()->get();
        return view('admin.team-members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'is_certified' => 'boolean',
        ]);

        $maxOrder = TeamMember::max('order') ?? 0;

        $data = [
            'name' => $request->name,
            'role' => $request->role,
            'bio' => $request->bio,
            'is_certified' => $request->has('is_certified'),
            'order' => $maxOrder + 1,
            'is_active' => true,
        ];

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')->with('success', 'Team Member berhasil ditambahkan!');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'is_certified' => 'boolean',
        ]);

        $data = [
            'name' => $request->name,
            'role' => $request->role,
            'bio' => $request->bio,
            'is_certified' => $request->has('is_certified'),
        ];

        if ($request->hasFile('photo')) {
            if ($teamMember->photo) {
                Storage::disk('public')->delete($teamMember->photo);
            }
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        $teamMember->update($data);

        return redirect()->route('admin.team-members.index')->with('success', 'Team Member berhasil diupdate!');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->photo) {
            Storage::disk('public')->delete($teamMember->photo);
        }
        
        $teamMember->delete();
        return redirect()->route('admin.team-members.index')->with('success', 'Team Member berhasil dihapus!');
    }

    // AJAX: Toggle active status
    public function toggle(TeamMember $teamMember)
    {
        $teamMember->update(['is_active' => !$teamMember->is_active]);
        return response()->json(['success' => true, 'is_active' => $teamMember->is_active]);
    }

    // AJAX: Reorder members
    public function reorder(Request $request)
    {
        $order = $request->order;
        
        foreach ($order as $index => $id) {
            TeamMember::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
