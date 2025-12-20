@extends('layouts.public')

@section('content')
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(0, 74, 173, 0.5); }
            50% { box-shadow: 0 0 40px rgba(0, 74, 173, 0.8); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-slideInLeft { animation: slideInLeft 0.8s ease-out forwards; }
        .animate-slideInRight { animation: slideInRight 0.8s ease-out forwards; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        
        /* Wave Animation for Hero */
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        .wave svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 80px;
        }
        .wave .shape-fill {
            fill: #FFFFFF;
        }
        
        /* Parallax Mountains */
        .mountain {
            position: absolute;
            bottom: 0;
            width: 0;
            height: 0;
            border-left: 150px solid transparent;
            border-right: 150px solid transparent;
            opacity: 0.3;
        }
        .mountain-1 {
            left: 10%;
            border-bottom: 200px solid #004AAD;
        }
        .mountain-2 {
            left: 30%;
            border-bottom: 250px solid #28769A;
            border-left: 180px solid transparent;
            border-right: 180px solid transparent;
        }
        .mountain-3 {
            right: 15%;
            border-bottom: 180px solid #BDDADB;
            border-left: 120px solid transparent;
            border-right: 120px solid transparent;
        }
    </style>

    <!-- Hero Section with Parallax Mountains -->
    <div class="relative bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#004AAD] h-screen flex items-center justify-center overflow-hidden">
        <!-- Animated Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 border-4 border-white rounded-full animate-float"></div>
            <div class="absolute top-40 right-20 w-24 h-24 border-4 border-white rounded-full animate-float" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-32 left-1/4 w-40 h-40 border-4 border-white rounded-full animate-float" style="animation-delay: 2s;"></div>
        </div>

        <!-- Parallax Mountains -->
        <div class="mountain mountain-1"></div>
        <div class="mountain mountain-2"></div>
        <div class="mountain mountain-3"></div>
        
        <!-- Hero Content -->
        <div class="relative z-10 text-center px-4 max-w-5xl animate-fadeInUp">
            <!-- Icon Badge -->
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-6 animate-pulse-glow">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 tracking-tight leading-tight">
                Petualangan Dimulai <br/>
                <span class="text-[#BDDADB]">Dari Sini</span>
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-10 max-w-3xl mx-auto leading-relaxed">
                Ciptakan momen tak terlupakan bersama tim Anda melalui pengalaman outbound profesional di Bandung Selatan
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('services') }}" class="group relative inline-flex items-center justify-center px-8 py-4 bg-white text-[#004AAD] font-bold rounded-full overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <span class="relative z-10">Jelajahi Paket</span>
                    <svg class="w-5 h-5 ml-2 relative z-10 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '6281214696299') }}" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-[#004AAD] transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="py-16 bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#BDDADB]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center animate-fadeInUp" style="animation-delay: 0.1s;">
                    <div class="text-5xl font-extrabold text-white mb-2">500+</div>
                    <div class="text-white/90 font-medium">Event Sukses</div>
                </div>
                <div class="text-center animate-fadeInUp" style="animation-delay: 0.2s;">
                    <div class="text-5xl font-extrabold text-white mb-2">100+</div>
                    <div class="text-white/90 font-medium">Perusahaan</div>
                </div>
                <div class="text-center animate-fadeInUp" style="animation-delay: 0.3s;">
                    <div class="text-5xl font-extrabold text-white mb-2">10K+</div>
                    <div class="text-white/90 font-medium">Peserta</div>
                </div>
                <div class="text-center animate-fadeInUp" style="animation-delay: 0.4s;">
                    <div class="text-5xl font-extrabold text-white mb-2">100%</div>
                    <div class="text-white/90 font-medium">Kepuasan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Us Section -->
    @if($about)
    <section class="py-16 md:py-24 bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#BDDADB] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Company Profile Part (Matching About Page) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center mb-16">
                <!-- Image -->
                <div data-aos="fade-right">
                    @if($about->image)
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white/20">
                            <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" class="w-full h-[400px] lg:h-[500px] object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>
                    @else
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl bg-white/10 backdrop-blur-sm border-4 border-white/20 h-[400px] lg:h-[500px] flex items-center justify-center">
                            <svg class="w-32 h-32 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Content -->
                <div data-aos="fade-left">
                    <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-full text-sm font-bold mb-6">
                        🌟 TENTANG KAMI
                    </span>

                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 leading-tight">
                        {{ $about->title ?? 'Bumi Tirta Wisata' }}
                    </h2>

                    <div class="prose prose-lg max-w-none text-white/90 mb-8">
                        {!! nl2br(e($about->content)) !!}
                    </div>

                    <a href="{{ route('about') }}" class="inline-flex items-center px-8 py-4 bg-white text-[#004AAD] font-bold rounded-xl hover:shadow-2xl hover:translate-y-[-2px] transition-all duration-300 group">
                        <span>Pelajari Lebih Lanjut</span>
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Vision & Mission Removed as per request -->
        </div>
    </section>
    @endif

    <!-- Services Section with Modern Cards -->
    <div class="py-16 md:py-24 bg-gradient-to-br from-[#28769A] via-[#004AAD] to-[#BDDADB] relative overflow-hidden">
        <!-- Background Decoration -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-[#004AAD]/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-[#28769A]/5 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-12 md:mb-16">
                <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-full text-sm font-bold mb-4 shadow-sm">
                    ✨ PAKET KAMI
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4">
                    Paket <span class="text-[#BDDADB]">Petualangan</span> Populer
                </h2>
                <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto">Pilih pengalaman terbaik untuk tim Anda dengan fasilitas lengkap</p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach ($services as $index => $service)
                <div class="group relative">
                    <!-- Card -->
                    <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                        <!-- Image Section -->
                        <div class="relative h-56 md:h-64 overflow-hidden">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#BDDADB] flex items-center justify-center">
                                    <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            
                            <!-- Price Badge - Better Visibility -->
                            <div class="absolute top-4 right-4 bg-white text-[#004AAD] px-4 py-2.5 rounded-2xl font-bold text-sm shadow-2xl border-2 border-[#004AAD]">
                                @if($service->price)
                                    <div class="text-base font-extrabold">Rp. {{ number_format((float)$service->price, 0, ',', '.') }}</div>
                                    <div class="text-xs text-[#28769A] font-semibold">{{ $service->price_unit ?? '/ Orang' }}</div>
                                @else
                                    <span class="text-xs font-bold">Hubungi kami</span>
                                @endif
                            </div>

                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4 bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white px-4 py-1.5 rounded-full text-xs font-bold shadow-lg">
                                {{ $service->category === 'paket' ? 'PACKAGE' : 'ADD-ON' }}
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="p-6 md:p-7">
                            <!-- Title -->
                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-2 group-hover:text-[#004AAD] transition-colors line-clamp-2">
                                {{ $service->title }}
                            </h3>
                            
                            <!-- Subtitle -->
                            @if($service->subtitle)
                                <p class="text-[#28769A] text-sm font-medium mb-4 line-clamp-1">{{ $service->subtitle }}</p>
                            @endif

                            <!-- Features Preview -->
                            @if($service->features && count($service->features) > 0)
                                <div class="mb-5 space-y-2">
                                    @foreach(array_slice($service->features, 0, 3) as $feature)
                                        <div class="flex items-center bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 px-3 py-2 rounded-full hover:border-green-300 transition-all duration-300 hover:shadow-md group">
                                            <div class="w-5 h-5 mr-2 flex-shrink-0 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                            <span class="text-sm font-semibold text-gray-700 leading-tight">{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                    @if(count($service->features) > 3)
                                        <p class="text-xs text-[#004AAD] font-semibold ml-7">+{{ count($service->features) - 3 }} fitur lainnya</p>
                                    @endif
                                </div>
                            @elseif($service->description)
                                <p class="text-gray-600 text-sm mb-5 line-clamp-3">{{ $service->description }}</p>
                            @endif
                            
                            <!-- CTA Button -->
                            <button onclick="openServiceModal({{ $service->id }})" class="w-full bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:from-[#28769A] hover:to-[#004AAD] text-white font-bold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center group">
                                <span>Lihat Detail</span>
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Decorative Element -->
                        <div class="absolute -bottom-2 -right-2 w-24 h-24 bg-gradient-to-br from-[#BDDADB]/20 to-transparent rounded-tl-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12 md:mt-16">
                <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-8 md:px-10 py-4 bg-white border-2 border-[#004AAD] text-[#004AAD] font-bold rounded-full shadow-lg hover:bg-[#004AAD] hover:text-white transform hover:scale-105 transition-all duration-300">
                    <span>Lihat Semua Paket</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>


    <!-- Add-ons Section -->
    <div class="py-16 md:py-24 bg-gradient-to-br from-[#28769A] via-[#BDDADB] to-[#004AAD] relative overflow-hidden">
        <!-- Background Decoration -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 right-10 w-64 h-64 bg-[#BDDADB]/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-10 w-80 h-80 bg-[#004AAD]/10 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-12 md:mb-16">
                <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-full text-sm font-bold mb-4 shadow-sm">
                    ⭐ LAYANAN TAMBAHAN
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4">
                    Sempurnakan <span class="text-[#BDDADB]">Pengalaman</span> Anda
                </h2>
                <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto">Tingkatkan event Anda dengan layanan tambahan yang kami sediakan</p>
            </div>

            <!-- Add-ons Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach ($addons as $index => $addon)
                <div class="group relative">
                    <!-- Card -->
                    <div class="relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100 h-full flex flex-col">
                        <!-- Image Section -->
                        <div class="relative h-48 overflow-hidden">
                            @if($addon->image)
                                <img src="{{ asset('storage/' . $addon->image) }}" alt="{{ $addon->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-[#28769A] via-[#004AAD] to-[#BDDADB] flex items-center justify-center">
                                    <svg class="w-20 h-20 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4 bg-gradient-to-r from-[#28769A] to-[#BDDADB] text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                ADD-ON
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="p-5 md:p-6 flex-1 flex flex-col">
                            <!-- Title -->
                            <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2 group-hover:text-[#004AAD] transition-colors line-clamp-2">
                                {{ $addon->title }}
                            </h3>
                            
                            <!-- Price - Larger & More Prominent -->
                            <div class="mb-4 text-center">
                                <div class="inline-block bg-white border-2 border-[#004AAD] px-5 py-3 rounded-2xl shadow-xl hover:shadow-2xl transition-shadow">
                                    @if($addon->price)
                                        <div class="text-2xl md:text-3xl font-extrabold text-[#004AAD]">Rp {{ number_format((float)$addon->price, 0, ',', '.') }}</div>
                                        <div class="text-sm text-[#28769A] font-bold mt-1">{{ $addon->price_unit ?? '/ Paket' }}</div>
                                    @else
                                        <div class="text-lg font-bold text-[#004AAD]">Hubungi Kami</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Features Preview -->
                            @if($addon->features && count($addon->features) > 0)
                                <div class="mb-4 space-y-2 flex-1">
                                    @foreach(array_slice($addon->features, 0, 2) as $feature)
                                        <div class="flex items-center bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 px-3 py-2 rounded-full hover:border-green-300 transition-all duration-300 hover:shadow-md group">
                                            <div class="w-5 h-5 mr-2 flex-shrink-0 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                            <span class="text-xs font-semibold text-gray-700 leading-tight">{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                    @if(count($addon->features) > 2)
                                        <p class="text-xs text-[#004AAD] font-semibold ml-5.5">+{{ count($addon->features) - 2 }} lainnya</p>
                                    @endif
                                </div>
                            @elseif($addon->description)
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-1">{{ $addon->description }}</p>
                            @endif
                            
                            <!-- CTA Button -->
                            <button onclick="openServiceModal({{ $addon->id }})" class="w-full bg-gradient-to-r from-[#28769A] to-[#BDDADB] hover:from-[#BDDADB] hover:to-[#28769A] text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center group">
                                <span>Lihat Detail</span>
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Decorative Element -->
                        <div class="absolute -bottom-2 -right-2 w-20 h-20 bg-gradient-to-br from-[#BDDADB]/20 to-transparent rounded-tl-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12 md:mt-16">
                <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-8 md:px-10 py-4 bg-white border-2 border-[#28769A] text-[#28769A] font-bold rounded-full shadow-lg hover:bg-[#28769A] hover:text-white transform hover:scale-105 transition-all duration-300">
                    <span>Lihat Semua Add-ons</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Gallery Preview -->
    <div class="py-20 bg-gradient-to-b from-[#004AAD] via-[#28769A] to-[#BDDADB]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fadeInUp">
                <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-full text-sm font-semibold mb-4">GALERI</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Momen Tak Terlupakan</h2>
                <p class="text-xl text-white/90">Lihat keseruan petualangan bersama kami</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($galleries as $index => $gallery)
                    <div class="relative group overflow-hidden rounded-2xl aspect-square shadow-lg hover:shadow-2xl transition-all duration-500 animate-fadeInUp" style="animation-delay: {{ $index * 0.05 }}s;">
                        <img src="{{ asset('storage/' . $gallery->image) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#004AAD]/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                            <div class="text-white">
                                @if($gallery->title)
                                <p class="font-bold">{{ $gallery->title }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('gallery') }}" class="inline-flex items-center justify-center px-8 py-4 border-2 border-[#004AAD] text-[#004AAD] font-bold rounded-full hover:bg-[#004AAD] hover:text-white transition-all duration-300">
                    Lihat Semua Foto
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Certifications Section -->
    @if(isset($certifications) && $certifications->count() > 0)
    <div class="py-20 bg-gradient-to-br from-[#BDDADB] via-[#004AAD] to-[#28769A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fadeInUp">
                <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-full text-sm font-semibold mb-4">LISENSI & SERTIFIKASI</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Legalitas & Kompetensi</h2>
                <p class="text-xl text-white/90">Bukti komitmen kami terhadap standar keamanan dan profesionalisme</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-8">
                @foreach($certifications as $index => $cert)
                    <div class="group h-full animate-fadeInUp" style="animation-delay: {{ $index * 100 }}ms;">
                        <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col items-center text-center">
                            <div class="relative w-full aspect-[3/4] mb-4 overflow-hidden rounded-xl bg-gray-50 border border-gray-100">
                                @if($cert->certificate_image)
                                    <img src="{{ asset('storage/' . $cert->certificate_image) }}" alt="{{ $cert->title }}" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300">
                                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            
                            <h3 class="font-bold text-gray-900 mb-2 leading-tight group-hover:text-[#004AAD] transition-colors">
                                {{ $cert->title }}
                            </h3>
                            
                            <div class="mt-auto pt-2">
                                @php
                                    $typeLabel = match($cert->type) {
                                        'company' => 'Legalitas Perusahaan',
                                        'guide' => 'Pemandu Wisata',
                                        'instructor' => 'Instruktur',
                                        default => ucfirst($cert->type)
                                    };
                                @endphp
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                    @if($cert->type == 'company') bg-blue-100 text-blue-800
                                    @elseif($cert->type == 'guide') bg-green-100 text-green-800
                                    @else bg-purple-100 text-purple-800 @endif">
                                    {{ $typeLabel }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                 <a href="{{ route('about') }}" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-[#004AAD] transition-all duration-300">
                    Pelajari Lebih Lanjut
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    @endif


    <!-- Contact Section -->
    <div id="contact-section" class="py-20 bg-gradient-to-br from-[#BDDADB] via-[#004AAD] to-[#28769A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fadeInUp">
                <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-full text-sm font-semibold mb-4">HUBUNGI KAMI</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Butuh Bantuan?</h2>
                <p class="text-xl text-white/90 max-w-2xl mx-auto">Hubungi Safarista sekarang untuk konsultasi event profesional. Tim kami siap membantu merancang acara berkesan dan membanggakan.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Info Side -->
                <div class="space-y-6 animate-slideInLeft">
                    <!-- WhatsApp -->
                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '6281214696299') }}" target="_blank" class="group flex items-start p-6 bg-gradient-to-br from-[#f0f9ff] to-white rounded-2xl border-2 border-transparent hover:border-[#28769A] transition-all duration-300 hover:shadow-xl">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-gradient-to-br from-[#25D366] to-[#128C7E] rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 flex-1">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">WhatsApp</h3>
                            <p class="text-[#004AAD] font-semibold text-lg">{{ env('WHATSAPP_NUMBER', '6281214696299') }}</p>
                            <p class="text-sm text-gray-500 mt-1">Chat langsung dengan tim kami</p>
                        </div>
                        <svg class="w-5 h-5 text-[#28769A] group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <!-- Email -->
                    <a href="mailto:{{ $global_settings['email'] ?? 'info@safarista.com' }}" class="group flex items-start p-6 bg-gradient-to-br from-[#f0f9ff] to-white rounded-2xl border-2 border-transparent hover:border-[#28769A] transition-all duration-300 hover:shadow-xl">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-gradient-to-br from-[#004AAD] to-[#28769A] rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 flex-1">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Email</h3>
                            <p class="text-[#004AAD] font-semibold">{{ $global_settings['email'] ?? 'info@safarista.com' }}</p>
                            <p class="text-sm text-gray-500 mt-1">Kirim pertanyaan detail Anda</p>
                        </div>
                        <svg class="w-5 h-5 text-[#28769A] group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <!-- Phone -->
                    <a href="tel:{{ $global_settings['phone'] ?? '6281214696299' }}" class="group flex items-start p-6 bg-gradient-to-br from-[#f0f9ff] to-white rounded-2xl border-2 border-transparent hover:border-[#28769A] transition-all duration-300 hover:shadow-xl">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-gradient-to-br from-[#28769A] to-[#BDDADB] rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 flex-1">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Phone</h3>
                            <p class="text-[#004AAD] font-semibold">{{ $global_settings['phone'] ?? '082315328691' }}</p>
                            <p class="text-sm text-gray-500 mt-1">Telepon untuk konsultasi langsung</p>
                        </div>
                        <svg class="w-5 h-5 text-[#28769A] group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <!-- Location -->
                    <div class="flex items-start p-6 bg-gradient-to-br from-[#f0f9ff] to-white rounded-2xl border-2 border-[#BDDADB]">
                        <div class="flex-shrink-0">
                            <div class="w-14 h-14 bg-gradient-to-br from-[#BDDADB] to-[#28769A] rounded-xl flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 flex-1">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Lokasi</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $global_settings['address'] ?? 'Bandung Selatan, Indonesia' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Side -->
                <div class="animate-slideInRight">
                    <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl shadow-2xl border-2 border-white/30">
                        <h3 class="text-2xl font-bold text-white mb-2">Kirim Pesan</h3>
                        <p class="text-white/80 mb-6">Isi form di bawah dan kami akan segera menghubungi Anda</p>
                        
                        
                        @if(session('success'))
                            <div id="successNotification" class="mb-6 overflow-hidden">
                                <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-5 rounded-lg shadow-lg animate-slideInRight">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center animate-bounce">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="text-lg font-bold text-green-800 mb-1">Berhasil Terkirim! 🎉</h4>
                                            <p class="text-green-700">{{ session('success') }}</p>
                                        </div>
                                        <button onclick="closeNotification()" class="ml-4 text-green-500 hover:text-green-700 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mt-3 h-1 bg-green-200 rounded-full overflow-hidden">
                                        <div class="h-full bg-green-500 animate-progress"></div>
                                    </div>
                                </div>
                            </div>
                            <style>
                                @keyframes progress {
                                    from { width: 100%; }
                                    to { width: 0%; }
                                }
                                .animate-progress {
                                    animation: progress 5s linear forwards;
                                }
                                @keyframes slideOut {
                                    to {
                                        transform: translateX(120%);
                                        opacity: 0;
                                    }
                                }
                            </style>
                            <script>
                                function closeNotification() {
                                    const notification = document.getElementById('successNotification');
                                    notification.style.animation = 'slideOut 0.5s ease-out forwards';
                                    setTimeout(() => notification.remove(), 500);
                                }
                                
                                // Auto-dismiss after 5 seconds
                                setTimeout(() => {
                                    const notification = document.getElementById('successNotification');
                                    if (notification) closeNotification();
                                }, 5000);
                            </script>
                        @endif

                        @if($errors->any())
                            <div id="errorNotification" class="mb-6 overflow-hidden">
                                <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-5 rounded-lg shadow-lg animate-slideInRight">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center animate-pulse">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="text-lg font-bold text-red-800 mb-1">Oops! Ada Kesalahan ⚠️</h4>
                                            <ul class="text-red-700 text-sm space-y-1">
                                                @foreach($errors->all() as $error)
                                                    <li>• {{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <button onclick="closeErrorNotification()" class="ml-4 text-red-500 hover:text-red-700 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function closeErrorNotification() {
                                    const notification = document.getElementById('errorNotification');
                                    notification.style.animation = 'slideOut 0.5s ease-out forwards';
                                    setTimeout(() => notification.remove(), 500);
                                }
                            </script>
                        @endif


                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                            @csrf
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all" placeholder="Masukkan nama Anda">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all" placeholder="nama@email.com">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                                <input type="text" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all" placeholder="08xxxxxxxxxx">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Subjek</label>
                                <input type="text" name="subject" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all" placeholder="Misal: Konsultasi Paket Outbound">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Pesan</label>
                                <textarea name="message" rows="4" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none" placeholder="Ceritakan kebutuhan event Anda..."></textarea>
                            </div>
                            
                            <button type="submit" class="w-full bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white font-bold py-4 rounded-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                                Kirim Pesan
                                <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative py-24 overflow-hidden">
        <!-- Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#004AAD]"></div>
        
        <!-- Animated Circles -->
        <div class="absolute top-10 left-10 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
        
        <div class="relative max-w-5xl mx-auto px-4 text-center">
            <div class="animate-fadeInUp">
                <h2 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
                    Siap Menciptakan<br/>Kenangan Tak Terlupakan?
                </h2>
                <p class="text-xl md:text-2xl text-[#BDDADB] mb-10 max-w-3xl mx-auto">
                    Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik untuk tim Anda
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-10 py-5 bg-white text-[#004AAD] font-bold rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 text-lg">
                        Hubungi Kami
                        <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </a>
                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '6281214696299') }}" target="_blank" class="inline-flex items-center justify-center px-10 py-5 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-[#004AAD] transition-all duration-300 text-lg">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Detail Modal - Mobile Optimized -->
    <div id="serviceModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-50" onclick="if(event.target === this) closeServiceModal()">
        <div class="h-full overflow-y-auto">
            <div class="min-h-full px-0 sm:px-4 py-0 sm:py-8 flex items-end sm:items-center justify-center">
                <div class="bg-white rounded-t-3xl sm:rounded-3xl shadow-2xl w-full sm:max-w-4xl relative max-h-screen sm:max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
                    <!-- Close Button -->
                    <button onclick="closeServiceModal()" class="sticky top-4 right-4 float-right z-20 bg-white hover:bg-gray-100 p-3 rounded-full shadow-xl transition-all">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <div id="modalContent" class="clear-both"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const servicesData = @json($services);

        function openServiceModal(id) {
            const service = servicesData.find(s => s.id === id);
            if (!service) return;

            let stars = '';
            if (service.rating) {
                for (let i = 1; i <= 5; i++) {
                    stars += i <= Math.floor(service.rating) 
                        ? '<svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>'
                        : '<svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>';
                }
            }

            const img = service.image 
                ? `<img src="/storage/${service.image}" class="w-full h-full object-cover">`
                : `<div class="w-full h-full bg-gradient-to-br from-[#004AAD] to-[#28769A] flex items-center justify-center"><svg class="w-32 h-32 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>`;

            const price = service.price 
                ? `Rp. ${new Intl.NumberFormat('id-ID').format(service.price)} ${service.price_unit || ''}`
                : 'Hubungi untuk harga';

            let features = '';
            if (service.features && service.features.length > 0) {
                features = `<div class="mb-6"><h3 class="text-lg md:text-xl font-bold text-gray-800 mb-4">✨ Features & Inclusions:</h3><div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">`;
                service.features.forEach(f => {
                    features += `<div class="flex items-center bg-gradient-to-r from-blue-50 to-blue-100/50 text-[#004AAD] px-3 md:px-4 py-2.5 md:py-3 rounded-xl border border-blue-200 hover:border-blue-300 transition-colors"><svg class="w-4 h-4 md:w-5 md:h-5 mr-2 flex-shrink-0 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg><span class="text-xs md:text-sm font-semibold">${f}</span></div>`;
                });
                features += `</div></div>`;
            }

            document.getElementById('modalContent').innerHTML = `
                <div class="relative h-48 sm:h-64 md:h-72 overflow-hidden sm:rounded-t-3xl">${img}<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div></div>
                <div class="p-5 sm:p-6 md:p-8">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 mb-2 leading-tight">${service.title}</h2>
                    ${service.subtitle ? `<p class="text-[#28769A] text-base md:text-lg mb-4 font-medium">${service.subtitle}</p>` : ''}
                    <div class="flex flex-wrap items-center gap-3 md:gap-4 mb-6">
                        ${service.location ? `<div class="flex items-center text-gray-600 text-sm md:text-base"><svg class="w-4 h-4 md:w-5 md:h-5 mr-1.5 md:mr-2 text-[#004AAD]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg><span class="font-medium">${service.location}</span></div>` : ''}
                        ${service.rating ? `<div class="flex items-center">${stars}<span class="ml-2 text-xs md:text-sm text-gray-600 font-medium">(${parseFloat(service.rating).toFixed(1)})</span></div>` : ''}
                    </div>
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <div class="inline-block bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white px-5 md:px-6 py-3 md:py-4 rounded-2xl shadow-lg">
                            <span class="text-xl md:text-2xl font-bold">${price}</span>
                        </div>
                    </div>
                    ${service.description ? `<div class="mb-6"><p class="text-gray-600 text-sm md:text-base leading-relaxed">${service.description}</p></div>` : ''}
                    ${features}
                    <a href="https://wa.me/6281214696299?text=Halo,%20saya%20tertarik%20dengan%20${encodeURIComponent(service.title)}" target="_blank" class="block w-full bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:from-[#28769A] hover:to-[#004AAD] text-white text-center font-bold py-4 md:py-5 rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-[1.02] transition-all">
                        <div class="flex items-center justify-center text-sm md:text-base">
                            <svg class="w-5 h-5 md:w-6 md:h-6 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            <span>Konsultasi via WhatsApp</span>
                        </div>
                    </a>
                </div>
            `;

            document.getElementById('serviceModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeServiceModal() {
            document.getElementById('serviceModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('keydown', e => e.key === 'Escape' && closeServiceModal());
    </script>

    <!-- Service Detail Modal -->
    <div id="serviceModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4" onclick="closeModal()">
        <div class="bg-white rounded-t-3xl sm:rounded-3xl shadow-2xl w-full sm:max-w-4xl relative max-h-screen sm:max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
            <button onclick="closeModal()" class="sticky top-4 right-4 float-right z-20 bg-white hover:bg-gray-100 p-3 rounded-full shadow-xl transition-all">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div id="modalContent"></div>
        </div>
    </div>

    <script>
        const services = @json($services->merge($addons));

        function openServiceModal(id) {
            const service = services.find(s => s.id === id);
            if (!service) return;

            let stars = '';
            if (service.rating) {
                for (let i = 1; i <= 5; i++) {
                    stars += i <= Math.floor(service.rating) 
                        ? '<svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>'
                        : '<svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>';
                }
            }

            const img = service.image 
                ? `<img src="/storage/${service.image}" class="w-full h-full object-cover">`
                : `<div class="w-full h-full bg-gradient-to-br from-[#004AAD] to-[#28769A] flex items-center justify-center"><svg class="w-32 h-32 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>`;

            const price = service.price 
                ? `Rp. ${new Intl.NumberFormat('id-ID').format(service.price)} ${service.price_unit || ''}`
                : 'Hubungi untuk harga';

            let features = '';
            if (service.features && service.features.length > 0) {
                features = `<div class="mb-6"><h3 class="text-lg md:text-xl font-bold text-gray-800 mb-4">✨ Features & Inclusions:</h3><div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">`;
                service.features.forEach(f => {
                    features += `<div class="flex items-center bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 px-3 md:px-4 py-2.5 md:py-3 rounded-full hover:border-green-300 transition-all duration-300 hover:shadow-md group"><div class="w-5 h-5 mr-2 flex-shrink-0 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform"><svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg></div><span class="text-xs md:text-sm font-semibold text-gray-700">${f}</span></div>`;
                });
                features += `</div></div>`;
            }

            document.getElementById('modalContent').innerHTML = `
                <div class="relative h-48 sm:h-64 md:h-72 overflow-hidden sm:rounded-t-3xl">${img}<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div></div>
                <div class="p-5 sm:p-6 md:p-8">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 mb-2 leading-tight">${service.title}</h2>
                    ${service.subtitle ? `<p class="text-[#28769A] text-base md:text-lg mb-4 font-medium">${service.subtitle}</p>` : ''}
                    <div class="flex flex-wrap items-center gap-3 md:gap-4 mb-6">
                        ${service.location ? `<div class="flex items-center text-gray-600 text-sm md:text-base"><svg class="w-4 h-4 md:w-5 md:h-5 mr-1.5 md:mr-2 text-[#004AAD]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg><span class="font-medium">${service.location}</span></div>` : ''}
                        ${service.rating ? `<div class="flex items-center">${stars}<span class="ml-2 text-xs md:text-sm text-gray-600 font-medium">(${parseFloat(service.rating).toFixed(1)})</span></div>` : ''}
                    </div>
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <div class="inline-block bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white px-5 md:px-6 py-3 md:py-4 rounded-2xl shadow-lg">
                            <span class="text-xl md:text-2xl font-bold">${price}</span>
                        </div>
                    </div>
                    ${service.description ? `<div class="mb-6"><p class="text-gray-600 text-sm md:text-base leading-relaxed">${service.description}</p></div>` : ''}
                    ${features}
                    <div class="flex flex-col sm:flex-row gap-3 md:gap-4 mt-8">
                        <a href="https://wa.me/${window.WHATSAPP_NUMBER || '6281214696299'}?text=Halo, saya tertarik dengan ${service.title}" target="_blank" class="flex-1 flex items-center justify-center bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 md:px-8 py-3 md:py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all text-sm md:text-base">
                            <svg class="w-5 h-5 md:w-6 md:h-6 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Pesan via WhatsApp
                        </a>
                        <a href="{{ route('contact') }}" class="flex-1 flex items-center justify-center bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:from-[#28769A] hover:to-[#004AAD] text-white px-6 md:px-8 py-3 md:py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all text-sm md:text-base">
                            <svg class="w-5 h-5 md:w-6 md:h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            `;

            document.getElementById('serviceModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('serviceModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
    </script>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '6281214696299') }}?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20paket%20outbound" 
       target="_blank" 
       class="fixed bottom-6 right-6 z-50 group">
        <!-- Button Container -->
        <div class="relative">
            <!-- Pulse Animation Ring -->
            <div class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-75"></div>
            
            <!-- Main Button -->
            <div class="relative bg-gradient-to-br from-green-500 to-green-600 text-white w-16 h-16 rounded-full shadow-2xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-green-500/50">
                <!-- WhatsApp Icon -->
                <svg class="w-9 h-9" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
            </div>
        </div>
        
        <!-- Tooltip -->
        <div class="absolute right-20 top-1/2 -translate-y-1/2 bg-gray-900 text-white px-4 py-2 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
            <span class="text-sm font-semibold">Chat dengan kami!</span>
            <!-- Arrow -->
            <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-full">
                <div class="border-8 border-transparent border-l-gray-900"></div>
            </div>
        </div>
    </a>

@endsection
