<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans bg-[#05070d] text-slate-300 antialiased">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside
            class="w-72 fixed h-screen overflow-y-auto bg-slate-900 border-r border-slate-800 text-slate-200 flex flex-col">

            <!-- LOGO -->
            <div class="p-6 border-b border-slate-800">
                <div class="flex items-center gap-3">
                    <div
                        class="h-12 w-12 flex items-center justify-center rounded-xl bg-slate-800 text-blue-400 shadow-sm">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-lg font-bold text-white">Admin Panel</h1>
                        <p class="text-xs text-slate-400">StandHub Management</p>
                    </div>
                </div>
            </div>

            <!-- NAVIGATION -->
            <nav class="flex-1 p-4 space-y-1">

                @php
                    function activeLink($route)
                    {
                        return request()->routeIs($route)
                            ? 'bg-slate-800 text-blue-400 shadow-sm'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white';
                    }
                @endphp

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium {{ activeLink('admin.dashboard') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h5m5 0h5a1 1 0 001-1V10" />
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.stands.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium {{ activeLink('admin.stands.*') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Manajemen Stand
                </a>

                <a href="{{ route('admin.bookings.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium {{ activeLink('admin.bookings.*') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                    </svg>
                    Booking
                </a>

                <a href="{{ route('admin.vendors.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium {{ activeLink('admin.vendors.*') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20v-2a4 4 0 10-8 0v2M12 12a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                    Vendor
                </a>

                <a href="{{ route('help') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium {{ activeLink('help') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6h.01M12 12h.01M12 18h.01" />
                    </svg>
                    Bantuan
                </a>
            </nav>

            <!-- USER FOOTER -->
            <div class="p-4 border-t border-slate-800">
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 transition">

                    <div
                        class="h-10 w-10 rounded-full bg-slate-700 text-blue-400 flex items-center justify-center font-semibold">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>

                    <div class="flex-1">
                        <p class="text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-slate-400">{{ auth()->user()->email }}</p>
                    </div>

                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536M4 20h4l10-10-4-4L4 16v4z" />
                    </svg>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button
                        class="flex w-full items-center gap-3 px-4 py-3 text-sm font-medium text-red-400 rounded-xl hover:bg-red-950/40 transition">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7" />
                        </svg>
                        Logout
                    </button>
                </form>

            </div>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 overflow-y-auto ml-72 bg-slate-800 text-slate-100">

            <!-- TOPBAR NAVY -->
            <div id="glassTopbar"
                class="fixed top-0 left-72 right-0 z-50 backdrop-blur-xl bg-slate-900/70 border-b border-white/10 shadow-[0_8px_20px_-8px_rgba(0,0,0,0.5)] transition-all duration-300">
                <div class="px-8 py-4 flex items-center gap-6">

                    <!-- SEARCH (dark mode style) -->
                    <div class="w-80">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>

                            <input type="text" placeholder="Cari..."
                                class="w-full pl-10 pr-4 py-2 text-sm rounded-lg bg-white/10 text-white 
                    placeholder-slate-300 border border-white/20 focus:ring-green-400 focus:border-green-400">
                        </div>
                    </div>

                    <div class="flex-1"></div>

                    <!-- RIGHT SECTION -->
                    <div class="flex items-center gap-6">

                        <!-- NOTIFICATION -->
                        <div x-data="{ openNotif: false }" class="relative">
                            <button @click="openNotif = !openNotif"
                                class="relative w-10 h-10 flex items-center justify-center rounded-full hover:bg-white/10 transition">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.4-4.2A6 6 0 006 9v1m6 12a2 2 0 002-2H8a2 2 0 002 2z" />
                                </svg>

                                <span
                                    class="absolute top-1 right-1 h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-[#0A1A2F]"></span>
                            </button>

                            @include('notifications.dropdown')
                        </div>

                        <!-- DATE -->
                        <div class="text-right leading-tight">
                            <p class="text-xs text-slate-300">{{ now()->format('l') }}</p>
                            <p class="text-sm font-semibold text-white">{{ now()->format('d M Y') }}</p>
                        </div>

                    </div>
                </div>
            </div>



            <!-- PAGE CONTENT -->
            <div class="p-8 pt-24">
                @yield('content')
            </div>

        </main>

    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js"></script>

</body>

</html>
