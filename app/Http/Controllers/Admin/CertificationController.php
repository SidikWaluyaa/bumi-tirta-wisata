<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'company');
        $certifications = Certification::ofType($type)->ordered()->get();
        
        return view('admin.certifications.index', compact('certifications', 'type'));
    }

    public function create()
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        return view('admin.certifications.create', compact('teamMembers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:guide,instructor,company',
            'team_member_id' => 'nullable|exists:team_members,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate_image' => 'required|image|mimes:jpeg,png,jpg,pdf|max:10240',
            'issued_by' => 'nullable|string|max:255',
            'issued_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after_or_equal:issued_date',
        ]);

        $maxOrder = Certification::ofType($request->type)->max('order') ?? 0;

        $data = [
            'type' => $request->type,
            'team_member_id' => $request->team_member_id,
            'title' => $request->title,
            'description' => $request->description,
            'issued_by' => $request->issued_by,
            'issued_date' => $request->issued_date,
            'expiry_date' => $request->expiry_date,
            'order' => $maxOrder + 1,
            'is_active' => true,
        ];

        if ($request->hasFile('certificate_image')) {
            $data['certificate_image'] = $request->file('certificate_image')->store('certifications', 'public');
        }

        Certification::create($data);

        return redirect()->route('admin.certifications.index', ['type' => $request->type])
            ->with('success', 'Certification created successfully!');
    }

    public function edit(Certification $certification)
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        return view('admin.certifications.edit', compact('certification', 'teamMembers'));
    }

    public function update(Request $request, Certification $certification)
    {
        $request->validate([
            'type' => 'required|in:guide,instructor,company',
            'team_member_id' => 'nullable|exists:team_members,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate_image' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:10240',
            'issued_by' => 'nullable|string|max:255',
            'issued_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after_or_equal:issued_date',
        ]);

        $data = [
            'type' => $request->type,
            'team_member_id' => $request->team_member_id,
            'title' => $request->title,
            'description' => $request->description,
            'issued_by' => $request->issued_by,
            'issued_date' => $request->issued_date,
            'expiry_date' => $request->expiry_date,
        ];

        if ($request->hasFile('certificate_image')) {
            // Delete old image
            if ($certification->certificate_image) {
                Storage::disk('public')->delete($certification->certificate_image);
            }
            $data['certificate_image'] = $request->file('certificate_image')->store('certifications', 'public');
        }

        $certification->update($data);

        return redirect()->route('admin.certifications.index', ['type' => $certification->type])
            ->with('success', 'Certification updated successfully!');
    }

    public function destroy(Certification $certification)
    {
        $type = $certification->type;
        
        // Delete image
        if ($certification->certificate_image) {
            Storage::disk('public')->delete($certification->certificate_image);
        }

        $certification->delete();

        return redirect()->route('admin.certifications.index', ['type' => $type])
            ->with('success', 'Certification deleted successfully!');
    }

    public function toggle(Certification $certification)
    {
        $certification->update(['is_active' => !$certification->is_active]);
        return response()->json(['success' => true, 'is_active' => $certification->is_active]);
    }

    public function reorder(Request $request)
    {
        $order = $request->order; // array of IDs in new order
        
        foreach ($order as $index => $id) {
            Certification::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
