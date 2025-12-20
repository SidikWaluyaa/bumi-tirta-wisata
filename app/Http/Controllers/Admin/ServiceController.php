<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'location' => 'nullable',
            'rating' => 'nullable|numeric|min:0|max:5',
            'price' => 'nullable',
            'description' => 'nullable',
            'features' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'category' => 'required|in:paket,addon',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        // Filter empty features
        $features = array_filter($request->features ?? [], function($feature) {
            return !empty(trim($feature));
        });

        Service::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'location' => $request->location,
            'rating' => $request->rating ?? 5.0,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'price' => $request->price,
            'price_unit' => $request->price_unit ?? '/ Orang',
            'description' => $request->description,
            'features' => array_values($features),
            'image' => $imagePath,
            'category' => $request->category,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'location' => 'nullable',
            'rating' => 'nullable|numeric|min:0|max:5',
            'price' => 'nullable',
            'description' => 'nullable',
            'features' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'category' => 'required|in:paket,addon',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $imagePath = $request->file('image')->store('services', 'public');
            $service->image = $imagePath;
        }

        // Filter empty features
        $features = array_filter($request->features ?? [], function($feature) {
            return !empty(trim($feature));
        });

        $service->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'location' => $request->location,
            'rating' => $request->rating ?? 5.0,
            'slug' => Str::slug($request->title) . '-' . $service->id, // simple slug update
            'price' => $request->price,
            'price_unit' => $request->price_unit ?? '/ Orang',
            'description' => $request->description,
            'features' => array_values($features),
            'category' => $request->category,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil dihapus!');
    }
}
