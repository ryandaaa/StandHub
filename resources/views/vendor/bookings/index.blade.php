@extends('layouts.vendor')

@section('title', 'Booking Saya')

@section('content')

    <div class="mb-10">
        <h1 class="text-3xl font-extrabold text-slate-100">Booking Saya</h1>
        <p class="text-slate-400 mt-1">Kelola semua pengajuan booking stand Anda.</p>
    </div>

    {{-- Success Alert --}}
    @if (session('success'))
        <div
            class="mb-6 bg-blue-900/30 border border-blue-700/40 backdrop-blur-xl 
               text-blue-200 px-4 py-3 rounded-lg flex items-center gap-3 
               shadow-[0_0_20px_-6px_rgba(59,130,246,0.5)]">

            <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif


    {{-- Empty State --}}
    @if ($bookings->count() == 0)

        <div
            class="bg-slate-900/60 border border-white/10 backdrop-blur-xl p-14 rounded-xl text-center
               shadow-[0_0_30px_-12px_rgba(0,0,0,0.7)]">

            <div
                class="w-20 h-20 bg-slate-800/40 border border-white/10 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>

            <h3 class="text-lg font-bold text-slate-100 mb-1">Belum Ada Booking</h3>
            <p class="text-slate-400 mb-6 text-sm">Mulailah booking stand untuk usaha Anda.</p>

            <a href="{{ route('vendor.stands.index') }}"
                class="inline-flex items-center px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 
                   text-white text-sm font-semibold transition shadow-[0_0_15px_-4px_rgba(59,130,246,0.6)]">

                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>

                Lihat Stand Tersedia
            </a>
        </div>
    @else
        <div class="space-y-5">

            @foreach ($bookings as $b)
                <div
                    class="bg-slate-900/50 backdrop-blur-xl border border-white/10 p-6 rounded-xl
                       hover:shadow-[0_0_25px_-10px_rgba(255,255,255,0.15)]
                       transition">

                    {{-- Header --}}
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-2xl font-semibold text-slate-100">
                                Stand {{ $b->stand->nomor_stand }}
                            </h3>
                            <p class="text-slate-400 text-sm mt-1">
                                Booking: {{ $b->created_at->format('d M Y') }}
                            </p>
                        </div>

                        {{-- Status --}}
                        <span
                            class="
                        px-3 py-1 text-xs font-bold rounded-full border
                        @if ($b->status == 'pending') bg-amber-500/20 text-amber-300 border-amber-500/30
                        @elseif ($b->status == 'approved')
                            bg-blue-500/20 text-blue-300 border-blue-500/30
                        @elseif ($b->status == 'rejected')
                            bg-red-500/20 text-red-300 border-red-500/30 @endif
                    ">
                            {{ ucfirst($b->status) }}
                        </span>
                    </div>

                    {{-- Details --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5 text-sm">

                        <div>
                            <p class="text-slate-400">Nama Usaha</p>
                            <p class="font-semibold text-slate-100">{{ $b->nama_usaha }}</p>
                        </div>

                        <div>
                            <p class="text-slate-400">Jenis Usaha</p>
                            <p class="font-semibold text-slate-100">{{ $b->jenis_usaha }}</p>
                        </div>

                        <div>
                            <p class="text-slate-400">Kontak</p>
                            <p class="font-semibold text-slate-100">{{ $b->kontak }}</p>
                        </div>

                    </div>

                    {{-- Status Notif --}}
                    @if ($b->status == 'pending' && !$b->bukti_pembayaran)
                        <div
                            class="bg-amber-500/10 border border-amber-600/30 text-amber-200 text-sm px-4 py-3 rounded-lg mt-5">
                            Silakan upload bukti pembayaran untuk memproses booking Anda.
                        </div>
                    @endif

                    @if ($b->status == 'approved')
                        <div
                            class="bg-blue-500/10 border border-blue-600/30 text-blue-200 text-sm px-4 py-3 rounded-lg mt-5">
                            Booking telah disetujui! Anda dapat mulai mempersiapkan stand Anda.
                        </div>
                    @endif

                    @if ($b->status == 'rejected' && $b->catatan_admin)
                        <div class="bg-red-500/10 border border-red-600/30 text-red-300 text-sm px-4 py-3 rounded-lg mt-5">
                            <strong>Alasan ditolak:</strong> {{ $b->catatan_admin }}
                        </div>
                    @endif

                    {{-- Actions --}}
                    <div class="flex items-center gap-3 mt-6 pt-4 border-t border-white/10">

                        @if ($b->status == 'pending' && !$b->bukti_pembayaran)
                            <a href="{{ route('vendor.bookings.uploadForm', $b->id) }}"
                                class="px-5 py-3 bg-blue-600 text-white rounded-lg text-sm font-medium
                                   hover:bg-blue-500 transition flex items-center gap-2
                                   shadow-[0_0_15px_-4px_rgba(59,130,246,0.6)]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                Upload Bukti Pembayaran
                            </a>
                        @endif

                        @if ($b->status == 'pending')
                            <form action="{{ route('vendor.bookings.destroy', $b->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin membatalkan booking ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-5 py-3 bg-red-500/20 text-red-300 border border-red-600/30
                                       rounded-lg text-sm font-medium hover:bg-red-500/30 transition">
                                    Batalkan
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('vendor.bookings.show', $b->id) }}"
                            class="px-5 py-3 bg-slate-800 text-white rounded-lg text-sm font-medium hover:bg-slate-700 transition ml-auto">
                            Detail
                        </a>

                    </div>

                </div>
            @endforeach

        </div>

        <div class="mt-8">
            {{ $bookings->links() }}
        </div>

    @endif

@endsection
