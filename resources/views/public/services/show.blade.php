@extends('layouts.public')

@section('content')
    <div class="bg-gray-50 py-12 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('services') }}" class="text-[#28769A] hover:text-[#004AAD] flex items-center gap-2 font-medium">
                    &larr; Back to Services
                </a>
            </div>

            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <!-- Image Header -->
                <div class="relative h-80 lg:h-96 overflow-hidden">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-full object-cover" alt="{{ $service->title }}">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-[#004AAD] to-[#28769A] flex items-center justify-center">
                            <svg class="w-32 h-32 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                </div>

                <!-- Content -->
                <div class="p-6 lg:p-10 -mt-20 relative z-10">
                    <div class="bg-white rounded-2xl shadow-xl p-6 lg:p-8">
                        <!-- Title & Subtitle -->
                        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-2">{{ $service->title }}</h1>
                        @if($service->subtitle)
                            <p class="text-[#28769A] text-lg mb-4">{{ $service->subtitle }}</p>
                        @endif

                        <!-- Location & Rating -->
                        <div class="flex flex-wrap items-center gap-4 mb-6">
                            @if($service->location)
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2 text-[#004AAD]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-sm font-medium">{{ $service->location }}</span>
                                </div>
                            @endif

                            @if($service->rating)
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($service->rating))
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                    <span class="ml-2 text-sm text-gray-600 font-medium">({{ number_format($service->rating, 1) }})</span>
                                </div>
                            @endif
                        </div>

                        <!-- Price -->
                        <div class="mb-6 pb-6 border-b border-gray-200">
                            <div class="inline-block bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white px-6 py-3 rounded-xl">
                                <span class="text-2xl font-bold">
                                    @if($service->price)
                                        Rp. {{ number_format((float)$service->price, 0, ',', '.') }} {{ $service->price_unit ?? '' }}
                                    @else
                                        <span class="text-xl">Hubungi untuk harga</span>
                                    @endif
                                </span>
                            </div>
                        </div>

                        <!-- Description -->
                        @if($service->description)
                            <div class="mb-6">
                                <p class="text-gray-600 leading-relaxed">{{ $service->description }}</p>
                            </div>
                        @endif

                        <!-- Features -->
                        @if($service->features && count($service->features) > 0)
                            <div class="mb-8">
                                <h3 class="text-xl font-bold text-gray-800 mb-4">Features / Inclusions:</h3>
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                                    @foreach($service->features as $feature)
                                        <div class="flex items-center bg-blue-50 text-[#004AAD] px-4 py-3 rounded-xl border border-blue-100 hover:bg-blue-100 transition-colors">
                                            <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span class="text-sm font-semibold">{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- CTA Button -->
                        <a href="https://wa.me/{{ env('WHATSAPP_NUMBER', '6281214696299') }}?text=Halo,%20saya%20tertarik%20dengan%20{{ urlencode($service->title) }}" 
                           target="_blank" 
                           class="block w-full bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:shadow-2xl text-white text-center font-bold py-4 rounded-xl transition-all transform hover:-translate-y-1">
                            <div class="flex items-center justify-center">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                Konsultasi Sekarang via WhatsApp
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
