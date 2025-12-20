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
                💬 HUBUNGI KAMI
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
                Mari Wujudkan<br/>
                <span class="text-[#BDDADB]">Event Impian Anda</span>
            </h1>
            <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto">
                Tim kami siap membantu merencanakan pengalaman outbound yang tak terlupakan
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="py-16 md:py-24 bg-gradient-to-br from-[#BDDADB]/20 via-[#004AAD]/10 to-[#28769A]/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 md:gap-16">
                <!-- Contact Info Side -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                            Kami Siap <span class="text-[#004AAD]">Membantu Anda</span>
                        </h2>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            Punya pertanyaan atau ingin konsultasi? Jangan ragu untuk menghubungi kami. Tim profesional kami siap memberikan solusi terbaik untuk kebutuhan team building Anda.
                        </p>
                    </div>

                    <!-- Contact Cards -->
                    <div class="space-y-4">
                        <!-- Phone Card -->
                        <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-[#004AAD]">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-gradient-to-br from-[#004AAD] to-[#28769A] rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Telepon & WhatsApp</h3>
                                    <p class="text-gray-600 mb-3">Hubungi kami langsung untuk respons cepat</p>
                                    <a href="tel:{{ $global_settings['phone'] ?? '+6282315328691' }}" class="text-[#004AAD] font-semibold hover:text-[#28769A] transition-colors">
                                        {{ $global_settings['phone'] ?? '+62 823 1532 8691' }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Email Card -->
                        <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-[#004AAD]">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-gradient-to-br from-[#004AAD] to-[#28769A] rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Email</h3>
                                    <p class="text-gray-600 mb-3">Kirim pertanyaan detail via email</p>
                                    <a href="mailto:{{ $global_settings['email'] ?? 'info@bumitirtawisata.com' }}" class="text-[#004AAD] font-semibold hover:text-[#28769A] transition-colors">
                                        {{ $global_settings['email'] ?? 'info@bumitirtawisata.com' }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Address Card -->
                        <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-[#004AAD]">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-gradient-to-br from-[#004AAD] to-[#28769A] rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 flex-1">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Alamat Kantor</h3>
                                    <p class="text-gray-600 mb-3">Kunjungi kantor kami</p>
                                    <p class="text-[#004AAD] font-semibold">
                                        {{ $global_settings['address'] ?? 'Yogyakarta, Indonesia' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick WhatsApp Button -->
                    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-xl font-bold mb-2">Butuh Respons Cepat?</h3>
                                <p class="text-white/90 text-sm">Chat langsung via WhatsApp</p>
                            </div>
                            <a href="https://wa.me/6281214696299?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20paket%20outbound" target="_blank" class="bg-white text-green-600 px-6 py-3 rounded-xl font-bold hover:bg-green-50 transition-colors flex items-center shadow-lg">
                                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                Chat Now
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Side -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10 border border-gray-100">
                    <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">Kirim Pesan</h3>
                    <p class="text-gray-600 mb-8">Isi form di bawah dan kami akan segera menghubungi Anda</p>

                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl flex items-start">
                            <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold">Pesan Terkirim!</p>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap *</label>
                            <input type="text" name="name" required 
                                class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all text-gray-900 placeholder-gray-400"
                                placeholder="Masukkan nama Anda">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Email *</label>
                                <input type="email" name="email" required 
                                    class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all text-gray-900 placeholder-gray-400"
                                    placeholder="email@example.com">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">No. Telepon *</label>
                                <input type="tel" name="phone" required 
                                    class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all text-gray-900 placeholder-gray-400"
                                    placeholder="08xx xxxx xxxx">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Subjek *</label>
                            <input type="text" name="subject" required 
                                class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all text-gray-900 placeholder-gray-400"
                                placeholder="Misal: Konsultasi Paket Outbound">
                            @error('subject')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Pesan *</label>
                            <textarea name="message" rows="5" required 
                                class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none text-gray-900 placeholder-gray-400"
                                placeholder="Ceritakan kebutuhan event Anda..."></textarea>
                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:from-[#28769A] hover:to-[#004AAD] text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            <span>Kirim Pesan</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .delay-1000 {
            animation-delay: 1s;
        }
    </style>
@endsection
