@extends('layouts.vendor')

@section('title', 'Checkout')

@section('content')

    <div class="max-w-7xl mx-auto px-4">

        <!-- Header -->
        <div class="mb-6 mt-2 ">
            <h1 class="text-4xl font-extrabold tracking-tight text-slate-100">
                Checkout
            </h1>
            <p class="text-slate-400 mt-1">
                Lengkapi data usaha untuk menyelesaikan proses booking Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <!-- LEFT: DETAIL + FORM -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Stand Dipilih -->
                <div
                    class="bg-slate-900/60 backdrop-blur-xl border border-white/10 rounded-xl 
                       shadow-[0_0_25px_-8px_rgba(0,0,0,0.7)]">

                    <div class="px-6 py-4 border-b border-white/10">
                        <h2 class="text-lg font-semibold text-slate-100">Stand yang Dipilih</h2>
                    </div>

                    <div class="p-6">
                        <div class="flex gap-6">
                            <img src="{{ $stand->gambar_url ?? asset('default-stand.jpg') }}"
                                class="w-32 h-32 object-cover rounded-lg border border-white/10">

                            <div class="flex-1">
                                <div class="flex justify-between items-start">

                                    <!-- Left info -->
                                    <div>
                                        <h3 class="text-xl font-bold text-slate-100">
                                            {{ $stand->nomor_stand }}
                                        </h3>

                                        <p class="text-slate-400 mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1 text-slate-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $stand->lokasi }}
                                        </p>

                                        <div
                                            class="mt-3 inline-flex items-center px-3 py-1 
                                               rounded-full text-sm font-medium
                                               bg-blue-600/20 text-blue-300 border border-blue-600/30 backdrop-blur">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                            </svg>
                                            {{ $stand->ukuran }}
                                        </div>
                                    </div>

                                    <!-- Price -->
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-blue-400">
                                            Rp {{ number_format($stand->harga, 0, ',', '.') }}
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>


                <!-- FORM INFO USAHA -->
                <div
                    class="bg-slate-900/60 backdrop-blur-xl border border-white/10 rounded-xl 
                       shadow-[0_0_25px_-8px_rgba(0,0,0,0.7)]">

                    <div class="px-6 py-4 border-b border-white/10">
                        <h2 class="text-lg font-semibold text-slate-100">Informasi Usaha</h2>
                        <p class="text-sm text-slate-400 mt-1">Isi data usaha Anda dengan benar.</p>
                    </div>

                    <form id="checkoutForm" method="POST" action="{{ route('vendor.bookings.store') }}"
                        class="p-6 space-y-6">

                        @csrf
                        <input type="hidden" name="stand_id" value="{{ $stand->id }}">

                        {{-- Nama Usaha --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">
                                Nama Usaha <span class="text-red-400">*</span>
                            </label>
                            <input type="text" name="nama_usaha" required
                                class="w-full px-4 py-3 rounded-lg bg-slate-800/60 border border-white/10
                                   text-slate-100 placeholder-slate-500
                                   focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        {{-- Jenis Usaha --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">
                                Jenis Usaha <span class="text-red-400">*</span>
                            </label>
                            <input type="text" name="jenis_usaha" required
                                class="w-full px-4 py-3 rounded-lg bg-slate-800/60 border border-white/10
                                   text-slate-100 placeholder-slate-500
                                   focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        {{-- Kontak --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">
                                Nomor Kontak <span class="text-red-400">*</span>
                            </label>
                            <input type="tel" name="kontak" required
                                class="w-full px-4 py-3 rounded-lg bg-slate-800/60 border border-white/10
                                   text-slate-100 placeholder-slate-500
                                   focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <p class="text-xs text-slate-500 mt-1">Digunakan untuk konfirmasi booking.</p>
                        </div>

                    </form>
                </div>

            </div>


            <!-- RIGHT: SUMMARY -->
            <div class="lg:col-span-1">

                <div
                    class="bg-slate-900/70 backdrop-blur-xl border border-white/10 rounded-xl
                       shadow-[0_0_25px_-8px_rgba(0,0,0,0.7)] sticky top-8">

                    <div class="px-6 py-4 border-b border-white/10">
                        <h2 class="text-lg font-semibold text-slate-100">
                            Ringkasan Pembayaran
                        </h2>
                    </div>

                    <div class="p-6 space-y-4">

                        <div class="flex justify-between text-slate-300">
                            <span>Harga Stand</span>
                            <span class="font-medium">
                                Rp {{ number_format($stand->harga, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="flex justify-between text-slate-300">
                            <span>Biaya Admin</span>
                            <span class="font-medium text-blue-400">Rp 0</span>
                        </div>

                        <div class="border-t border-white/10 pt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold text-slate-100">Total</span>
                                <span class="text-2xl font-bold text-blue-400">
                                    Rp {{ number_format($stand->harga, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- CTA -->
                        <button id="submitCheckout"
                            class="w-full py-4 rounded-lg bg-blue-600 text-white font-bold
                               hover:bg-blue-500 transition
                               shadow-[0_0_20px_-6px_rgba(37,99,235,0.6)]
                               hover:shadow-[0_0_25px_-4px_rgba(37,99,235,0.8)] mt-4">
                            Lanjutkan ke Pembayaran
                        </button>

                    </div>
                </div>


                <!-- HELP -->
                <div class="mt-6 p-4 rounded-xl bg-blue-900/20 backdrop-blur border border-blue-600/20">

                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-sm font-semibold text-blue-200">Butuh Bantuan?</h3>
                            <p class="text-xs text-blue-300 mt-1">
                                Hubungi CS: <a href="#" class="underline">0800-123-4567</a>
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>


@section('scripts')
    <script>
        document.getElementById('submitCheckout').addEventListener('click', () => {
            document.getElementById('checkoutForm').submit();
        });
    </script>
@endsection

@endsection
