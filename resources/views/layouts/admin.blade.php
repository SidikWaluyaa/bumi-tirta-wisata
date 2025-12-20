<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Admin Panel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <style>
            @media (max-width: 768px) {
                .sidebar-mobile {
                    transform: translateX(-100%);
                }
                .sidebar-mobile.open {
                    transform: translateX(0);
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-50">
        <div class="flex min-h-screen relative">
            <!-- Mobile Overlay -->
            <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden"></div>
            
            <!-- Sidebar -->
            <aside id="sidebar" class="sidebar-mobile fixed lg:static inset-y-0 left-0 z-30 w-64 bg-gradient-to-b from-[#004AAD] to-[#003380] text-white flex flex-col shadow-2xl transition-transform duration-300 ease-in-out">
                <x-admin-sidebar />
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col min-w-0">
                <!-- Topbar -->
                <header class="bg-white shadow-md sticky top-0 z-10">
                    <div class="flex items-center justify-between px-4 lg:px-6 py-4">
                        <!-- Mobile Menu Button & Title -->
                        <div class="flex items-center gap-3">
                            <button id="sidebarToggle" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                            <h2 class="font-bold text-lg lg:text-xl text-gray-800 truncate">
                                {{ $header ?? 'Dashboard' }}
                            </h2>
                        </div>

                        <!-- User Info & Logout -->
                        <div class="flex items-center gap-2 lg:gap-4">
                            <div class="hidden sm:flex items-center gap-2 px-3 py-2 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-[#004AAD] rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <span class="text-sm font-medium text-gray-700 hidden md:block">{{ Auth::user()->name }}</span>
                            </div>
                            
                            <!-- Logout Form -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span class="hidden sm:inline">{{ __('Logout') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 p-4 lg:p-6 overflow-y-auto">
                    @yield('content')
                </main>

                <!-- Footer -->
                <footer class="bg-white border-t border-gray-200 py-4 px-6">
                    <div class="text-center text-sm text-gray-500">
                        &copy; {{ date('Y') }} CV. Bumi Tirta Wisata. All rights reserved.
                    </div>
                </footer>
            </div>
        </div>

        <!-- Sidebar Toggle Script -->
        <script>
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const sidebarClose = document.getElementById('sidebarClose');

            function toggleSidebar() {
                sidebar.classList.toggle('open');
                sidebarOverlay.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden');
            }

            sidebarToggle?.addEventListener('click', toggleSidebar);
            sidebarOverlay?.addEventListener('click', toggleSidebar);
            sidebarClose?.addEventListener('click', toggleSidebar);

            // Close sidebar on route change (for mobile)
            window.addEventListener('popstate', () => {
                if (window.innerWidth < 1024) {
                    sidebar.classList.remove('open');
                    sidebarOverlay.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }
            });
        </script>

        <!-- SweetAlert2 Global Handlers -->
        <script>
            // Auto-show alerts from session flash messages
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end'
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    showConfirmButton: true
                });
            @endif

            // Delete confirmation function
            function confirmDelete(formId) {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                });
            }
        </script>
    </body>
</html>
