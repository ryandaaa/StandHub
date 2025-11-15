@extends('layouts.admin')

@section('title', 'Detail Booking')

@section('content')

    {{-- HEADER --}}
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Detail Booking
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Informasi lengkap mengenai booking, vendor, dan stand terkait.
        </p>
    </div>


    {{-- CARD BOOKING INFORMATION --}}
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 mb-8">

        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                Informasi Booking
            </h3>

            {{-- STATUS BADGE --}}
            <span
                class="
            px-4 py-1.5 rounded-full text-xs font-semibold shadow-sm
            @if ($booking->status == 'pending') bg-yellow-100 text-yellow-700
            @elseif($booking->status == 'approved') bg-green-100 text-green-700
            @elseif($booking->status == 'rejected') bg-red-100 text-red-700 @endif
        ">
                {{ ucfirst($booking->status) }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-6">

            <div>
                <p class="text-gray-500 text-sm">Nama Usaha</p>
                <p class="font-semibold text-lg text-gray-900">{{ $booking->nama_usaha }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Jenis Usaha</p>
                <p class="font-semibold text-gray-900">{{ $booking->jenis_usaha }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Kontak</p>
                <p class="font-semibold text-gray-900">{{ $booking->kontak }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Tanggal Booking</p>
                <p class="font-semibold text-gray-900">
                    {{ $booking->created_at->format('d M Y') }}
                </p>
            </div>

        </div>

    </div>



    {{-- CARD DETAIL STAND --}}
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 mb-8">

        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
            Detail Stand
        </h3>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-gray-500 text-sm">Nomor Stand</p>
                <p class="font-semibold text-gray-900">{{ $booking->stand->nomor_stand }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Lokasi</p>
                <p class="font-semibold text-gray-900">{{ $booking->stand->lokasi }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Ukuran</p>
                <p class="font-semibold text-gray-900">{{ $booking->stand->ukuran }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Harga</p>
                <p class="font-semibold text-gray-900">Rp {{ number_format($booking->stand->harga) }}</p>
            </div>

            <div class="col-span-2">
                <p class="text-gray-500 text-sm">Fasilitas</p>
                <p class="font-semibold text-gray-900">{{ $booking->stand->fasilitas }}</p>
            </div>
        </div>

        {{-- BUKTI PEMBAYARAN --}}
        <div class="mt-6">
            <p class="font-semibold text-gray-900 mb-2">Bukti Pembayaran:</p>

            @if ($booking->bukti_pembayaran)
                @if (Str::endsWith($booking->bukti_pembayaran, ['.jpg', '.jpeg', '.png']))
                    <img src="{{ asset('storage/' . $booking->bukti_pembayaran) }}"
                        class="w-72 rounded-xl shadow border border-gray-200">
                @else
                    <a href="{{ asset('storage/' . $booking->bukti_pembayaran) }}" class="text-blue-600 underline text-sm">
                        Download File
                    </a>
                @endif
            @else
                <p class="text-gray-500 text-sm italic">Belum ada bukti pembayaran.</p>
            @endif
        </div>

    </div>



    {{-- CARD DETAIL VENDOR --}}
    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 mb-8">

        <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
            Detail Vendor
        </h3>

        <div class="grid grid-cols-2 gap-6">

            <div>
                <p class="text-gray-500 text-sm">Nama Vendor</p>
                <p class="font-semibold text-gray-900">{{ $booking->vendor->name }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Email Vendor</p>
                <p class="font-semibold text-gray-900">{{ $booking->vendor->email }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Tanggal Daftar Vendor</p>
                <p class="font-semibold text-gray-900">
                    {{ $booking->vendor->created_at->format('d M Y') }}
                </p>
            </div>

        </div>

    </div>



    {{-- ACTION BUTTONS --}}
    @if ($booking->status == 'pending')
        <div class="flex gap-4">

            <a href="{{ route('admin.bookings.approve', $booking->id) }}"
                class="px-5 py-2.5 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Approve
            </a>

            <a href="{{ route('admin.bookings.reject', $booking->id) }}"
                class="px-5 py-2.5 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Reject
            </a>

        </div>
    @endif

@endsection
