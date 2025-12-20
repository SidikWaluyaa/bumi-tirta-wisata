<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'title' => 'nullable|string',
            'category' => 'nullable|string'
        ]);

        $path = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'image' => $path,
            'title' => $request->title,
            'category' => $request->category
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Gambar berhasil diupload!');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'title' => 'nullable|string',
            'category' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);
            $path = $request->file('image')->store('galleries', 'public');
            $gallery->image = $path;
        }

        $gallery->update([
            'title' => $request->title,
            'category' => $request->category
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery berhasil diupdate!');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Gambar berhasil dihapus!');
    }
}
