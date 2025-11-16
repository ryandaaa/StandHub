@extends('layouts.vendor')

@section('title', 'Detail Booking')

@section('content')

    <div class="max-w-4xl mx-auto mt-2">

        {{-- Header --}}
        <div class="mb-4">
            <h1 class="text-3xl font-extrabold text-slate-100">Detail Booking</h1>
            <p class="text-slate-400 mt-1">Informasi lengkap mengenai booking Anda.</p>
        </div>

        {{-- Card --}}
        <div
            class="bg-slate-900/50 backdrop-blur-xl border border-white/10 
               rounded-2xl p-8 shadow-[0_0_25px_-10px_rgba(255,255,255,0.15)]">

            {{-- Stand Info --}}
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-slate-100">
                    Stand {{ $booking->stand->nomor_stand }}
                </h2>
                <p class="text-slate-400 text-sm mt-1">
                    Dibooking pada: {{ $booking->created_at->format('d M Y') }}
                </p>
            </div>

            {{-- Status --}}
            <div class="mb-8">
                <span
                    class="px-4 py-1.5 text-xs font-bold rounded-full border
                @if ($booking->status == 'pending') bg-amber-500/20 text-amber-300 border-amber-600/40
                @elseif ($booking->status == 'approved')
                    bg-blue-500/20 text-blue-300 border-blue-600/40
                @elseif ($booking->status == 'rejected')
                    bg-red-500/20 text-red-300 border-red-600/40 @endif">
                    {{ ucfirst($booking->status) }}
                </span>
            </div>

            {{-- Detail Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">

                <div>
                    <p class="text-slate-400">Nama Usaha</p>
                    <p class="text-slate-100 font-semibold">{{ $booking->nama_usaha }}</p>
                </div>

                <div>
                    <p class="text-slate-400">Jenis Usaha</p>
                    <p class="text-slate-100 font-semibold">{{ $booking->jenis_usaha }}</p>
                </div>

                <div>
                    <p class="text-slate-400">Kontak</p>
                    <p class="text-slate-100 font-semibold">{{ $booking->kontak }}</p>
                </div>

                <div>
                    <p class="text-slate-400">Lokasi Stand</p>
                    <p class="text-slate-100 font-semibold">{{ $booking->stand->lokasi }}</p>
                </div>

                <div>
                    <p class="text-slate-400">Ukuran</p>
                    <p class="text-slate-100 font-semibold">
                        {{ $booking->stand->ukuran ?? $booking->stand->panjang . 'x' . $booking->stand->lebar . 'm' }}
                    </p>
                </div>

                <div>
                    <p class="text-slate-400">Harga</p>
                    <p class="text-blue-300 font-bold text-lg">
                        Rp {{ number_format($booking->stand->harga, 0, ',', '.') }}
                    </p>
                </div>

            </div>

            {{-- Catatan Admin --}}
            @if ($booking->status == 'rejected' && $booking->catatan_admin)
                <div class="mt-8 bg-red-500/10 border border-red-600/30 text-red-300 px-5 py-4 rounded-xl text-sm">
                    <strong>Catatan Admin:</strong> {{ $booking->catatan_admin }}
                </div>
            @endif

            @if ($booking->status == 'pending' && !$booking->bukti_pembayaran)
                <div class="mt-8 bg-amber-500/10 border border-amber-600/30 text-amber-200 px-5 py-4 rounded-xl text-sm">
                    Silakan upload bukti pembayaran untuk memproses booking ini.
                </div>
            @endif

            {{-- Actions --}}
            <div class="flex items-center gap-4 mt-10">

                <a href="{{ route('vendor.bookings.index') }}"
                    class="px-5 py-3 rounded-lg bg-slate-800 text-white text-sm font-medium 
                       hover:bg-slate-700 transition">
                    Kembali
                </a>

                @if ($booking->status == 'pending' && !$booking->bukti_pembayaran)
                    <a href="{{ route('vendor.bookings.uploadForm', $booking->id) }}"
                        class="px-5 py-3 rounded-lg bg-blue-600 text-white text-sm font-semibold 
                           hover:bg-blue-500 transition shadow-[0_0_15px_-4px_rgba(59,130,246,0.6)]">
                        Upload Bukti Pembayaran
                    </a>
                @endif

            </div>

        </div>

    </div>

@endsection
