@extends('layouts.admin')

@section('title', 'Booking untuk Stand ' . $stand->nomor_stand)

@section('content')

    <div class="mb-4">
        <h2 class="text-4xl font-extrabold tracking-tight text-slate-100">Booking Stand {{ $stand->nomor_stand }}</h2>
        <p class="text-slate-400 text-sm mt-1">
            Lihat seluruh pengajuan booking beserta status dan informasinya.
        </p>
    </div>

    <div class="space-y-6">

        @forelse ($bookings as $b)
            <div
                class="p-6 rounded-3xl border border-white/10 bg-white/[0.03] backdrop-blur-xl
                       shadow-[inset_0_0_0_1px_rgba(255,255,255,0.06),0_0_35px_-10px_rgba(0,0,0,0.9)]
                       hover:shadow-[inset_0_0_0_1px_rgba(255,255,255,0.1),0_0_50px_-10px_rgba(0,0,0,1)]
                       transition-all duration-500 group">

                <div class="flex justify-between items-start gap-6">

                    {{-- LEFT SECTION --}}
                    <div class="flex items-start gap-5">

                        {{-- ICON --}}
                        <div
                            class="h-14 w-14 rounded-2xl flex items-center justify-center
                                   bg-blue-500/10 border border-blue-500/20 text-blue-300
                                   shadow-[0_0_15px_rgba(0,0,0,0.4)] group-hover:scale-105 transition">

                            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                        </div>

                        {{-- TEXT --}}
                        <div>
                            <p class="text-xl font-semibold text-slate-100 tracking-wide">
                                {{ $b->vendor->name }}
                            </p>

                            <p class="text-sm text-slate-400">
                                {{ $b->created_at->diffForHumans() }}
                            </p>

                            {{-- STATUS --}}
                            <div class="mt-3">
                                @if ($b->status == 'pending')
                                    <span
                                        class="px-3 py-1.5 text-xs font-semibold rounded-full
                                               bg-amber-500/15 text-amber-300 border border-amber-500/25
                                               backdrop-blur shadow-[0_0_12px_rgba(251,191,36,0.25)]">
                                        Pending
                                    </span>
                                @elseif ($b->status == 'approved')
                                    <span
                                        class="px-3 py-1.5 text-xs font-semibold rounded-full
                                               bg-emerald-500/15 text-emerald-300 border border-emerald-500/25
                                               backdrop-blur shadow-[0_0_12px_rgba(16,185,129,0.25)]">
                                        Approved
                                    </span>
                                @else
                                    <span
                                        class="px-3 py-1.5 text-xs font-semibold rounded-full
                                               bg-rose-500/15 text-rose-300 border border-rose-500/25
                                               backdrop-blur shadow-[0_0_12px_rgba(244,63,94,0.25)]">
                                        Rejected
                                    </span>
                                @endif
                            </div>

                            {{-- ADMIN NOTES --}}
                            @if ($b->status == 'rejected' && $b->catatan_admin)
                                <p class="text-sm text-rose-300 mt-3">
                                    {{ $b->catatan_admin }}
                                </p>
                            @endif
                        </div>

                    </div>

                    {{-- RIGHT BUTTON --}}
                    <div>
                        <a href="{{ route('admin.bookings.show', $b) }}"
                            class="px-5 py-2.5 rounded-xl text-sm font-medium text-slate-200
                                   bg-blue-600/20 hover:bg-blue-600/30
                                   border border-blue-500/20 backdrop-blur
                                   shadow-[0_0_20px_rgba(59,130,246,0.25)]
                                   transition-all duration-300">
                            Detail
                        </a>
                    </div>

                </div>

            </div>

        @empty

            <p
                class="text-slate-400 text-center py-12 text-sm
                       bg-white/5 border border-white/10 rounded-3xl backdrop-blur">
                Belum ada booking untuk stand ini.
            </p>
        @endforelse

    </div>

@endsection
