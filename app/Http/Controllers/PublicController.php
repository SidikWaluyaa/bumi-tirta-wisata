<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $services = Service::where('category', 'paket')->take(3)->get();
        $addons = Service::where('category', 'addon')->take(4)->get();
        $galleries = Gallery::latest()->take(6)->get();
        $about = About::first();
        $missions = \App\Models\Mission::active()->ordered()->get();
        $certifications = \App\Models\Certification::active()->ordered()->get();
        return view('public.home', compact('services', 'addons', 'galleries', 'about', 'missions', 'certifications'));
    }

    public function about()
    {
        $about = About::first();
        $missions = \App\Models\Mission::active()->ordered()->get();
        $values = \App\Models\CompanyValue::active()->ordered()->get();
        $team = \App\Models\TeamMember::active()->ordered()->get();
        $certifications = \App\Models\Certification::active()->ordered()->get();
        
        return view('public.about', compact('about', 'missions', 'values', 'team', 'certifications'));
    }

    public function services()
    {
        $packages = Service::where('category', 'paket')->get();
        $addons = Service::where('category', 'addon')->get();
        return view('public.services.index', compact('packages', 'addons'));
    }

    public function showService(Service $service)
    {
        return view('public.services.show', compact('service'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        return view('public.gallery', compact('galleries'));
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        $message = Message::create($request->all());

        // Send email notification
        try {
            \Illuminate\Support\Facades\Mail::to(env('MAIL_FROM_ADDRESS'))
                ->send(new \App\Mail\ContactMessageNotification($message));
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Illuminate\Support\Facades\Log::error('Failed to send contact notification email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.')->withFragment('contact-section');
    }
}
