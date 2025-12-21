<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::all();

        foreach ($settings as $setting) {
            // PHP converts dots variables to underscores in request
            $inputKey = str_replace('.', '_', $setting->key);

            if ($setting->type === 'image') {
                if ($request->hasFile($inputKey)) {
                    // Delete old image if exists
                    if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    
                    // Upload new image
                    $path = $request->file($inputKey)->store('settings', 'public');
                    $setting->update(['value' => $path]);
                }
            } else {
                // Update text/textarea if present in request
                if ($request->has($inputKey)) {
                    $setting->update(['value' => $request->input($inputKey)]);
                }
            }
        }

        // Clear the cache for global settings so the frontend updates immediately
        \Illuminate\Support\Facades\Cache::forget('global_settings');

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }
}
