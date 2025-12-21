<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $settings = \Illuminate\Support\Facades\Cache::rememberForever('global_settings', function () {
                    return \App\Models\Setting::all()->pluck('value', 'key');
                });
                \Illuminate\Support\Facades\View::share('global_settings', $settings);
            }
        } catch (\Exception $e) {
            // Log error or ignore if DB not ready
        }
    }
}
