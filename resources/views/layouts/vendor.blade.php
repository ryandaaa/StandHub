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

<body class="font-sans bg-gray-50">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-72 fixed h-screen overflow-y-auto bg-white border-r border-gray-200 flex flex-col flex-none">
            {{-- LOGO --}}
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center gap-3">

                    <div
                        class="flex h-12 w-12 items-center justify-center 
                            rounded-xl bg-green-100 text-green-600 shadow-sm">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-lg font-bold text-gray-900">StandHub</h1>
                        <p class="text-xs text-gray-500">Order Your Stand!</p>
                    </div>

                </div>
            </div>

            {{-- NAVIGATION --}}
            <nav class="flex-1 p-4 space-y-1">

                {{-- Dashboard --}}
                <a href="{{ route('vendor.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl
                        {{ request()->routeIs('vendor.dashboard') ? 'bg-green-50 text-green-700 shadow-sm' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h5m5 0h5a1 1 0 001-1V10" />
                    </svg>
                    Home
                </a>

                {{-- Booking Saya --}}
                <a href="{{ route('vendor.bookings.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl
                        {{ request()->routeIs('vendor.bookings.*') ? 'bg-green-50 text-green-700 shadow-sm' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Booking Saya
                </a>

                {{-- Bantuan --}}
                <a href="{{ route('help') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl
                        {{ request()->routeIs('help') ? 'bg-green-50 text-green-700 shadow-sm' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Bantuan
                </a>
            </nav>

            {{-- USER PROFILE SECTION --}}
            <div class="p-4 border-t border-gray-200">

                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gray-50 hover:bg-gray-100 transition shadow-sm">
                    <div
                        class="h-10 w-10 rounded-full bg-green-100 text-green-700 flex items-center justify-center font-semibold">
                        {{ strtoupper(substr(auth()->user()->name ?? 'V', 0, 1)) }}
                    </div>

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-xs text-gray-500 truncate">
                            {{ auth()->user()->email }}
                        </p>
                    </div>

                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536M4 20h4l10-10-4-4L4 16v4z" />
                    </svg>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button
                        class="flex hover:bg-red-100 items-center gap-3 w-full px-4 py-3 text-sm font-medium text-red-600 rounded-xl hover:bg-red-50 transition">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7" />
                        </svg>
                        Logout
                    </button>
                </form>

            </div>

        </aside>

        {{-- MAIN AREA --}}
        <main class="flex-1 overflow-y-auto">

            {{-- TOPBAR --}}
            <div class="bg-white fixed top-0 left-72 right-0 border-b border-gray-200 px-8 py-4 shadow-sm z-40">
                <div class="flex items-center gap-6">

                    {{-- SEARCH BAR --}}
                    <div class="w-80">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Cari..."
                                class="w-full pl-10 pr-4 py-2 text-sm text-gray-900 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition">
                        </div>
                    </div>

                    {{-- SPACER --}}
                    <div class="flex-1"></div>

                    {{-- RIGHT SECTION: NOTIFICATION + DATE --}}
                    <div class="flex items-center gap-4 flex-shrink-0">

                        {{-- Notification Button + Dropdown --}}
                        <div x-data="{ openNotif: false }" class="relative">
                            <button @click="openNotif = !openNotif"
                                class="relative flex items-center justify-center w-10 h-10 rounded-full hover:bg-gray-100 transition">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.4-4.2A6 6 0 006 9v1m6 12a2 2 0 002-2H8a2 2 0 002 2z" />
                                </svg>

                                {{-- DOT NOTIF --}}
                                <span
                                    class="absolute top-1.5 right-1.5 block h-2.5 w-2.5 bg-red-500 rounded-full ring-2 ring-white"></span>
                            </button>

                            {{-- DROPDOWN NOTIFIKASI --}}
                            @include('notifications.dropdown')
                        </div>

                        {{-- DATE --}}
                        <div class="text-right min-w-max">
                            <div class="text-xs text-gray-500 font-medium">
                                {{ now()->format('l') }}
                            </div>
                            <div class="text-sm text-gray-900 font-semibold">
                                {{ now()->format('d M Y') }}
                            </div>
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
</body>
@yield('scripts')

</html>
