@extends('layouts.public')

@section('title', 'About Us - ' . config('app.name'))

@section('content')
@if($about)
<!-- Hero Section -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
    <!-- Background -->
    @if($about->hero_background)
        <div class="absolute inset-0">
            <img src="{{ asset('storage/' . $about->hero_background) }}" alt="Hero Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-[#004AAD]/90 to-[#28769A]/90"></div>
        </div>
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#BDDADB]"></div>
    @endif

    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white py-20">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6" data-aos="fade-up">
            {{ $about->hero_title ?? 'Tentang Kami' }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            {{ $about->hero_subtitle ?? 'Kenali lebih dekat tentang kami' }}
        </p>
    </div>
</section>

<!-- Company Profile Section -->
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Image -->
            <div data-aos="fade-right">
                @if($about->image)
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" class="w-full h-[500px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                @else
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#BDDADB] h-[500px] flex items-center justify-center">
                        <svg class="w-32 h-32 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                @endif
            </div>

            <!-- Content -->
            <div data-aos="fade-left">
                <span class="inline-block px-6 py-2 bg-gradient-to-r from-[#004AAD]/10 to-[#28769A]/10 border border-[#004AAD]/20 text-[#004AAD] rounded-full text-sm font-bold mb-6">
                    🏢 PROFIL PERUSAHAAN
                </span>

                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">
                    {{ $about->title }}
                </h2>

                <div class="prose prose-lg max-w-none text-gray-600 mb-8">
                    {!! nl2br(e($about->content)) !!}
                </div>

                @if($about->service_area || $about->focus_services)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        @if($about->service_area)
                            <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-xl">
                                <svg class="w-6 h-6 text-[#004AAD] flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1">Area Layanan</h4>
                                    <p class="text-sm text-gray-600">{{ $about->service_area }}</p>
                                </div>
                            </div>
                        @endif

                        @if($about->focus_services)
                            <div class="flex items-start space-x-3 p-4 bg-green-50 rounded-xl">
                                <svg class="w-6 h-6 text-green-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1">Fokus Layanan</h4>
                                    <p class="text-sm text-gray-600">{{ $about->focus_services }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                @if($about->highlight_text)
                    <div class="bg-gradient-to-r from-[#004AAD]/5 to-[#28769A]/5 border-l-4 border-[#004AAD] p-4 rounded-r-xl">
                        <p class="text-gray-700 italic">{{ $about->highlight_text }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
@if($about->vision || $missions->count() > 0)
<section class="py-16 md:py-24 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-6 py-2 bg-gradient-to-r from-[#004AAD]/10 to-[#28769A]/10 border border-[#004AAD]/20 text-[#004AAD] rounded-full text-sm font-bold mb-4">
                🎯 VISI & MISI
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">
                Visi & Misi Kami
            </h2>
        </div>

        <!-- Vision -->
        @if($about->vision)
            <div class="mb-12" data-aos="fade-up">
                <div class="bg-gradient-to-br from-[#004AAD] to-[#28769A] rounded-3xl p-8 md:p-12 text-white shadow-2xl">
                    <h3 class="text-2xl font-bold mb-4 flex items-center">
                        <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Visi
                    </h3>
                    <p class="text-xl md:text-2xl leading-relaxed">{{ $about->vision }}</p>
                </div>
            </div>
        @endif

        <!-- Mission -->
        @if($missions->count() > 0)
            <div data-aos="fade-up">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-[#004AAD]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Misi
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($missions as $index => $mission)
                        <div class="flex items-start space-x-4 p-6 bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#004AAD] to-[#28769A] rounded-lg flex items-center justify-center text-white font-bold">
                                    {{ $index + 1 }}
                                </div>
                            </div>
                            <p class="text-gray-700 flex-1">{{ $mission->mission_text }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endif

@if(isset($certifications) && $certifications->count() > 0)
<section class="py-16 md:py-24 bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-6 py-2 bg-gradient-to-r from-[#004AAD]/10 to-[#28769A]/10 border border-[#004AAD]/20 text-[#004AAD] rounded-full text-sm font-bold mb-4">
                📜 LISENSI & SERTIFIKASI
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                Legalitas & Kompetensi
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Bukti komitmen kami terhadap standar keamanan dan profesionalisme tinggi
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-8">
            @foreach($certifications as $index => $cert)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-2xl border border-gray-100 transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col items-center text-center">
                        <div class="relative w-full aspect-[3/4] mb-4 overflow-hidden rounded-xl bg-gray-50">
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
                        
                        @if($cert->issuer)
                            <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">
                                {{ $cert->issuer }}
                            </p>
                        @endif
                        
                        <div class="mt-3">
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
    </div>
</section>
@endif

<!-- Company Values Section -->
@if($values->count() > 0)
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-6 py-2 bg-gradient-to-r from-[#004AAD]/10 to-[#28769A]/10 border border-[#004AAD]/20 text-[#004AAD] rounded-full text-sm font-bold mb-4">
                ⭐ KEUNGGULAN KAMI
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                Mengapa Memilih Kami?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kami berkomitmen memberikan pelayanan terbaik dengan berbagai keunggulan
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($values as $index => $value)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="bg-gradient-to-br from-white to-gray-50 border-2 border-gray-200 rounded-2xl p-8 hover:border-[#004AAD] hover:shadow-2xl transition-all duration-300 h-full">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-gradient-to-br from-[#004AAD] to-[#28769A] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            @php
                                $iconMap = [
                                    'shield-check' => '🛡️',
                                    'academic-cap' => '🎓',
                                    'adjustments' => '⚙️',
                                    'users' => '👥',
                                    'camera' => '📸',
                                    'home' => '🏠',
                                ];
                                $displayIcon = $iconMap[$value->icon] ?? $value->icon;
                            @endphp
                            <span class="text-4xl">{{ $displayIcon }}</span>
                        </div>

                        <!-- Content -->
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $value->title }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $value->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Team Section -->
@if($team->count() > 0)
<section class="py-16 md:py-24 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-block px-6 py-2 bg-gradient-to-r from-[#004AAD]/10 to-[#28769A]/10 border border-[#004AAD]/20 text-[#004AAD] rounded-full text-sm font-bold mb-4">
                👥 TIM KAMI
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                Tim Profesional Kami
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Didukung oleh tim berpengalaman dan bersertifikat
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($team as $index => $member)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                        <!-- Photo -->
                        <div class="relative h-80 bg-gradient-to-br from-[#004AAD] to-[#28769A] overflow-hidden">
                            @if($member->photo)
                                <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-32 h-32 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            @endif

                            @if($member->is_certified)
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 bg-yellow-500 text-white text-xs font-bold rounded-full shadow-lg">
                                        ✓ Certified
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Info -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $member->name }}</h3>
                            <p class="text-[#004AAD] font-semibold mb-3">{{ $member->role }}</p>
                            @if($member->bio)
                                <p class="text-gray-600 text-sm">{{ $member->bio }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="relative py-20 md:py-32 overflow-hidden">
    <!-- Background -->
    @if($about->cta_background)
        <div class="absolute inset-0">
            <img src="{{ asset('storage/' . $about->cta_background) }}" alt="CTA Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-[#004AAD]/95 to-[#28769A]/95"></div>
        </div>
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#BDDADB]"></div>
    @endif

    <!-- Content -->
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-6" data-aos="fade-up">
            {{ $about->cta_title ?? 'Siap Berpetualang Bersama Kami?' }}
        </h2>
        <p class="text-xl md:text-2xl text-white/90 mb-10 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            {{ $about->cta_subtitle ?? 'Hubungi kami sekarang untuk konsultasi gratis!' }}
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="200">
            @if($about->cta_whatsapp_number)
                <a href="https://wa.me/{{ $about->cta_whatsapp_number }}" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-white text-[#004AAD] font-bold rounded-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    {{ $about->cta_whatsapp_text ?? 'Chat WhatsApp' }}
                </a>
            @endif

            <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-xl hover:bg-white hover:text-[#004AAD] transform hover:-translate-y-1 transition-all">
                {{ $about->cta_packages_text ?? 'Lihat Paket Kami' }}
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

@else
<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">About content not found</h2>
        <p class="text-gray-600">Please add about content from admin panel</p>
    </div>
</div>
@endif
@endsection
