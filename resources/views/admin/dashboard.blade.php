@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Dashboard Overview</h2>
            <p class="text-sm text-gray-600 mt-1.5">
                Selamat datang kembali! Berikut ringkasan sistem Anda hari ini.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <span class="inline-flex items-center rounded-full bg-green-50 border border-green-200 px-3 py-1.5 text-xs font-semibold text-green-700">
                <span class="w-2 h-2 rounded-full bg-green-500 mr-2 animate-pulse"></span>
                Sistem Aktif
            </span>
            <span class="text-xs text-gray-500">{{ now()->format('d M Y, H:i') }}</span>
        </div>
    </div>

    {{-- STATS CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- TOTAL STAND --}}
        <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-white to-gray-50 p-6 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-110 transition-transform"></div>
            
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-semibold text-green-700">
                        +12%
                    </span>
                </div>
                
                <p class="text-sm font-medium text-gray-600 mb-1">Total Stand</p>
                <p class="text-4xl font-bold text-gray-900">{{ $totalStands }}</p>
                
                <div class="mt-4 flex items-center text-xs text-gray-500">
                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Update 5 menit lalu
                </div>
            </div>
        </div>

        {{-- BOOKED --}}
        <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-white to-gray-50 p-6 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 bg-purple-50 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-110 transition-transform"></div>
            
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-purple-600 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <span class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-semibold text-green-700">
                        +8%
                    </span>
                </div>
                
                <p class="text-sm font-medium text-gray-600 mb-1">Stand Terboking</p>
                <p class="text-4xl font-bold text-gray-900">{{ $booked }}</p>
                
                <div class="mt-4 flex items-center text-xs text-gray-500">
                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Update 5 menit lalu
                </div>
            </div>
        </div>

        {{-- VENDOR --}}
        <div class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-white to-gray-50 p-6 shadow-sm hover:shadow-md transition-all duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 bg-amber-50 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-110 transition-transform"></div>
            
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-amber-600 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <span class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-semibold text-green-700">
                        +15%
                    </span>
                </div>
                
                <p class="text-sm font-medium text-gray-600 mb-1">Vendor Terdaftar</p>
                <p class="text-4xl font-bold text-gray-900">{{ $vendors }}</p>
                
                <div class="mt-4 flex items-center text-xs text-gray-500">
                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Update 5 menit lalu
                </div>
            </div>
        </div>

    </div>

    {{-- QUICK ACTIONS --}}
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
            <span class="text-xs text-gray-500">Akses cepat ke fitur utama</span>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('admin.stands.index') }}"
               class="group relative overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
                <div class="flex items-start gap-4">
                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-blue-50 text-blue-600 group-hover:bg-blue-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">
                            Tambah Stand Baru
                        </p>
                        <p class="mt-1 text-xs text-gray-600">
                            Buat stand baru dan atur ketersediaan
                        </p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.bookings.index') }}"
               class="group relative overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-lg hover:border-purple-200 transition-all duration-300">
                <div class="flex items-start gap-4">
                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-purple-50 text-purple-600 group-hover:bg-purple-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-900 group-hover:text-purple-600 transition-colors">
                            Kelola Booking
                        </p>
                        <p class="mt-1 text-xs text-gray-600">
                            Pantau dan kelola booking terbaru
                        </p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.vendors.index') }}"
               class="group relative overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-lg hover:border-amber-200 transition-all duration-300">
                <div class="flex items-start gap-4">
                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-amber-50 text-amber-600 group-hover:bg-amber-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-900 group-hover:text-amber-600 transition-colors">
                            Lihat Vendor
                        </p>
                        <p class="mt-1 text-xs text-gray-600">
                            Tinjau vendor terdaftar dan aktif
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- STATISTIK GRAFIK --}}
        <div class="lg:col-span-2 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Statistik Mingguan</h3>
                    <p class="text-xs text-gray-500 mt-1">Perkembangan booking 7 hari terakhir</p>
                </div>
                <div class="flex items-center gap-2">
                    <button class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        7 Hari
                    </button>
                    <button class="px-3 py-1.5 text-xs font-medium text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                        30 Hari
                    </button>
                </div>
            </div>
            
            <div class="h-64 rounded-xl bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center border border-gray-200">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <p class="text-sm font-medium text-gray-700">Grafik Chart</p>
                    <p class="text-xs text-gray-500 mt-1">Integrasi Chart.js atau library lainnya</p>
                </div>
            </div>
        </div>

        {{-- ACTIVITY LOG --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
            </div>

            <div class="space-y-4">
                <div class="flex gap-3">
                    <div class="flex-shrink-0 mt-1">
                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-gray-900">
                            Vendor <span class="font-semibold text-blue-600">Kopi Seduh</span> booking stand
                        </p>
                        <p class="text-xs text-gray-500 mt-0.5">2 menit lalu</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="flex-shrink-0 mt-1">
                        <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-gray-900">
                            Admin menambahkan 1 stand di <span class="font-semibold">Area B</span>
                        </p>
                        <p class="text-xs text-gray-500 mt-0.5">15 menit lalu</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="flex-shrink-0 mt-1">
                        <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-gray-900">
                            Pembayaran <span class="font-semibold text-green-600">#INV-004</span> diverifikasi
                        </p>
                        <p class="text-xs text-gray-500 mt-0.5">1 jam lalu</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="flex-shrink-0 mt-1">
                        <div class="h-8 w-8 rounded-full bg-amber-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-gray-900">
                            Vendor <span class="font-semibold">Bakso Mas Eko</span> pending approval
                        </p>
                        <p class="text-xs text-gray-500 mt-0.5">3 jam lalu</p>
                    </div>
                </div>
            </div>

            <button class="mt-5 w-full py-2.5 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                Lihat Semua Aktivitas
            </button>
        </div>

    </div>

</div>

@endsection