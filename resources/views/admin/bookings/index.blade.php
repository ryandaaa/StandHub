@extends('layouts.admin')

@section('title', 'Manajemen Booking')

@section('content')

    <div class="space-y-4">

        <!-- HEADER -->
        <div>
            <h2
                class="text-4xl font-extrabold tracking-tight bg-gradient-to-r from-slate-100 to-slate-400 
                   bg-clip-text text-transparent">
                Daftar Booking
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Pantau setiap pengajuan booking dan kelola status approval vendor.
            </p>
        </div>

        <!-- LIST WRAPPER -->
        <div class="space-y-6">

            @foreach ($bookings as $b)
                <div
                    class="p-7 rounded-3xl border border-white/5 bg-white/[0.035] backdrop-blur-xl
                       shadow-[inset_0_0_0_1px_rgba(255,255,255,0.05),0_0_35px_-12px_rgba(0,0,0,0.9)]
                       hover:shadow-[inset_0_0_0_1px_rgba(255,255,255,0.07),0_0_55px_-10px_rgba(0,0,0,1)]
                       hover:scale-[1.01] transition-all duration-500 group relative overflow-hidden">

                    <!-- subtle aura on hover -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-700"
                        style="background:
                        radial-gradient(circle at top right,
                        rgba(56,189,248,0.08), transparent 70%);">
                    </div>

                    <div class="relative flex items-center justify-between">

                        <!-- LEFT -->
                        <div class="flex items-start gap-5">

                            <!-- ICON -->
                            <div
                                class="h-14 w-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center
                                    shadow-[0_0_10px_rgba(255,255,255,0.05)] text-slate-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>

                            <!-- TEXT -->
                            <div class="space-y-1">
                                <p class="text-xl font-semibold text-slate-100 tracking-wide">
                                    {{ $b->vendor->name }}
                                </p>

                                <p class="text-sm text-slate-400">
                                    Stand:
                                    <span class="font-medium text-slate-200">
                                        {{ $b->stand->nomor_stand }}
                                    </span>
                                </p>

                                <!-- STATUS -->
                                <div class="mt-2">
                                    @if ($b->status == 'pending')
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-semibold
                                                 bg-yellow-500/10 text-yellow-300 border border-yellow-500/20
                                                 backdrop-blur-md">
                                            Pending
                                        </span>
                                    @elseif($b->status == 'approved')
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-semibold
                                                 bg-emerald-500/10 text-emerald-300 border border-emerald-500/20
                                                 backdrop-blur-md">
                                            Approved
                                        </span>
                                    @elseif($b->status == 'rejected')
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-semibold
                                                 bg-red-500/10 text-red-300 border border-red-500/20
                                                 backdrop-blur-md">
                                            Rejected
                                        </span>
                                    @endif
                                </div>

                                {{-- Catatan admin --}}
                                @if ($b->status == 'rejected' && $b->catatan_admin)
                                    <p class="text-red-400 text-sm mt-2 italic">
                                        Catatan: {{ $b->catatan_admin }}
                                    </p>
                                @endif
                            </div>

                        </div>

                        <!-- RIGHT -->
                        <div class="flex flex-col items-end">

                            <!-- DETAIL BUTTON -->
                            <a href="{{ route('admin.bookings.show', $b) }}"
                                class="px-5 py-2.5 rounded-xl text-sm font-semibold
                                   bg-white/10 text-slate-200 border border-white/10
                                   hover:bg-white/20 hover:border-white/20
                                   shadow-[0_0_12px_rgba(255,255,255,0.05)]
                                   transition-all duration-300 backdrop-blur-md flex items-center gap-2">

                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm3 0a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>

                                Detail
                            </a>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

@endsection
