<div class="flex flex-col h-full">
    <!-- Header -->
    <div class="p-6 border-b border-white/20">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-wider">CV. BUMI TIRTA WISATA</h1>
                <p class="text-xs text-[#BDDADB] mt-1">Admin Panel</p>
            </div>
            <!-- Close Button (Mobile Only) -->
            <button id="sidebarClose" class="lg:hidden p-2 hover:bg-white/10 rounded-lg transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 mt-4 px-3 space-y-1 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-white text-[#004AAD] shadow-lg' : 'text-gray-100 hover:bg-white/10 hover:translate-x-1' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-[#004AAD]' : 'text-[#BDDADB]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        <a href="{{ route('admin.settings.index') }}" class="group flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-white text-[#004AAD] shadow-lg' : 'text-gray-100 hover:bg-white/10 hover:translate-x-1' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.settings.*') ? 'text-[#004AAD]' : 'text-[#BDDADB]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span class="font-medium">Settings</span>
        </a>
        
        <!-- About Us Dropdown -->
        <div x-data="{ open: {{ request()->routeIs('admin.abouts.*', 'admin.missions.*', 'admin.company-values.*', 'admin.team-members.*', 'admin.certifications.*') ? 'true' : 'false' }} }">
            <button @click="open = !open" class="group w-full flex items-center justify-between px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.abouts.*', 'admin.missions.*', 'admin.company-values.*', 'admin.team-members.*', 'admin.certifications.*') ? 'bg-white text-[#004AAD] shadow-lg' : 'text-gray-100 hover:bg-white/10 hover:translate-x-1' }}">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.abouts.*', 'admin.missions.*', 'admin.company-values.*', 'admin.team-members.*', 'admin.certifications.*') ? 'text-[#004AAD]' : 'text-[#BDDADB]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">About Us</span>
                </div>
                <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            
            <div x-show="open" x-transition class="mt-1 ml-8 space-y-1">
                <a href="{{ route('admin.abouts.index') }}" class="block px-4 py-2 rounded-lg text-sm {{ request()->routeIs('admin.abouts.*') ? 'bg-white/20 text-white font-semibold' : 'text-gray-200 hover:bg-white/10' }}">
                    📝 Basic Info
                </a>
                <a href="{{ route('admin.missions.index') }}" class="block px-4 py-2 rounded-lg text-sm {{ request()->routeIs('admin.missions.*') ? 'bg-white/20 text-white font-semibold' : 'text-gray-200 hover:bg-white/10' }}">
                    🎯 Missions
                </a>
                <a href="{{ route('admin.company-values.index') }}" class="block px-4 py-2 rounded-lg text-sm {{ request()->routeIs('admin.company-values.*') ? 'bg-white/20 text-white font-semibold' : 'text-gray-200 hover:bg-white/10' }}">
                    ⭐ Company Values
                </a>
                <a href="{{ route('admin.team-members.index') }}" class="block px-4 py-2 rounded-lg text-sm {{ request()->routeIs('admin.team-members.*') ? 'bg-white/20 text-white font-semibold' : 'text-gray-200 hover:bg-white/10' }}">
                    👥 Team Members
                </a>
                <a href="{{ route('admin.certifications.index') }}" class="block px-4 py-2 rounded-lg text-sm {{ request()->routeIs('admin.certifications.*') ? 'bg-white/20 text-white font-semibold' : 'text-gray-200 hover:bg-white/10' }}">
                    📜 Certifications
                </a>
            </div>
        </div>

        <a href="{{ route('admin.services.index') }}" class="group flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-white text-[#004AAD] shadow-lg' : 'text-gray-100 hover:bg-white/10 hover:translate-x-1' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.services.*') ? 'text-[#004AAD]' : 'text-[#BDDADB]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            <span class="font-medium">Services</span>
        </a>

        <a href="{{ route('admin.galleries.index') }}" class="group flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.galleries.*') ? 'bg-white text-[#004AAD] shadow-lg' : 'text-gray-100 hover:bg-white/10 hover:translate-x-1' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.galleries.*') ? 'text-[#004AAD]' : 'text-[#BDDADB]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="font-medium">Gallery</span>
        </a>

        <a href="{{ route('admin.messages.index') }}" class="group flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.messages.*') ? 'bg-white text-[#004AAD] shadow-lg' : 'text-gray-100 hover:bg-white/10 hover:translate-x-1' }}">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.messages.*') ? 'text-[#004AAD]' : 'text-[#BDDADB]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span class="font-medium">Messages</span>
            @php
                $unreadCount = \App\Models\Message::where('is_read', false)->count();
            @endphp
            @if($unreadCount > 0)
                <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">{{ $unreadCount }}</span>
            @endif
        </a>
    </nav>

    <!-- Footer -->
    <div class="p-4 border-t border-white/20">
        <div class="text-xs text-[#BDDADB] text-center">
            <p>&copy; {{ date('Y') }} Bumi Tirta Wisata</p>
            <p class="mt-1 text-white/50">v1.0.0</p>
        </div>
    </div>
</div>
