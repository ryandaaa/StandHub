@extends('layouts.vendor')

@section('title', 'Booking Saya')

@section('content')

    {{-- Page Header --}}
    <div class="mb-10">
        <h1 class="text-3xl font-semibold text-gray-900">Booking Saya</h1>
        <p class="text-gray-500 mt-1">Kelola semua pengajuan booking stand Anda.</p>
    </div>

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="mb-6 bg-green-50 text-green-800 border border-green-200 px-4 py-3 rounded-lg flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Empty State --}}
    @if ($bookings->count() == 0)

        <div class="bg-white border border-gray-200 rounded-xl p-14 text-center">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>

            <h3 class="text-lg font-semibold text-gray-700 mb-1">Belum Ada Booking</h3>
            <p class="text-gray-500 mb-6 text-sm">Mulailah booking stand untuk usaha Anda.</p>

            <a href="{{ route('vendor.stands.index') }}"
                class="inline-flex items-center px-5 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Lihat Stand Tersedia
            </a>
        </div>
    @else
        {{-- Booking List --}}
        <div class="space-y-4">

            @foreach ($bookings as $b)
                <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition">

                    {{-- Header --}}
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">
                                Stand {{ $b->stand->nomor_stand }}
                            </h3>
                            <p class="text-gray-500 text-sm mt-1">
                                Booking: {{ $b->created_at->format('d M Y') }}
                            </p>
                        </div>

                        {{-- Status --}}
                        <span
                            class="px-3 py-1 text-xs font-medium rounded-full
                        @if ($b->status == 'pending') bg-amber-100 text-amber-800
                        @elseif ($b->status == 'approved') bg-green-100 text-green-800
                        @elseif ($b->status == 'rejected') bg-red-100 text-red-700 @endif">
                            {{ ucfirst($b->status) }}
                        </span>
                    </div>

                    {{-- Details --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5 text-sm">

                        <div>
                            <p class="text-gray-500">Nama Usaha</p>
                            <p class="font-medium text-gray-900">{{ $b->nama_usaha }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Jenis Usaha</p>
                            <p class="font-medium text-gray-900">{{ $b->jenis_usaha }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Kontak</p>
                            <p class="font-medium text-gray-900">{{ $b->kontak }}</p>
                        </div>
                    </div>

                    {{-- Notifikasi Status --}}
                    @if ($b->status == 'pending' && !$b->bukti_pembayaran)
                        <div class="bg-amber-50 border border-amber-200 text-amber-800 text-sm px-4 py-3 rounded-lg mt-5">
                            Silakan upload bukti pembayaran untuk memproses booking Anda.
                        </div>
                    @endif

                    @if ($b->status == 'approved')
                        <div class="bg-green-50 border border-green-200 text-green-800 text-sm px-4 py-3 rounded-lg mt-5">
                            Booking telah disetujui! Anda dapat mulai mempersiapkan stand Anda.
                        </div>
                    @endif

                    @if ($b->status == 'rejected' && $b->catatan_admin)
                        <div class="bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-lg mt-5">
                            <strong>Alasan ditolak:</strong> {{ $b->catatan_admin }}
                        </div>
                    @endif

                    {{-- Actions --}}
                    <div class="flex items-center gap-3 mt-6 pt-4 border-t border-gray-100">

                        @if ($b->status == 'pending' && !$b->bukti_pembayaran)
                            <a href="{{ route('vendor.bookings.uploadForm', $b->id) }}"
                                class="px-5 py-3 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition flex items-center gap-2">
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
                                    class="px-5 py-3 bg-red-100 text-red-700 rounded-lg text-sm font-medium hover:bg-red-200 transition">
                                    Batalkan
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('vendor.bookings.show', $b->id) }}"
                            class="px-5 py-3 bg-gray-800 text-white rounded-lg text-sm font-medium hover:bg-gray-900 transition ml-auto">
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
