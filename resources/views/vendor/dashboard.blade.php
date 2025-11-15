@extends('layouts.vendor')
@section('title', 'Dashboard')

@section('content')

    <div class="space-y-6">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Dashboard Vendor</h2>
                <p class="text-sm text-gray-600 mt-1.5">
                    Selamat datang kembali! Berikut ringkasan bisnis Anda hari ini.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <span
                    class="inline-flex items-center rounded-full bg-green-50 border border-green-200 px-3 py-1.5 text-xs font-semibold text-green-700">
                    <span class="w-2 h-2 rounded-full bg-green-500 mr-2 animate-pulse"></span>
                    Status Aktif
                </span>
                <span class="text-xs text-gray-500">{{ now()->format('d M Y, H:i') }}</span>
            </div>
        </div>

        {{-- STATS CARDS --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- BOOKING AKTIF --}}
            <div
                class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-white to-gray-50 p-6 shadow-sm hover:shadow-md transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-green-50 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-110 transition-transform">
                </div>

                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <span
                            class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-semibold text-green-700">
                            Aktif
                        </span>
                    </div>

                    <p class="text-sm font-medium text-gray-600 mb-1">Booking Aktif</p>
                    <p class="text-4xl font-bold text-gray-900">{{ $activeBookings ?? 0 }}</p>

                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Update realtime
                    </div>
                </div>
            </div>

            {{-- STAND TERSEDIA --}}
            <div
                class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-white to-gray-50 p-6 shadow-sm hover:shadow-md transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-110 transition-transform">
                </div>

                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <span
                            class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-semibold text-blue-700">
                            Tersedia
                        </span>
                    </div>

                    <p class="text-sm font-medium text-gray-600 mb-1">Stand Tersedia</p>
                    <p class="text-4xl font-bold text-gray-900">{{ $availableStands ?? 0 }}</p>

                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Siap dibooking
                    </div>
                </div>
            </div>

            {{-- TOTAL TRANSAKSI --}}
            <div
                class="group relative overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-white to-gray-50 p-6 shadow-sm hover:shadow-md transition-all duration-300">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-amber-50 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-110 transition-transform">
                </div>

                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-amber-600 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span
                            class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-semibold text-green-700">
                            +20%
                        </span>
                    </div>

                    <p class="text-sm font-medium text-gray-600 mb-1">Total Transaksi</p>
                    <p class="text-4xl font-bold text-gray-900">{{ $totalBookings ?? 0 }}</p>

                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Bulan ini
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
                <a href="{{ route('vendor.stands.index') }}"
                    class="group relative overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-lg hover:border-green-200 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-lg bg-green-50 text-green-600 group-hover:bg-green-100 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900 group-hover:text-green-600 transition-colors">
                                Cari Stand
                            </p>
                            <p class="mt-1 text-xs text-gray-600">
                                Lihat stand tersedia dan booking
                            </p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('vendor.bookings.index') }}"
                    class="group relative overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-lg hover:border-blue-200 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-lg bg-blue-50 text-blue-600 group-hover:bg-blue-100 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">
                                Booking Saya
                            </p>
                            <p class="mt-1 text-xs text-gray-600">
                                Kelola dan pantau booking Anda
                            </p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="group relative overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-lg hover:border-amber-200 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-lg bg-amber-50 text-amber-600 group-hover:bg-amber-100 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900 group-hover:text-amber-600 transition-colors">
                                Profil Saya
                            </p>
                            <p class="mt-1 text-xs text-gray-600">
                                Update informasi profil vendor
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- BOOKING TERBARU --}}
            <div class="lg:col-span-2 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Booking Terbaru</h3>
                        <p class="text-xs text-gray-500 mt-1">Riwayat booking Anda</p>
                    </div>
                    <a href="{{ route('vendor.bookings.index') }}"
                        class="text-xs font-medium text-green-600 hover:text-green-700">
                        Lihat Semua →
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($bookings as $booking)
                        <div
                            class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-green-200 hover:bg-green-50/30 transition-all">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-100 text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900">{{ $booking->stand->name ?? 'Stand Name' }}
                                </p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $booking->booking_date ?? 'Date' }}</p>
                            </div>
                            <span
                                class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold
                        @if ($booking->status == 'confirmed') bg-green-50 text-green-700
                        @elseif($booking->status == 'pending') bg-amber-50 text-amber-700
                        @else bg-gray-50 text-gray-700 @endif">
                                {{ ucfirst($booking->status ?? 'pending') }}
                            </span>
                        </div>
                    @empty
                        <div class="py-12 text-center">
                            <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <p class="text-sm font-medium text-gray-700">Belum ada booking</p>
                            <p class="text-xs text-gray-500 mt-1">Mulai booking stand untuk bisnis Anda</p>
                            <a href="{{ route('vendor.stands.index') }}"
                                class="mt-4 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
                                Cari Stand
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- NOTIFIKASI & INFO --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">Notifikasi</h3>
                    <span class="flex h-2 w-2 relative">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                </div>

                <div class="space-y-4">
                    <div class="flex gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900">
                                Booking Anda di <span class="font-semibold text-green-600">Stand A-12</span> dikonfirmasi
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">10 menit lalu</p>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900">
                                Jangan lupa pembayaran untuk booking <span class="font-semibold">#BK-001</span>
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">1 jam lalu</p>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-8 w-8 rounded-full bg-amber-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900">
                                Stand baru tersedia di <span class="font-semibold">Area Premium</span>
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">2 jam lalu</p>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900">
                                Promo spesial: diskon <span class="font-semibold text-purple-600">20%</span> untuk booking
                                minggu ini
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">5 jam lalu</p>
                        </div>
                    </div>
                </div>

                <button
                    class="mt-5 w-full py-2.5 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    Lihat Semua Notifikasi
                </button>
            </div>

        </div>

    </div>

@endsection
