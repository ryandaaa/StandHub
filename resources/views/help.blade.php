@extends('layouts.admin')
@section('title', 'Pusat Bantuan')

@section('content')

    {{-- HERO --}}
    <div class="text-center pt-10 pb-14">
        <h1
            class="text-5xl font-extrabold tracking-tight bg-gradient-to-r from-slate-100 to-slate-400 text-transparent bg-clip-text">
            Pusat Bantuan
        </h1>
        <p class="text-slate-400 text-lg mt-3 max-w-2xl mx-auto">
            Temukan jawaban, panduan penggunaan, dan bantuan cepat langsung dari tim StandHub.
        </p>
    </div>

    {{-- QUICK GUIDE --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-14">

        @php
            $guides = [
                [
                    'title' => 'Cara Booking Stand',
                    'desc' => 'Langkah-langkah pemesanan, upload bukti bayar, dan menunggu verifikasi.',
                    'color' => 'blue',
                    'icon' => '<path stroke-width="2" d="M12 8v4m0 4h.01M21 12A9 9 0 116 5.29" />',
                ],
                [
                    'title' => 'Status Booking',
                    'desc' => 'Penjelasan lengkap arti Pending, Approved, Rejected, dan tindakan selanjutnya.',
                    'color' => 'emerald',
                    'icon' => '<path stroke-width="2" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0" />',
                ],
                [
                    'title' => 'Waktu Respon',
                    'desc' => 'Estimasi durasi proses verifikasi admin dan alur notifikasi otomatis.',
                    'color' => 'violet',
                    'icon' => '<path stroke-width="2" d="M12 6v6l4 2" />',
                ],
            ];
        @endphp

        @foreach ($guides as $g)
            <div
                class="p-6 rounded-2xl border border-white/10 bg-white/[0.03] backdrop-blur-xl
                shadow-[0_0_20px_-6px_rgba(0,0,0,0.8)] hover:scale-[1.02] hover:shadow-[0_0_30px_-6px_rgba(0,0,0,0.9)]
                transition">
                <div class="flex items-center gap-3 mb-3">
                    <div
                        class="p-3 rounded-xl bg-{{ $g['color'] }}-500/10 border border-{{ $g['color'] }}-500/20 text-{{ $g['color'] }}-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor">{!! $g['icon'] !!}</svg>
                    </div>
                    <h3 class="font-semibold text-slate-100 text-lg">{{ $g['title'] }}</h3>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed">{{ $g['desc'] }}</p>
            </div>
        @endforeach

    </div>



    {{-- FAQ --}}
    <div
        class="p-10 rounded-3xl border border-white/10 bg-white/[0.03] backdrop-blur-xl
            shadow-[0_0_30px_-10px_rgba(0,0,0,0.7)] mb-14">

        <h2 class="text-3xl font-bold text-slate-100 mb-8">FAQ – Pertanyaan Umum</h2>

        <div x-data="{ open: null }" class="space-y-6">

            @php
                $faq = [
                    [
                        'q' => 'Bagaimana cara melakukan booking stand?',
                        'a' =>
                            'Pilih stand, isi informasi usaha, upload bukti pembayaran, lalu tunggu persetujuan admin.',
                    ],
                    [
                        'q' => 'Berapa lama proses persetujuan admin?',
                        'a' => '1–24 jam tergantung antrean. Anda akan menerima notifikasi otomatis setelah diproses.',
                    ],
                    [
                        'q' => 'Apa yang harus saya lakukan jika booking ditolak?',
                        'a' => 'Periksa catatan admin, perbaiki informasi, lalu lakukan pengajuan ulang.',
                    ],
                ];
            @endphp

            @foreach ($faq as $index => $f)
                <div class="border-b border-white/10 pb-4">
                    <button @click="open === {{ $index }} ? open = null : open = {{ $index }}"
                        class="flex justify-between items-center w-full text-left text-slate-100">
                        <span class="font-medium">{{ $f['q'] }}</span>
                        <svg :class="open === {{ $index }} ? 'rotate-180' : ''"
                            class="w-5 h-5 text-slate-400 transition-transform" fill="none" stroke="currentColor">
                            <path stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <p x-show="open === {{ $index }}" x-transition
                        class="mt-3 text-slate-400 text-sm leading-relaxed">
                        {{ $f['a'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>



    {{-- CONTACT --}}
    <div
        class="p-10 rounded-3xl border border-white/10 bg-white/[0.03] backdrop-blur-xl
            shadow-[0_0_30px_-10px_rgba(0,0,0,0.7)] mb-20">

        <h2 class="text-3xl font-bold text-slate-100 mb-7">Hubungi Bantuan</h2>
        <p class="text-slate-400 text-sm mb-8">Tim kami siap membantu Anda kapan saja.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $contacts = [
                    [
                        'title' => 'Email Support',
                        'sub' => 'support@example.com',
                        'color' => 'blue',
                        'icon' => '<path stroke-width="2" d="M16 12H8m0 0v8m0-8V4m8 8H8" />',
                    ],
                    [
                        'title' => 'WhatsApp',
                        'sub' => '+62 812-3456-7890',
                        'color' => 'emerald',
                        'icon' => '<path stroke-width="2" d="M22 12l-4 4m0 0l-4-4m4 4V4" />',
                    ],
                    [
                        'title' => 'Live Chat',
                        'sub' => 'Segera hadir',
                        'color' => 'violet',
                        'icon' => '<path stroke-width="2" d="M18 8a6 6 0 11-12 0" />',
                    ],
                ];
            @endphp

            @foreach ($contacts as $c)
                <div
                    class="p-6 rounded-2xl border border-white/10 bg-white/[0.02] hover:bg-white/[0.06]
                    shadow-md hover:shadow-xl hover:-translate-y-1 transition flex items-center gap-4">

                    <div
                        class="p-3 rounded-xl bg-{{ $c['color'] }}-500/10 border border-{{ $c['color'] }}-500/20 text-{{ $c['color'] }}-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor">{!! $c['icon'] !!}</svg>
                    </div>

                    <div>
                        <p class="text-slate-100 font-semibold">{{ $c['title'] }}</p>
                        <p class="text-slate-400 text-xs">{{ $c['sub'] }}</p>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

@endsection
