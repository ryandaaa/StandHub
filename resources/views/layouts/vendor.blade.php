<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') — StandHub</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans bg-[#0f172a] text-gray-200">

    <div class="flex min-h-screen">

        {{-- ========================================================= --}}
        {{-- SIDEBAR — DARK NAVY + BLUE GLOW --}}
        {{-- ========================================================= --}}
        <aside
            class="w-72 fixed h-screen bg-[#0f1b2d]/90 backdrop-blur-2xl 
                     border-r border-white/10 shadow-[0_0_25px_rgba(0,0,0,0.45)] flex flex-col">

            {{-- LOGO --}}
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center gap-4">

                    <div
                        class="h-12 w-12 rounded-xl bg-blue-500/10 border border-blue-500/30 
                                text-blue-300 flex items-center justify-center 
                                shadow-[0_0_15px_rgba(59,130,246,0.35)]">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 21h18M4 18h16M6 18V9l6-4 6 4v9M9 21v-6h6v6" />
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-xl font-extrabold text-slate-100 tracking-tight">StandHub</h1>
                        <p class="text-xs text-blue-300/60">Vendor Panel</p>
                    </div>

                </div>
            </div>

            {{-- NAVIGATION --}}
            <nav class="flex-1 p-4 space-y-1">

                {{-- HOME --}}
                <a href="{{ route('vendor.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('vendor.dashboard')
                            ? 'bg-blue-600/20 text-blue-300 border border-blue-600/40 shadow-[0_0_12px_rgba(59,130,246,0.25)]'
                            : 'text-gray-300 hover:bg-white/5' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10" />
                    </svg>
                    Home
                </a>

                {{-- BOOKING SAYA --}}
                <a href="{{ route('vendor.bookings.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('vendor.bookings.*')
                            ? 'bg-blue-600/20 text-blue-300 border border-blue-600/40 shadow-[0_0_12px_rgba(59,130,246,0.25)]'
                            : 'text-gray-300 hover:bg-white/5' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2zm4-7l2 2 4-4" />
                    </svg>
                    Booking Saya
                </a>

                {{-- BANTUAN --}}
                <a href="{{ route('help') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition
                        {{ request()->routeIs('help')
                            ? 'bg-blue-600/20 text-blue-300 border border-blue-600/40 shadow-[0_0_12px_rgba(59,130,246,0.25)]'
                            : 'text-gray-300 hover:bg-white/5' }}">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3
                                 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01
                                 M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Bantuan
                </a>

            </nav>

            {{-- USER SECTION --}}
            <div class="p-4 border-t border-white/10">

                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#152238]/50 
                           border border-white/10 hover:bg-[#1b2a41]/70 transition">

                    <div
                        class="h-10 w-10 rounded-full bg-blue-500/10 text-blue-300 
                                border border-blue-500/20 flex items-center justify-center font-semibold">
                        {{ strtoupper(substr(auth()->user()->name ?? 'V', 0, 1)) }}
                    </div>

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-100 truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                    </div>

                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414
                                 a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>

                </a>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button
                        class="flex items-center gap-3 w-full px-4 py-3 text-sm font-medium
                               text-red-400 rounded-xl hover:bg-red-500/10 border border-red-500/20 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7
                                     a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>

            </div>

        </aside>



        {{-- ========================================================= --}}
        {{-- TOPBAR — NAVY GLASS + BLUE RING --}}
        {{-- ========================================================= --}}
        <main class="flex-1 overflow-y-auto bg-[#0f172a]">

            <div
                class="fixed top-0 left-72 right-0 
                            bg-[#152238]/80 backdrop-blur-xl border-b border-white/10 
                            shadow-[0_0_25px_rgba(0,0,0,0.5)] px-8 py-4 z-40">

                <div class="flex items-center gap-6">

                    {{-- SEARCH --}}
                    <div class="w-80">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>

                            <input type="text" placeholder="Cari..."
                                class="w-full bg-[#1b2a41]/60 border border-white/10 rounded-lg 
                                       text-sm text-gray-200 pl-10 pr-4 py-2 placeholder-gray-500
                                       focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="flex-1"></div>

                    {{-- NOTIF + DATE --}}
                    <div class="flex items-center gap-6">

                        <div x-data="{ openNotif: false }" class="relative">
                            <button @click="openNotif=!openNotif"
                                class="w-10 h-10 flex items-center justify-center rounded-full 
                                       hover:bg-white/5 transition relative">
                                <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118
                                             14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4
                                             0v.341C7.67 6.165 6 8.388 6 11v3.159c0
                                             .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3
                                             3 0 11-6 0v-1m6 0H9" />
                                </svg>

                                <span
                                    class="absolute top-1.5 right-1.5 block w-2.5 h-2.5 
                                             rounded-full bg-blue-400"></span>
                            </button>

                            @include('notifications.dropdown')
                        </div>

                        {{-- DATE --}}
                        <div class="text-right">
                            <p class="text-xs text-gray-400">{{ now()->format('l') }}</p>
                            <p class="text-sm font-semibold text-gray-200">{{ now()->format('d M Y') }}</p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- PAGE CONTENT --}}
            <div class="p-8 pt-24 ps-80">
                @yield('content')
            </div>

        </main>

    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js"></script>
    @yield('scripts')

</body>

</html>
