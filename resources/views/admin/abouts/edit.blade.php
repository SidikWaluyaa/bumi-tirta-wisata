@extends('layouts.admin')

@section('content')
    <x-slot name="header">Manage About Us</x-slot>

    <div class="max-w-6xl">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden" x-data="{ activeTab: 'basic' }">
            @if($about)
                <form action="{{ route('admin.abouts.update', $about) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Tabs Navigation -->
                    <div class="border-b border-gray-200 bg-gray-50">
                        <nav class="flex -mb-px">
                            <button type="button" @click="activeTab = 'basic'" 
                                :class="activeTab === 'basic' ? 'border-[#004AAD] text-[#004AAD] bg-white' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm transition-all">
                                📝 Basic Info
                            </button>
                            <button type="button" @click="activeTab = 'hero'" 
                                :class="activeTab === 'hero' ? 'border-[#004AAD] text-[#004AAD] bg-white' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm transition-all">
                                🎯 Hero Section
                            </button>
                            <button type="button" @click="activeTab = 'company'" 
                                :class="activeTab === 'company' ? 'border-[#004AAD] text-[#004AAD] bg-white' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm transition-all">
                                🏢 Company Info
                            </button>
                            <button type="button" @click="activeTab = 'cta'" 
                                :class="activeTab === 'cta' ? 'border-[#004AAD] text-[#004AAD] bg-white' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm transition-all">
                                📢 CTA Section
                            </button>
                        </nav>
                    </div>

                    <div class="p-6 lg:p-8">
                        <!-- Basic Info Tab -->
                        <div x-show="activeTab === 'basic'" class="space-y-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Basic Information</h3>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Company Title</label>
                                <input type="text" name="title" value="{{ old('title', $about->title) }}" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all">
                                @error('title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Company Description</label>
                                <textarea name="content" rows="8" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none">{{ old('content', $about->content) }}</textarea>
                                @error('content')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Main Company Image</label>
                                @if($about->image)
                                    <div class="mb-4">
                                        <img src="{{ asset('storage/' . $about->image) }}" class="w-full max-w-md h-64 object-cover rounded-xl border-2 border-gray-200">
                                    </div>
                                @endif
                                <input type="file" name="image" accept="image/*"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#004AAD] file:text-white hover:file:bg-[#28769A] file:cursor-pointer transition-colors">
                                <p class="text-xs text-gray-500 mt-1">Max 10MB (JPG, PNG, WebP)</p>
                            </div>
                        </div>

                        <!-- Hero Section Tab -->
                        <div x-show="activeTab === 'hero'" class="space-y-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Hero Section Settings</h3>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Hero Title</label>
                                <input type="text" name="hero_title" value="{{ old('hero_title', $about->hero_title) }}" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                                    placeholder="e.g., Petualangan Seru Menanti Anda">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Hero Subtitle</label>
                                <textarea name="hero_subtitle" rows="3" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none"
                                    placeholder="e.g., Jelajahi keindahan alam dengan paket outbound terbaik">{{ old('hero_subtitle', $about->hero_subtitle) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Hero Background Image</label>
                                @if($about->hero_background)
                                    <div class="mb-4">
                                        <img src="{{ asset('storage/' . $about->hero_background) }}" class="w-full max-w-2xl h-48 object-cover rounded-xl border-2 border-gray-200">
                                    </div>
                                @endif
                                <input type="file" name="hero_background" accept="image/*"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#004AAD] file:text-white hover:file:bg-[#28769A] file:cursor-pointer transition-colors">
                                <p class="text-xs text-gray-500 mt-1">Recommended: 1920x1080px, Max 10MB</p>
                            </div>
                        </div>

                        <!-- Company Info Tab -->
                        <div x-show="activeTab === 'company'" class="space-y-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Company Information</h3>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Service Area</label>
                                <input type="text" name="service_area" value="{{ old('service_area', $about->service_area) }}" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                                    placeholder="e.g., Yogyakarta & Sekitarnya">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Focus Services</label>
                                <input type="text" name="focus_services" value="{{ old('focus_services', $about->focus_services) }}" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                                    placeholder="e.g., Outbound, Rafting, Team Building">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Highlight Text</label>
                                <textarea name="highlight_text" rows="3" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none"
                                    placeholder="e.g., Lebih dari 10 tahun pengalaman...">{{ old('highlight_text', $about->highlight_text) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Company Vision</label>
                                <textarea name="vision" rows="4" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none"
                                    placeholder="Menjadi penyedia layanan outbound...">{{ old('vision', $about->vision) }}</textarea>
                            </div>
                        </div>

                        <!-- CTA Section Tab -->
                        <div x-show="activeTab === 'cta'" class="space-y-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Call-to-Action Settings</h3>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">CTA Title</label>
                                <input type="text" name="cta_title" value="{{ old('cta_title', $about->cta_title) }}" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                                    placeholder="e.g., Siap Berpetualang Bersama Bumi Tirta?">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">CTA Subtitle</label>
                                <textarea name="cta_subtitle" rows="2" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all resize-none"
                                    placeholder="e.g., Hubungi kami sekarang...">{{ old('cta_subtitle', $about->cta_subtitle) }}</textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">WhatsApp Button Text</label>
                                    <input type="text" name="cta_whatsapp_text" value="{{ old('cta_whatsapp_text', $about->cta_whatsapp_text) }}" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                                        placeholder="e.g., Chat WhatsApp">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">WhatsApp Number</label>
                                    <input type="text" name="cta_whatsapp_number" value="{{ old('cta_whatsapp_number', $about->cta_whatsapp_number) }}" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                                        placeholder="e.g., 6281234567890">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Packages Button Text</label>
                                <input type="text" name="cta_packages_text" value="{{ old('cta_packages_text', $about->cta_packages_text) }}" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#004AAD] focus:border-transparent transition-all"
                                    placeholder="e.g., Lihat Paket Kami">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">CTA Background Image</label>
                                @if($about->cta_background)
                                    <div class="mb-4">
                                        <img src="{{ asset('storage/' . $about->cta_background) }}" class="w-full max-w-2xl h-48 object-cover rounded-xl border-2 border-gray-200">
                                    </div>
                                @endif
                                <input type="file" name="cta_background" accept="image/*"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#004AAD] file:text-white hover:file:bg-[#28769A] file:cursor-pointer transition-colors">
                                <p class="text-xs text-gray-500 mt-1">Recommended: 1920x600px, Max 10MB</p>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-8 pt-6 border-t border-gray-200">
                            <button type="submit" class="bg-gradient-to-r from-[#004AAD] to-[#28769A] hover:shadow-xl text-white font-bold py-3 px-8 rounded-lg transition-all transform hover:-translate-y-0.5">
                                💾 Update About Us
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500">No about content found. Please create one.</p>
                </div>
            @endif
        </div>

        <!-- Quick Links to Manage Related Content -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('admin.missions.index') }}" class="block p-6 bg-white rounded-xl shadow hover:shadow-lg transition-shadow border-l-4 border-blue-500">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-3xl">🎯</span>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-bold text-gray-900">Manage Missions</h4>
                        <p class="text-sm text-gray-600">Edit company missions</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.company-values.index') }}" class="block p-6 bg-white rounded-xl shadow hover:shadow-lg transition-shadow border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-3xl">⭐</span>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-bold text-gray-900">Manage Values</h4>
                        <p class="text-sm text-gray-600">Edit company values</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.team-members.index') }}" class="block p-6 bg-white rounded-xl shadow hover:shadow-lg transition-shadow border-l-4 border-purple-500">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-3xl">👥</span>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-bold text-gray-900">Manage Team</h4>
                        <p class="text-sm text-gray-600">Edit team members</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <script>
        // Alpine.js is already included in admin layout
    </script>
@endsection
