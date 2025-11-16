@extends('layouts.vendor')

@section('title', 'Cari Stand')

@section('content')

    <div class="max-w-7xl mx-auto px-4">
        <!-- Header Checkout -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
            <p class="text-gray-600 mt-2">Lengkapi data usaha Anda untuk menyelesaikan booking</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- LEFT & MIDDLE: Form Section -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Produk yang dipilih -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Stand yang Dipilih</h2>
                    </div>
                    <div class="p-6">
                        <div class="flex gap-6">
                            <img src="{{ $stand->gambar_url ?? asset('default-stand.jpg') }}"
                                class="w-32 h-32 object-cover rounded-lg border border-gray-200">

                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900">{{ $stand->nomor_stand }}</h3>
                                        <p class="text-gray-600 mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ $stand->lokasi ?? 'Lokasi tidak tersedia' }}
                                        </p>
                                        <div
                                            class="mt-3 inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 text-sm font-medium rounded-full">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                                                </path>
                                            </svg>
                                            {{ $stand->ukuran ?? $stand->panjang . 'x' . $stand->lebar . ' meter' }}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-green-600">Rp
                                            {{ number_format($stand->harga, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Data Usaha -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Informasi Usaha</h2>
                        <p class="text-sm text-gray-600 mt-1">Lengkapi data usaha Anda dengan benar</p>
                    </div>

                    {{-- FORM MULAI --}}
                    <form id="checkoutForm" method="POST" action="{{ route('vendor.bookings.store') }}"
                        class="p-6 space-y-5">
                        @csrf


                        {{-- Stand ID yang dipilih --}}
                        <input type="hidden" name="stand_id" value="{{ $stand->id }}">

                        {{-- Nama Usaha --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Usaha <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_usaha" required placeholder="Contoh: Warung Makan Sederhana"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg 
                          focus:ring-2 focus:ring-green-500 focus:border-transparent transition">

                            @error('nama_usaha')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Jenis Usaha --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Jenis Usaha <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="jenis_usaha" required placeholder="Contoh: Makanan & Minuman"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg 
                          focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                            @error('jenis_usaha')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Nomor Kontak --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Kontak <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="kontak" required placeholder="08xxxxxxxxxx"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg 
                          focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                            <p class="text-xs text-gray-500 mt-2">
                                Nomor ini akan digunakan untuk konfirmasi booking
                            </p>
                            @error('kontak')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Submit Button --}}
                    </form>
                    {{-- FORM SELESAI --}}
                </div>

            </div>

            <!-- RIGHT: Ringkasan Pembayaran (Sticky) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 sticky top-8">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Ringkasan Pembayaran</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between text-gray-700">
                            <span>Harga Stand</span>
                            <span class="font-medium">Rp {{ number_format($stand->harga, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-700">
                            <span>Biaya Admin</span>
                            <span class="font-medium text-green-600">Rp 0</span>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold text-gray-900">Total</span>
                                <span class="text-2xl font-bold text-green-600">
                                    Rp {{ number_format($stand->harga, 0, ',', '.') }}
                                </span>

                            </div>
                        </div>

                        <!-- CTA Button -->
                        <button type="button" id="submitCheckout"
                            class="w-full py-4 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition shadow-md hover:shadow-lg mt-6">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                                Lanjutkan ke Pembayaran
                            </span>
                        </button>


                        <!-- Trust Badges -->
                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex items-center justify-center space-x-4 text-xs text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Pembayaran Aman
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Terverifikasi
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Help Section -->
                <div class="mt-6 bg-blue-50 rounded-lg p-4 border border-blue-200">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="text-sm font-semibold text-blue-900">Butuh Bantuan?</h3>
                            <p class="text-xs text-blue-700 mt-1">Hubungi customer service kami di <a href="#"
                                    class="underline font-medium">0800-123-4567</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('submitCheckout');
            if (btn) {
                btn.addEventListener('click', function() {
                    document.getElementById('checkoutForm').submit();
                });
            }
        });
    </script>
@endsection


@endsection
