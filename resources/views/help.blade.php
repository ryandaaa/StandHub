@extends('layouts.admin')

@section('title', 'Bantuan')

@section('content')

    {{-- HERO SECTION --}}
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-3 flex justify-center items-center gap-3">
            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M18 8a6 6 0 11-12 0 6 6 0 0112 0zm-2 8H8a4 4 0 00-4 4v1h16v-1a4 4 0 00-4-4z" />
            </svg>
            Pusat Bantuan
        </h1>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">
            Butuh bantuan? Kami siap membantu. Temukan jawaban, panduan, dan kontak layanan untuk
            memastikan pengalaman Anda berjalan lancar.
        </p>
    </div>


    {{-- QUICK GUIDE --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

        <div class="bg-white p-6 rounded-2xl shadow border border-gray-100 hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-3">
                <div class="p-3 rounded-xl bg-blue-100 text-blue-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4m0 4h.01M21 12A9 9 0 116 5.29" />
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 text-lg">Cara Booking Stand</h3>
            </div>
            <p class="text-gray-600 text-sm">
                Panduan lengkap cara memilih stand, upload bukti pembayaran, hingga menunggu persetujuan admin.
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow border border-gray-100 hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-3">
                <div class="p-3 rounded-xl bg-green-100 text-green-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0" />
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 text-lg">Status Booking</h3>
            </div>
            <p class="text-gray-600 text-sm">
                Penjelasan arti status Pending, Approved, Rejected, dan apa langkah selanjutnya.
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow border border-gray-100 hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-3">
                <div class="p-3 rounded-xl bg-purple-100 text-purple-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 text-lg">Waktu Respon</h3>
            </div>
            <p class="text-gray-600 text-sm">
                Informasi estimasi waktu respon admin dan kapan Anda akan menerima notifikasi perubahan status.
            </p>
        </div>

    </div>


    {{-- FAQ SECTION --}}
    <div class="bg-white p-8 rounded-2xl shadow border border-gray-100 mb-12">

        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M8 10h.01M12 10h.01M16 10h.01M21 12a9 9 0 11-18 0" />
            </svg>
            Pertanyaan yang Sering Diajukan
        </h2>

        <div x-data="{ open: null }" class="space-y-4">

            {{-- FAQ ITEM --}}
            <div class="border-b pb-4">
                <button @click="open === 1 ? open = null : open = 1"
                    class="flex justify-between items-center w-full text-left">
                    <span class="font-semibold text-gray-900">Bagaimana cara melakukan booking stand?</span>
                    <svg :class="open === 1 ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition" fill="none"
                        stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <p x-show="open === 1" x-transition class="mt-3 text-gray-600 text-sm">
                    Anda cukup memilih stand yang ingin dibooking, isi informasi usaha, dan upload bukti pembayaran.
                </p>
            </div>

            <div class="border-b pb-4">
                <button @click="open === 2 ? open = null : open = 2"
                    class="flex justify-between items-center w-full text-left">
                    <span class="font-semibold text-gray-900">Berapa lama proses persetujuan admin?</span>
                    <svg :class="open === 2 ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition" fill="none"
                        stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <p x-show="open === 2" x-transition class="mt-3 text-gray-600 text-sm">
                    Biasanya 1–24 jam, tergantung antrean. Anda akan menerima notifikasi otomatis setelah diproses.
                </p>
            </div>

            <div class="border-b pb-4">
                <button @click="open === 3 ? open = null : open = 3"
                    class="flex justify-between items-center w-full text-left">
                    <span class="font-semibold text-gray-900">Apa yang harus dilakukan jika booking saya ditolak?</span>
                    <svg :class="open === 3 ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition" fill="none"
                        stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <p x-show="open === 3" x-transition class="mt-3 text-gray-600 text-sm">
                    Anda akan mendapatkan catatan alasan penolakan. Silakan perbaiki dan lakukan booking ulang.
                </p>
            </div>

        </div>

    </div>


    {{-- CONTACT SUPPORT --}}
    <div class="bg-white p-8 rounded-2xl shadow border border-gray-100 mb-12">

        <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-2">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M2 8l10-6 10 6v6a10 10 0 11-20 0V8z" />
            </svg>
            Hubungi Bantuan
        </h2>

        <p class="text-gray-600 mb-6 text-sm">
            Tim kami akan membantu Anda dengan cepat. Silakan pilih salah satu metode di bawah:
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <a href="mailto:support@example.com"
                class="p-6 rounded-xl border border-gray-200 hover:border-blue-500 hover:shadow-md transition flex items-center gap-3">
                <div class="p-3 rounded-lg bg-blue-100 text-blue-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M16 12H8m0 0v8m0-8V4m8 8H8" />
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-900">Email Support</p>
                    <p class="text-xs text-gray-500">support@example.com</p>
                </div>
            </a>

            <a href="#"
                class="p-6 rounded-xl border border-gray-200 hover:border-blue-500 hover:shadow-md transition flex items-center gap-3">
                <div class="p-3 rounded-lg bg-green-100 text-green-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M22 12l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-900">WhatsApp</p>
                    <p class="text-xs text-gray-500">+62 812-3456-7890</p>
                </div>
            </a>

            <a href="#"
                class="p-6 rounded-xl border border-gray-200 hover:border-blue-500 hover:shadow-md transition flex items-center gap-3">
                <div class="p-3 rounded-lg bg-purple-100 text-purple-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M18 8a6 6 0 11-12 0" />
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-900">Live Chat</p>
                    <p class="text-xs text-gray-500">Segera hadir</p>
                </div>
            </a>

        </div>
    </div>


    {{-- CTA --}}
    <div class="text-center mt-16">
        <h3 class="text-2xl font-bold text-gray-900 mb-2">Masih butuh bantuan?</h3>
        <p class="text-gray-600 mb-4">
            Jangan ragu untuk menghubungi kami kapan saja. Kami siap membantu.
        </p>

        <a href="mailto:support@example.com"
            class="px-6 py-3 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition inline-block">
            Hubungi Support Sekarang
        </a>
    </div>

@endsection
