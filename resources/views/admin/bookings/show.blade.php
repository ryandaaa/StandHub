@extends('layouts.admin')

@section('title', 'Detail Booking')

@section('content')

    <div class="space-y-6">

        {{-- HEADER --}}
        <div>
            <h2
                class="text-4xl font-extrabold tracking-tight 
                   bg-gradient-to-r from-slate-100 to-slate-400 
                   bg-clip-text text-transparent">
                Detail Booking
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Informasi lengkap mengenai booking, vendor, dan stand terkait.
            </p>
        </div>

        {{-- BOOKING CARD --}}
        <div
            class="p-8 rounded-3xl border border-white/10 bg-white/[0.03] backdrop-blur-xl
               shadow-[inset_0_0_0_1px_rgba(255,255,255,0.05),0_0_40px_-10px_rgba(0,0,0,0.8)]">

            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                    <div
                        class="h-12 w-12 rounded-2xl bg-blue-500/10 border border-blue-400/20 
                            flex items-center justify-center text-blue-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor">
                            <path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-100">Informasi Booking</h3>
                </div>

                {{-- STATUS BADGE --}}
                <span
                    class="
                px-4 py-1.5 rounded-full text-xs font-semibold backdrop-blur
                @if ($booking->status == 'pending') bg-yellow-500/20 border border-yellow-500/30 text-yellow-300
                @elseif($booking->status == 'approved') bg-emerald-500/20 border border-emerald-500/30 text-emerald-300
                @else bg-red-500/20 border border-red-500/30 text-red-300 @endif
            ">
                    {{ ucfirst($booking->status) }}
                </span>
            </div>

            <div class="grid md:grid-cols-2 gap-10 text-slate-300">

                <div>
                    <p class="text-sm text-slate-500">Nama Usaha</p>
                    <p class="mt-1 text-lg font-semibold text-slate-100">{{ $booking->nama_usaha }}</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Jenis Usaha</p>
                    <p class="mt-1 text-lg font-semibold text-slate-100">{{ $booking->jenis_usaha }}</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Kontak</p>
                    <p class="mt-1 text-lg font-semibold text-slate-100">{{ $booking->kontak }}</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Tanggal Booking</p>
                    <p class="mt-1 text-lg font-semibold text-slate-100">
                        {{ $booking->created_at->format('d M Y') }}
                    </p>
                </div>

            </div>
        </div>





        {{-- STAND CARD --}}
        <div
            class="p-8 rounded-3xl border border-white/10 bg-white/[0.03] backdrop-blur-xl
               shadow-[inset_0_0_0_1px_rgba(255,255,255,0.05),0_0_40px_-10px_rgba(0,0,0,0.8)]">

            <div class="flex items-center gap-3 mb-8">
                <div
                    class="h-12 w-12 rounded-2xl bg-purple-500/10 border border-purple-400/20 flex items-center justify-center text-purple-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor">
                        <path stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-100">Detail Stand</h3>
            </div>

            <div class="grid md:grid-cols-2 gap-10 text-slate-300">

                <div>
                    <p class="text-sm text-slate-500">Nomor Stand</p>
                    <p class="mt-1 text-xl font-semibold text-slate-100">{{ $booking->stand->nomor_stand }}</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Lokasi</p>
                    <p class="mt-1 text-xl font-semibold text-slate-100">{{ $booking->stand->lokasi }}</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Ukuran</p>
                    <p class="mt-1 text-lg font-semibold text-slate-100">{{ $booking->stand->ukuran }}</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Harga</p>
                    <p class="mt-1 text-lg font-semibold text-slate-100">Rp {{ number_format($booking->stand->harga) }}</p>
                </div>

                <div class="col-span-2">
                    <p class="text-sm text-slate-500">Fasilitas</p>
                    <p class="mt-1 text-slate-100">{{ $booking->stand->fasilitas }}</p>
                </div>

            </div>

            {{-- BUKTI PEMBAYARAN --}}
            <div class="mt-10">
                <p class="text-lg font-semibold text-slate-100 mb-3">Bukti Pembayaran</p>

                @if ($booking->bukti_pembayaran)
                    <div class="rounded-xl overflow-hidden border border-white/10 shadow-md max-w-sm">
                        <img src="{{ asset('storage/' . $booking->bukti_pembayaran) }}"
                            class="w-full object-cover opacity-90 hover:opacity-100 transition">
                    </div>
                @else
                    <p class="text-slate-500 text-sm italic">Belum ada bukti pembayaran.</p>
                @endif
            </div>

        </div>




        {{-- VENDOR CARD --}}
        <div
            class="p-8 rounded-3xl border border-white/10 bg-white/[0.03] backdrop-blur-xl
               shadow-[inset_0_0_0_1px_rgba(255,255,255,0.05),0_0_40px_-10px_rgba(0,0,0,0.8)]">

            <div class="flex items-center gap-3 mb-8">
                <div
                    class="h-12 w-12 rounded-2xl bg-indigo-500/10 border border-indigo-400/20 flex items-center justify-center text-indigo-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor">
                        <path stroke-width="2"
                            d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-100">Detail Vendor</h3>
            </div>

            <div class="grid md:grid-cols-2 gap-10 text-slate-300">

                <div>
                    <p class="text-sm text-slate-500">Nama Vendor</p>
                    <p class="mt-1 text-lg font-semibold text-slate-100">{{ $booking->vendor->name }}</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Email Vendor</p>
                    <p class="mt-1 text-lg font-semibold text-slate-100">{{ $booking->vendor->email }}</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Tanggal Daftar Vendor</p>
                    <p class="mt-1 text-lg font-semibold text-slate-100">
                        {{ $booking->vendor->created_at->format('d M Y') }}
                    </p>
                </div>

            </div>

        </div>




        {{-- ACTION BUTTONS --}}
        @if ($booking->status == 'pending')
            <div class="flex gap-4 pt-4">

                {{-- APPROVE --}}
                <a href="{{ route('admin.bookings.approve', $booking->id) }}"
                    class="px-6 py-3 rounded-xl font-medium text-emerald-200
                       bg-emerald-600/20 border border-emerald-500/30
                       hover:bg-emerald-600/30 hover:border-emerald-500/50
                       shadow-[0_0_20px_rgba(16,185,129,0.25)]
                       transition-all backdrop-blur flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor">
                        <path stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Approve
                </a>

                {{-- REJECT --}}
                <a href="{{ route('admin.bookings.reject', $booking->id) }}"
                    class="px-6 py-3 rounded-xl font-medium text-red-200
                       bg-red-600/20 border border-red-500/30
                       hover:bg-red-600/30 hover:border-red-500/50
                       shadow-[0_0_20px_rgba(220,38,38,0.25)]
                       transition-all backdrop-blur flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor">
                        <path stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Reject
                </a>
            </div>
        @endif

    </div>

@endsection
