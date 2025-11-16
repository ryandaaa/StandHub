@extends('layouts.wrapper')
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
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
                ],
                [
                    'title' => 'Status Booking',
                    'desc' => 'Penjelasan lengkap arti Pending, Approved, Rejected, dan tindakan selanjutnya.',
                    'color' => 'emerald',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
                ],
                [
                    'title' => 'Waktu Respon',
                    'desc' => 'Estimasi durasi proses verifikasi admin dan alur notifikasi otomatis.',
                    'color' => 'violet',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />',
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
                        <svg class="w-5 h-5 text-slate-400 transition-transform" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
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
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />',
                    ],
                    [
                        'title' => 'WhatsApp',
                        'sub' => '+62 812-3456-7890',
                        'color' => 'emerald',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />',
                    ],
                    [
                        'title' => 'Live Chat',
                        'sub' => 'Segera hadir',
                        'color' => 'violet',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />',
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
