<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CobraCerta') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="lg:hidden fixed top-4 left-4 z-[60] p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#0B1C3D]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-[55] hidden lg:hidden"></div>

        <!-- Sidebar -->
        <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-[#0B1C3D] text-white shadow-xl transition-all duration-300 ease-in-out transform -translate-x-full lg:translate-x-0 z-[56]">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center h-20 border-b border-white/20">
                    <img src="{{ asset('imagens/logo.png') }}" alt="CobraCerta" class="h-20 w-auto transition-transform duration-300 hover:scale-105">
                </div>

                <!-- Menu -->
                <nav class="flex-1 px-4 py-4 space-y-2">
                    @php
                        $items = [
                            ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                            ['route' => 'clientes.index', 'label' => 'Clientes', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                            ['route' => 'contratos.index', 'label' => 'Contratos', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                        ];
                    @endphp

                    @foreach ($items as $item)
                        <a href="{{ route($item['route']) }}"
                           class="group flex items-center px-4 py-2 rounded-lg transition-all duration-300 ease-in-out
                           {{ request()->routeIs($item['route']) ? 'bg-white/10 border-l-4 border-[#00D1B2] font-semibold' : 'hover:bg-white/10 hover:border-l-4 hover:border-[#00D1B2]' }}">
                            <svg class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:scale-110 group-hover:translate-x-1"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                            </svg>
                            <span class="transition-colors duration-300 group-hover:text-[#00D1B2]">{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:ml-64">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-4">
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-[#0B1C3D] flex items-center justify-center text-white font-semibold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center text-gray-700 hover:text-gray-900 transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Sair
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }

            mobileMenuButton.addEventListener('click', toggleSidebar);
            overlay.addEventListener('click', toggleSidebar);

            // Close sidebar when clicking a menu item on mobile
            const menuItems = document.querySelectorAll('#sidebar nav a');
            menuItems.forEach(item => {
                item.addEventListener('click', () => {
                    if (window.innerWidth < 1024) {
                        toggleSidebar();
                    }
                });
            });
        });
    </script>
</body>
</html>
