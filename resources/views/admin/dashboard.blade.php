@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

    <div class="space-y-12">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2
                    class="text-4xl pt-3 font-extrabold tracking-tight bg-gradient-to-r from-slate-100 to-slate-400 bg-clip-text text-transparent">
                    Dashboard
                </h2>
                <p class="text-sm text-slate-500 mt-1 tracking-wide">
                    Sistem berjalan dalam mode high-performance
                </p>
            </div>

            <div class="flex items-center gap-3">
                <span
                    class="inline-flex items-center rounded-full bg-emerald-900/30 px-4 py-1.5 text-xs font-semibold text-emerald-300 border border-emerald-700/40 backdrop-blur-md shadow-[0_0_12px_rgba(16,185,129,0.25)]">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                    Sistem Aktif
                </span>

                <span class="text-xs text-slate-500 tracking-wider">
                    {{ now()->format('d M Y, H:i') }}
                </span>
            </div>
        </div>


        <!-- STAT CARDS -->
        <div class="grid md:grid-cols-3 gap-8">

            <!-- CARD TEMPLATE -->
            @php
                $cards = [
                    ['title' => 'Total Stand', 'value' => $totalStands, 'color' => 'blue'],
                    ['title' => 'Stand Terboking', 'value' => $booked, 'color' => 'violet'],
                    ['title' => 'Vendor Terdaftar', 'value' => $vendors, 'color' => 'amber'],
                ];
            @endphp

            @foreach ($cards as $c)
                <div
                    class="
            relative overflow-hidden
            rounded-3xl border border-white/5 
            bg-white/[0.03]
            backdrop-blur-xl 
            shadow-[inset_0_0_0_1px_rgba(255,255,255,0.06),0_0_40px_-10px_rgba(0,0,0,0.6)]
            group transition-all duration-500
            hover:shadow-[inset_0_0_0_1px_rgba(255,255,255,0.08),0_0_60px_-6px_rgba(0,0,0,0.9)]
            hover:scale-[1.015]
        ">
                    <!-- Aura Glow -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-700"
                        style="
                    background:
                        radial-gradient(circle at top right,
                        rgba({{ $c['color'] === 'blue' ? '56,189,248' : ($c['color'] === 'violet' ? '167,139,250' : '251,191,36') }},0.18),
                        transparent 70%);
                ">
                    </div>

                    <div class="relative p-8">
                        <!-- ICON -->
                        <div
                            class="h-14 w-14 rounded-2xl flex items-center justify-center mb-6
                                bg-{{ $c['color'] }}-500/10 border border-{{ $c['color'] }}-500/20 text-{{ $c['color'] }}-300
                                shadow-[0_0_15px_rgba(255,255,255,0.03)]">
                            @if ($c['title'] === 'Total Stand')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5" />
                                </svg>
                            @elseif ($c['title'] === 'Stand Terboking')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5" />
                                </svg>
                            @else
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M17 20v-2a4 4 0 00-3-3.87M7 20v-2a4 4 0 013-3.87" />
                                        <path d="M7 10a4 4 0 108 0 4 4 0 00-8 0z" />
                                    </svg>

                                </svg>
                            @endif
                        </div>

                        <p class="text-sm text-slate-500 tracking-wide">{{ $c['title'] }}</p>

                        <h3 class="text-5xl font-extrabold text-slate-100 tracking-tight mt-1 drop-shadow-md">
                            {{ $c['value'] }}
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>



        <!-- GRAPH + ACTIVITY -->
        <div class="grid lg:grid-cols-3 gap-10">

            <!-- GRAPH -->
            <div
                class="lg:col-span-2 p-8 rounded-3xl border border-white/5 bg-white/[0.03] backdrop-blur-xl
            shadow-[inset_0_0_0_1px_rgba(255,255,255,0.05),0_0_35px_-10px_rgba(0,0,0,0.8)]
        ">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-semibold text-slate-100">Statistik Mingguan</h3>
                        <p class="text-xs text-slate-500">Perkembangan booking</p>
                    </div>

                    <div class="flex gap-2">
                        <button class="px-3 py-1.5 text-xs font-medium text-slate-200 bg-slate-700/40 rounded-md">
                            7 Hari
                        </button>

                        <button
                            class="px-3 py-1.5 text-xs text-slate-400 hover:text-slate-200 hover:bg-slate-700/30 rounded-md">
                            30 Hari
                        </button>
                    </div>
                </div>

                <div class="h-72 rounded-2xl bg-black/20 border border-white/10 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-slate-600 mb-3" fill="none" stroke="currentColor">
                            <path stroke-width="2" d="M9 19v-6a2 2..." />
                        </svg>
                        <p class="text-sm text-slate-300">Grafik Chart</p>
                        <p class="text-xs text-slate-500">Integrasi siap</p>
                    </div>
                </div>
            </div>

            <!-- ACTIVITY LOG -->
            <div
                class="p-8 rounded-3xl border border-white/5 bg-white/[0.03] backdrop-blur-xl
            shadow-[inset_0_0_0_1px_rgba(255,255,255,0.05),0_0_30px_-10px_rgba(0,0,0,0.8)]
        ">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-slate-100">Aktivitas Terbaru</h3>
                    <span class="h-2 w-2 rounded-full bg-blue-400 animate-pulse"></span>
                </div>

                <div class="space-y-6">

                    <!-- ACTIVITY ITEM -->
                    @php
                        $rows = [
                            ['color' => 'blue', 'vendor' => 'Kopi Seduh', 'time' => '2 menit lalu'],
                            ['color' => 'violet', 'vendor' => 'Admin menambahkan stand', 'time' => '15 menit lalu'],
                            [
                                'color' => 'green',
                                'vendor' => 'Pembayaran #INV-004 diverifikasi',
                                'time' => '1 jam lalu',
                            ],
                            ['color' => 'amber', 'vendor' => 'Vendor Bakso Mas Eko pending', 'time' => '3 jam lalu'],
                        ];
                    @endphp

                    @foreach ($rows as $r)
                        <div class="flex gap-4">
                            <div
                                class="h-10 w-10 rounded-xl flex items-center justify-center
                        bg-{{ $r['color'] }}-500/10 border border-{{ $r['color'] }}-500/20 text-{{ $r['color'] }}-300
                        shadow-[0_0_12px_rgba(255,255,255,0.03)]
                    ">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor">
                                    <path stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>

                            <div>
                                <p class="text-sm text-slate-100">{{ $r['vendor'] }}</p>
                                <p class="text-xs text-slate-500">{{ $r['time'] }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <button
                    class="mt-8 w-full py-3 text-sm font-medium text-slate-200 rounded-xl
                bg-white/10 hover:bg-white/20 border border-white/10 transition-all duration-300">
                    Lihat Semua Aktivitas
                </button>
            </div>

        </div>

    </div>




@endsection
