<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.abouts.edit', 1);
    }

    public function edit($id)
    {
        // Force ID 1 or findOrFail
        $about = About::findOrFail(1);
        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail(1);
        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'hero_background' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'cta_background' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        $data = $request->only([
            'title',
            'content',
            'hero_title',
            'hero_subtitle',
            'service_area',
            'focus_services',
            'highlight_text',
            'vision',
            'cta_title',
            'cta_subtitle',
            'cta_whatsapp_text',
            'cta_whatsapp_number',
            'cta_packages_text',
        ]);

        // Handle main image
        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $data['image'] = $request->file('image')->store('abouts', 'public');
        }

        // Handle hero background
        if ($request->hasFile('hero_background')) {
            if ($about->hero_background) {
                Storage::disk('public')->delete($about->hero_background);
            }
            $data['hero_background'] = $request->file('hero_background')->store('abouts/hero', 'public');
        }

        // Handle CTA background
        if ($request->hasFile('cta_background')) {
            if ($about->cta_background) {
                Storage::disk('public')->delete($about->cta_background);
            }
            $data['cta_background'] = $request->file('cta_background')->store('abouts/cta', 'public');
        }

        $about->update($data);
        
        return redirect()->route('admin.abouts.edit', 1)->with('success', 'About Us berhasil diupdate!');
    }
}
