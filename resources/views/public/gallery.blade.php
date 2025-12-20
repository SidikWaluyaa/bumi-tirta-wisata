@extends('layouts.public')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#BDDADB] text-white py-16 md:py-24 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute w-96 h-96 bg-white/10 rounded-full -top-48 -left-48 animate-pulse"></div>
            <div class="absolute w-96 h-96 bg-white/10 rounded-full -bottom-48 -right-48 animate-pulse delay-1000"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full text-sm font-bold mb-6">
                📸 GALERI KAMI
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
                Momen <span class="text-[#BDDADB]">Berharga</span><br/>
                Yang Kami Ciptakan
            </h1>
            <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto">
                Lihat dokumentasi event-event seru yang telah kami selenggarakan
            </p>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="py-16 md:py-24 bg-gradient-to-br from-[#004AAD]/10 via-[#28769A]/10 to-[#BDDADB]/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($galleries && count($galleries) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach($galleries as $index => $gallery)
                        <div class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                            <div class="relative h-72 md:h-80 overflow-hidden">
                                @if($gallery->image)
                                    <img src="{{ asset('storage/' . $gallery->image) }}" 
                                         alt="{{ $gallery->title }}" 
                                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#BDDADB] flex items-center justify-center">
                                        <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                
                                <!-- Hover Content -->
                                <div class="absolute inset-0 flex items-end p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="text-white">
                                        <h3 class="text-xl font-bold mb-2">{{ $gallery->title }}</h3>
                                        @if($gallery->description)
                                            <p class="text-sm text-white/90 line-clamp-2">{{ $gallery->description }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- View Icon -->
                                <div class="absolute top-4 right-4 w-12 h-12 bg-white/20 backdrop-blur-md border border-white/30 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-1">{{ $gallery->title }}</h3>
                                @if($gallery->description)
                                    <p class="text-gray-600 text-sm line-clamp-2">{{ $gallery->description }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div class="w-32 h-32 bg-gradient-to-br from-[#BDDADB] to-[#28769A] rounded-full mx-auto mb-8 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Galeri Segera Hadir</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        Kami sedang mempersiapkan dokumentasi event-event terbaik kami untuk Anda
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white font-bold rounded-full shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                        <span>Hubungi Kami</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative py-20 md:py-24 bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2"></div>
        </div>
        
        <div class="max-w-5xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-5xl font-extrabold mb-6 leading-tight">
                Ingin Event Anda Menjadi<br/>Bagian dari Galeri Kami?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-10 max-w-3xl mx-auto">
                Mari ciptakan momen tak terlupakan bersama tim profesional kami
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('services') }}" class="inline-flex items-center px-8 md:px-10 py-4 md:py-5 bg-white text-[#004AAD] font-bold rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 text-base md:text-lg">
                    <span>Lihat Paket Kami</span>
                    <svg class="w-5 h-5 md:w-6 md:h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <a href="https://wa.me/6281214696299?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20event" target="_blank" class="inline-flex items-center px-8 md:px-10 py-4 md:py-5 bg-green-500 hover:bg-green-600 text-white font-bold rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 text-base md:text-lg">
                    <svg class="w-5 h-5 md:w-6 md:h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>
    </div>

    <style>
        .delay-1000 {
            animation-delay: 1s;
        }
    </style>
@endsection
