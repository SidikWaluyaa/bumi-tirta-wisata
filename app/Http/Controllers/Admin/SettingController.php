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
        // Bulk update
        $data = $request->except(['_token', '_method', 'files']);

        foreach ($data as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                $setting->update(['value' => $value]);
            }
        }

        // Handle File Uploads (specifically 'logo' or others)
        if ($request->hasFile('logo')) {
            $setting = Setting::where('key', 'logo')->first();
            if ($setting) {
                if ($setting->value) {
                    Storage::disk('public')->delete($setting->value);
                }
                $path = $request->file('logo')->store('settings', 'public');
                $setting->update(['value' => $path]);
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings berhasil diupdate!');
    }
}
