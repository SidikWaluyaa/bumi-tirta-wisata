@extends('layouts.public')

@section('content')
    <!-- Header -->
    <div class="bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white py-16 md:py-20 text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2"></div>
        </div>
        <div class="relative z-10">
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">Our Services</h1>
            <p class="text-[#BDDADB] text-base md:text-lg mt-4 max-w-2xl mx-auto px-4">Discover our range of outbound packages and additional services designed for your team.</p>
        </div>
    </div>

    <!-- Packages Section -->
    <div class="py-12 md:py-16 bg-gradient-to-br from-[#28769A]/10 via-[#004AAD]/10 to-[#BDDADB]/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl md:text-3xl font-bold text-[#004AAD] mb-8 border-l-4 border-[#28769A] pl-4">Main Packages</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach ($packages as $service)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                    <div class="relative h-56 md:h-64 overflow-hidden">
                         @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#004AAD] via-[#28769A] to-[#BDDADB] flex items-center justify-center">
                                <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        
                        <!-- Price Badge - Improved Visibility -->
                        <div class="absolute top-4 right-4 bg-white border-2 border-[#004AAD] px-4 py-2.5 rounded-2xl shadow-2xl">
                            @if($service->price)
                                <div class="text-lg font-extrabold text-[#004AAD]">Rp {{ number_format((float)$service->price, 0, ',', '.') }}</div>
                                <div class="text-xs text-[#28769A] font-semibold text-center">{{ $service->price_unit ?? '/ Orang' }}</div>
                            @else
                                <div class="text-sm font-bold text-[#004AAD]">Hubungi Kami</div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="p-6 md:p-7">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-3 group-hover:text-[#004AAD] transition-colors line-clamp-2">{{ $service->title }}</h3>
                        
                        @if($service->subtitle)
                            <p class="text-[#28769A] text-sm font-medium mb-4 line-clamp-1">{{ $service->subtitle }}</p>
                        @endif

                        <!-- Features List -->
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

                        <button onclick="openModal({{ $service->id }})" class="w-full bg-gradient-to-r from-[#28769A] to-[#004AAD] hover:from-[#004AAD] hover:to-[#28769A] text-white font-bold py-3.5 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center group">
                            <span>Lihat Detail</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Add-ons Section -->
    <div class="py-12 md:py-16 bg-gradient-to-br from-[#f0f9ff] to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl md:text-3xl font-bold text-[#004AAD] mb-8 border-l-4 border-[#28769A] pl-4">Additional Services (Opsional)</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($addons as $addon)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer border border-gray-100" onclick="openModal({{ $addon->id }})">
                    @if($addon->image)
                        <div class="h-48 overflow-hidden relative">
                            <img src="{{ asset('storage/' . $addon->image) }}" alt="{{ $addon->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <h3 class="absolute bottom-4 left-4 right-4 font-bold text-lg md:text-xl text-white line-clamp-2">{{ $addon->title }}</h3>
                        </div>
                    @else
                        <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-6 text-center relative overflow-hidden h-48">
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity"></div>
                            <div class="relative z-10 flex flex-col items-center justify-center h-full">
                                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-lg text-white line-clamp-2">{{ $addon->title }}</h3>
                            </div>
                        </div>
                    @endif
                    
                    
                    <div class="p-5 md:p-6">
                        <!-- Price - More Visible -->
                        <div class="mb-4 text-center">
                            <div class="inline-block bg-white border-2 border-[#004AAD] px-5 py-3 rounded-2xl shadow-xl hover:shadow-2xl transition-shadow">
                                @if($addon->price)
                                    <div class="text-2xl md:text-3xl font-extrabold text-[#004AAD]">Rp {{ number_format((float)$addon->price, 0, ',', '.') }}</div>
                                    <div class="text-sm text-[#28769A] font-bold mt-1">{{ $addon->price_unit ?? '/ Paket' }}</div>
                                @else
                                    <div class="text-sm font-bold text-[#004AAD]">Hubungi Kami</div>
                                @endif
                            </div>
                        </div>
                        
                        @if($addon->description)
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2 text-center">{{ $addon->description }}</p>
                        @endif
                        
                        <!-- Features Preview -->
                        @if($addon->features && count($addon->features) > 0)
                            <div class="mb-4 space-y-2">
                                @foreach(array_slice($addon->features, 0, 3) as $feature)
                                    <div class="flex items-center bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 px-3 py-2 rounded-full hover:border-green-300 transition-all duration-300 hover:shadow-md group">
                                        <div class="w-5 h-5 mr-2 flex-shrink-0 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold text-gray-700 leading-tight">{{ $feature }}</span>
                                    </div>
                                @endforeach
                                @if(count($addon->features) > 3)
                                    <p class="text-xs text-[#004AAD] font-semibold ml-5.5">+{{ count($addon->features) - 3 }} lainnya</p>
                                @endif
                            </div>
                        @endif
                        
                        <button class="w-full bg-gradient-to-r from-[#004AAD] to-[#28769A] text-white font-semibold py-2.5 rounded-lg hover:shadow-lg transition-all duration-300 text-sm">
                            Lihat Detail
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal - Mobile Optimized -->
    <div id="serviceModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-50" onclick="if(event.target === this) closeModal()">
        <div class="h-full overflow-y-auto">
            <div class="min-h-full px-0 sm:px-4 py-0 sm:py-8 flex items-end sm:items-center justify-center">
                <div class="bg-white rounded-t-3xl sm:rounded-3xl shadow-2xl w-full sm:max-w-4xl relative max-h-screen sm:max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
                    <button onclick="closeModal()" class="sticky top-4 right-4 float-right z-20 bg-white hover:bg-gray-100 p-3 rounded-full shadow-xl transition-all">
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
        const services = @json($packages->merge($addons));

        function openModal(id) {
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

        function closeModal() {
            document.getElementById('serviceModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('keydown', e => e.key === 'Escape' && closeModal());
    </script>
@endsection
