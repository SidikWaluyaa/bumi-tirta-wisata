<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-hidden scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bumi Tirta Wisata') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased overflow-x-hidden">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-[#004AAD]/5 via-[#28769A]/5 to-[#BDDADB]/10 backdrop-blur-md shadow-lg fixed w-full z-50 top-0 border-b border-[#004AAD]/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-2 group">
                        @if(isset($global_settings['logo']) && $global_settings['logo'])
                            <img class="h-14 w-auto transform group-hover:scale-110 transition-transform duration-300" src="{{ asset('storage/' . $global_settings['logo']) }}" alt="Logo">
                        @else
                            <span class="text-2xl md:text-3xl font-extrabold bg-gradient-to-r from-[#004AAD] to-[#28769A] bg-clip-text text-transparent tracking-tight">SAFARISTA</span>
                        @endif
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white' : 'text-gray-700 hover:bg-[#004AAD]/10 hover:text-[#004AAD]' }} px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white' : 'text-gray-700 hover:bg-[#004AAD]/10 hover:text-[#004AAD]' }} px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300">
                        About
                    </a>
                    <a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white' : 'text-gray-700 hover:bg-[#004AAD]/10 hover:text-[#004AAD]' }} px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300">
                        Services
                    </a>
                    <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white' : 'text-gray-700 hover:bg-[#004AAD]/10 hover:text-[#004AAD]' }} px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300">
                        Gallery
                    </a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white' : 'text-gray-700 hover:bg-[#004AAD]/10 hover:text-[#004AAD]' }} px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300">
                        Contact
                    </a>
                </div>

                <!-- CTA Button & Mobile Menu Toggle -->
                <div class="flex items-center space-x-4">
                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '6281214696299') }}" target="_blank" class="hidden sm:flex items-center bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:from-[#28769A] hover:to-[#004AAD] text-white px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Book Now
                    </a>
                    
                    <!-- Mobile Menu Button -->
                    <button onclick="toggleMobileMenu()" class="lg:hidden p-2 rounded-lg text-[#004AAD] hover:bg-[#004AAD]/10 transition-colors">
                        <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden bg-gradient-to-b from-white to-[#BDDADB]/10 border-t border-[#004AAD]/10">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white' : 'text-gray-700 hover:bg-[#004AAD]/10' }} block px-4 py-3 rounded-xl text-base font-semibold transition-all">
                    🏠 Home
                </a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white' : 'text-gray-700 hover:bg-[#004AAD]/10' }} block px-4 py-3 rounded-xl text-base font-semibold transition-all">
                    ℹ️ About
                </a>
                <a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white' : 'text-gray-700 hover:bg-[#004AAD]/10' }} block px-4 py-3 rounded-xl text-base font-semibold transition-all">
                    📦 Services
                </a>
                <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white' : 'text-gray-700 hover:bg-[#004AAD]/10' }} block px-4 py-3 rounded-xl text-base font-semibold transition-all">
                    📸 Gallery
                </a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white' : 'text-gray-700 hover:bg-[#004AAD]/10' }} block px-4 py-3 rounded-xl text-base font-semibold transition-all">
                    📞 Contact
                </a>
                <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '6281214696299') }}" target="_blank" class="flex items-center justify-center bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white px-4 py-3 rounded-xl text-base font-bold hover:from-[#28769A] hover:to-[#004AAD] transition-all mt-2 shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Book via WhatsApp
                </a>
            </div>
        </div>
    </nav>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const menuIcon = document.getElementById('menuIcon');
            const closeIcon = document.getElementById('closeIcon');
            
            menu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        }
    </script>

    <!-- Main Content -->
    <main class="pt-20 min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#004AAD] text-white overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#BDDADB]/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Company Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        @if(isset($global_settings['logo']) && $global_settings['logo'])
                            <img class="h-12 w-auto" src="{{ asset('storage/' . $global_settings['logo']) }}" alt="Logo">
                        @else
                            <h3 class="text-2xl font-extrabold">SAFARISTA</h3>
                        @endif
                    </div>
                    <p class="text-white/90 leading-relaxed mb-6 max-w-md">
                        {{ $global_settings['site_description'] ?? 'Penyedia layanan outbound profesional terbaik di Bandung Selatan. Ciptakan pengalaman tak terlupakan untuk tim Anda.' }}
                    </p>
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        @if(isset($global_settings['instagram']))
                        <a href="{{ $global_settings['instagram'] }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        @endif
                        @if(isset($global_settings['tiktok']))
                        <a href="{{ $global_settings['tiktok'] }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/></svg>
                        </a>
                        @endif
                        <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '6281214696299') }}" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-4 text-[#BDDADB]">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-white/80 hover:text-white transition-colors flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-white/80 hover:text-white transition-colors flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>About Us</a></li>
                        <li><a href="{{ route('services') }}" class="text-white/80 hover:text-white transition-colors flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>Services</a></li>
                        <li><a href="{{ route('gallery') }}" class="text-white/80 hover:text-white transition-colors flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>Gallery</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white/80 hover:text-white transition-colors flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-bold mb-4 text-[#BDDADB]">Contact Info</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5 text-[#BDDADB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span class="text-white/90">{{ $global_settings['phone'] ?? '-' }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5 text-[#BDDADB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="text-white/90 break-all">{{ $global_settings['email'] ?? '-' }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5 text-[#BDDADB]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="text-white/90">{{ $global_settings['address'] ?? '-' }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 border-t border-white/10">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-white/80 text-sm text-center md:text-left">
                        © {{ date('Y') }} <span class="font-semibold">{{ $global_settings['site_name'] ?? 'Bumi Tirta Wisata' }}</span>. All rights reserved.
                    </p>
                    <div class="flex items-center gap-4 text-sm text-white/80">
                        <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                        <span>•</span>
                        <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
