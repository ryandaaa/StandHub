@extends('layouts.admin')

@section('title', 'Tolak Booking')

@section('content')

    <div class="space-y-4">

        <!-- HEADER -->
        <div>
            <h2
                class="text-4xl font-extrabold tracking-tight bg-gradient-to-r from-red-300 to-red-500 
                   bg-clip-text text-transparent">
                Tolak Booking
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Berikan alasan penolakan untuk memastikan transparansi kepada vendor.
            </p>
        </div>

        <!-- CARD WRAPPER -->
        <div
            class="p-8 rounded-3xl border border-red-500/10 bg-white/[0.03] backdrop-blur-xl
               shadow-[inset_0_0_0_1px_rgba(255,255,255,0.06),0_0_50px_-10px_rgba(220,38,38,0.35)]
               transition-all duration-500">

            <!-- TEXT -->
            <p class="text-slate-300 text-lg leading-relaxed mb-6">
                Anda akan menolak booking dari vendor
                <span class="font-semibold text-slate-100">{{ $booking->vendor->name }}</span>
                untuk stand
                <span class="font-semibold text-slate-100">{{ $booking->stand->nomor_stand }}</span>.
            </p>

            <!-- FORM -->
            <form method="POST" action="{{ route('admin.bookings.reject', $booking->id) }}" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-300 tracking-wide">
                        Alasan Penolakan
                    </label>

                    <textarea name="catatan_admin" rows="5" required
                        class="w-full rounded-xl bg-white/[0.05] border border-white/10 text-slate-100
                           placeholder-slate-500 p-4 backdrop-blur-md
                           shadow-[inset_0_0_0_1px_rgba(255,255,255,0.04)]
                           focus:outline-none focus:ring-2 focus:ring-red-400/40 focus:border-red-400/40 transition">
                    {{ old('catatan_admin') }}
                </textarea>

                    @error('catatan_admin')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ACTION BUTTONS -->
                <div class="pt-4 flex gap-3">

                    <!-- SUBMIT -->
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl font-medium text-red-200
                           bg-red-600/20 border border-red-500/30
                           hover:bg-red-600/30 hover:border-red-500/50
                           shadow-[0_0_20px_rgba(220,38,38,0.25)]
                           transition-all duration-300 backdrop-blur">
                        Tolak Booking
                    </button>

                    <!-- CANCEL -->
                    <a href="{{ route('admin.bookings.show', $booking->id) }}"
                        class="px-6 py-2.5 rounded-xl font-medium
                           bg-white/10 text-slate-200 border border-white/10
                           hover:bg-white/20 hover:border-white/20
                           transition-all duration-300 backdrop-blur shadow-sm">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
