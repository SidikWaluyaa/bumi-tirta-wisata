<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Poppins', sans-serif; }
            .glass-effect {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 relative overflow-hidden">
            
            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
                <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
                <div class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-[-10%] left-[20%] w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
            </div>

            <div class="z-10 flex flex-col items-center mb-6">
                <a href="/" class="transition-transform hover:scale-105 duration-300">
                    @if(isset($global_settings['logo']) && $global_settings['logo'])
                        <img src="{{ Storage::url($global_settings['logo']) }}" alt="{{ config('app.name') }}" class="w-24 h-24 object-contain drop-shadow-lg">
                    @else
                        <x-application-logo class="w-24 h-24 fill-current text-white" />
                    @endif
                </a>
                <h2 class="mt-4 text-2xl font-bold text-white tracking-wide">
                    {{ $global_settings['site_name'] ?? config('app.name') }}
                </h2>
                <p class="text-blue-100 text-sm mt-1">
                    {{ $global_settings['site_description'] ?? 'Welcome Back!' }}
                </p>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-10 glass-effect shadow-2xl overflow-hidden sm:rounded-2xl z-10 transform transition-all duration-500 hover:shadow-blue-500/20">
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-blue-200 text-xs z-10">
                &copy; {{ date('Y') }} {{ $global_settings['site_name'] ?? config('app.name') }}. All rights reserved.
            </div>
        </div>
    </body>
</html>
