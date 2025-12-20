<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Share settings with all views
        View::composer('*', function ($view) {
            try {
                // Cache settings for 1 hour
                $settings = cache()->remember('global_settings', 3600, function () {
                    return Setting::all()->pluck('value', 'key')->toArray();
                });
                $view->with('global_settings', $settings);
            } catch (\Exception $e) {
                // If settings table doesn't exist or error, use empty array
                $view->with('global_settings', []);
            }
        });
    }
}
