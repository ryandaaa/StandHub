@extends('layouts.vendor')

@section('title', 'Booking Saya')

@section('content')
    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in {
            animation: slideIn .45s ease-out;
        }

        .booking-card {
            transition: all .25s ease;
            border: 1px solid #eef2f7;
        }

        .booking-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px -12px rgba(0, 0, 0, .08);
        }

        .status-pulse {
            animation: pulse 2s ease infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .55;
            }
        }
    </style>

    <!-- Header -->
    <div class="mb-8 animate-slide-in">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 flex items-center">
                    <svg class="w-10 h-10 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    Booking Saya
                </h1>
                <p class="text-gray-600 mt-2">Kelola semua booking stand Anda dalam satu tempat</p>
            </div>

            <a href="{{ route('vendor.stands.index') }}"
                class="px-6 py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition shadow-md hover:shadow-lg flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Booking Stand Baru
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 p-4 rounded-xl shadow-sm animate-slide-in">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-green-800 font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Search + Filter -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" placeholder="Cari nama usaha, jenis, atau nomor stand..."
                        class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl 
                              focus:border-green-500 focus:ring-green-500 transition">
                    <svg class="w-6 h-6 text-gray-400 absolute left-4 top-3.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex gap-3">
                <select class="px-6 py-3 border border-gray-300 rounded-xl focus:border-green-500 bg-white">
                    <option>Semua Status</option>
                    <option>Pending</option>
                    <option>Approved</option>
                    <option>Rejected</option>
                </select>
                <select class="px-6 py-3 border border-gray-300 rounded-xl focus:border-green-500 bg-white">
                    <option>Terbaru</option>
                    <option>Terlama</option>
                    <option>Nama A-Z</option>
                </select>
            </div>
        </div>
    </div>

    @if ($bookings->count() == 0)

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="bg-gray-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Booking</h3>
                <p class="text-gray-600 mb-6">Mulailah booking stand dan kembangkan usaha Anda!</p>

                <a href="{{ route('vendor.stands.index') }}"
                    class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Lihat Stand Tersedia
                </a>
            </div>
        </div>
    @else
        <!-- Booking List -->
        <div class="space-y-4">
            @foreach ($bookings as $b)
                <div class="booking-card bg-white rounded-2xl shadow-sm">
                    <div class="p-6">

                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="bg-green-50 rounded-xl p-4">
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                            </path>
                                        </svg>
                                    </div>

                                    <div class="flex-1">
                                        <div class="flex items-center gap-3">
                                            <h3 class="text-xl font-bold text-gray-900">Stand {{ $b->stand->nomor_stand }}
                                            </h3>

                                            <span
                                                class="px-3 py-1 text-xs font-semibold rounded-full
                                @if ($b->status == 'pending') bg-amber-100 text-amber-800 status-pulse
                                @elseif ($b->status == 'approved') bg-green-100 text-green-800
                                @elseif ($b->status == 'rejected') bg-red-100 text-red-700 @endif">
                                                {{ strtoupper($b->status) }}
                                            </span>
                                        </div>

                                        <p class="text-gray-500 text-sm mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            Booking: {{ $b->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                    <div class="flex items-center">
                                        <div class="bg-gray-100 rounded-lg p-2 mr-3">
                                            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Nama Usaha</p>
                                            <p class="font-semibold text-gray-900">{{ $b->nama_usaha }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <div class="bg-gray-100 rounded-lg p-2 mr-3">
                                            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 7h.01M7 3h5a2 2 0 011.414.586l7 7">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Jenis Usaha</p>
                                            <p class="font-semibold text-gray-900">{{ $b->jenis_usaha }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <div class="bg-gray-100 rounded-lg p-2 mr-3">
                                            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Kontak</p>
                                            <p class="font-semibold text-gray-900">{{ $b->kontak }}</p>
                                        </div>
                                    </div>
                                </div>

                                @if ($b->status == 'pending' && !$b->bukti_pembayaran)
                                    <div class="bg-amber-50 border border-amber-200 p-4 rounded-xl mb-4">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-amber-600 mr-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01M5 20h14a2 2 0 002-2V8">
                                                </path>
                                            </svg>
                                            <p class="text-sm text-amber-800 font-medium">
                                                Segera upload bukti pembayaran untuk konfirmasi booking Anda
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                @if ($b->status == 'approved')
                                    <div class="bg-green-50 border border-green-200 p-4 rounded-xl mb-4">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4">
                                                </path>
                                            </svg>
                                            <p class="text-sm text-green-800 font-medium">
                                                Booking Anda telah disetujui! Silakan mulai persiapan usaha Anda.
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                @if ($b->status == 'rejected' && $b->catatan_admin)
                                    <div class="bg-red-50 border border-red-200 p-4 rounded-xl mb-4">
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-red-600 mr-3 mt-0.5" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                            <div>
                                                <p class="text-sm font-semibold text-red-800">Alasan Ditolak:</p>
                                                <p class="text-sm text-red-700 mt-1">{{ $b->catatan_admin }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                            @if ($b->status == 'pending')
                                @if (!$b->bukti_pembayaran)
                                    <a href="{{ route('vendor.bookings.uploadForm', $b->id) }}"
                                        class="flex-1 px-4 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl 
                              shadow-md flex items-center justify-center transition">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        Upload Bukti Pembayaran
                                    </a>
                                @endif

                                <form action="{{ route('vendor.bookings.destroy', $b->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin membatalkan booking ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-6 py-3 bg-red-100 text-red-700 font-semibold rounded-xl hover:bg-red-200 transition flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Batalkan
                                    </button>
                                </form>
                            @endif

                            <a href="{{ route('vendor.bookings.show', $b->id) }}"
                                class="px-6 py-3 bg-gray-800 text-white font-semibold rounded-xl hover:bg-gray-900 transition flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7">
                                    </path>
                                </svg>
                                Detail
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $bookings->links() }}
        </div>

    @endif

@endsection
