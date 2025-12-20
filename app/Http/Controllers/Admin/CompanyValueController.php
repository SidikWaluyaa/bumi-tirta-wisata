<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyValue;
use Illuminate\Http\Request;

class CompanyValueController extends Controller
{
    public function index()
    {
        $values = CompanyValue::ordered()->get();
        return view('admin.company-values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.company-values.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:100',
        ]);

        $maxOrder = CompanyValue::max('order') ?? 0;

        CompanyValue::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'order' => $maxOrder + 1,
            'is_active' => true,
        ]);

        return redirect()->route('admin.company-values.index')->with('success', 'Company Value berhasil ditambahkan!');
    }

    public function edit(CompanyValue $companyValue)
    {
        return view('admin.company-values.edit', compact('companyValue'));
    }

    public function update(Request $request, CompanyValue $companyValue)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:100',
        ]);

        $companyValue->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.company-values.index')->with('success', 'Company Value berhasil diupdate!');
    }

    public function destroy(CompanyValue $companyValue)
    {
        $companyValue->delete();
        return redirect()->route('admin.company-values.index')->with('success', 'Company Value berhasil dihapus!');
    }

    // AJAX: Toggle active status
    public function toggle(CompanyValue $companyValue)
    {
        $companyValue->update(['is_active' => !$companyValue->is_active]);
        return response()->json(['success' => true, 'is_active' => $companyValue->is_active]);
    }

    // AJAX: Reorder values
    public function reorder(Request $request)
    {
        $order = $request->order;
        
        foreach ($order as $index => $id) {
            CompanyValue::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
