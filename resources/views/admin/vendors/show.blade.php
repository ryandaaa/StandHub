@extends('layouts.admin')

@section('title', 'Detail Vendor')

@section('content')

    <div class="space-y-4">

        {{-- HEADER --}}
        <div>
            <h2
                class="text-4xl font-extrabold tracking-tight 
                   bg-gradient-to-r from-slate-100 to-slate-400 
                   bg-clip-text text-transparent">
                Detail Vendor
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Informasi lengkap vendor & riwayat aktivitas booking.
            </p>
        </div>


        {{-- CARD: INFO VENDOR --}}
        <div
            class="p-8 rounded-3xl border border-white/10 bg-white/[0.03] backdrop-blur-xl
               shadow-[inset_0_0_0_1px_rgba(255,255,255,0.05),0_0_45px_-15px_rgba(0,0,0,0.6)]">

            <div class="flex items-center gap-5 mb-4">

                <div
                    class="h-16 w-16 rounded-2xl flex items-center justify-center
                       bg-blue-500/10 border border-blue-400/20 
                       text-blue-300 text-2xl font-bold
                       shadow-inner backdrop-blur">
                    {{ strtoupper(substr($vendor->name, 0, 1)) }}
                </div>

                <div>
                    <h3 class="text-2xl font-semibold text-slate-100">{{ $vendor->name }}</h3>
                    <p class="text-slate-400 text-sm">Vendor ID: {{ $vendor->id }}</p>
                </div>

            </div>

            <div class="grid md:grid-cols-2 gap-4">

                <div>
                    <p class="text-slate-500 text-sm">Email</p>
                    <p class="font-semibold text-slate-100 text-lg">{{ $vendor->email }}</p>
                </div>

                <div>
                    <p class="text-slate-500 text-sm">Tanggal Bergabung</p>
                    <p class="font-semibold text-slate-100 text-lg">
                        {{ $vendor->created_at->format('d M Y') }}
                    </p>
                </div>

                <div>
                    <p class="text-slate-500 text-sm mb-2">Total Booking</p>
                    <span
                        class="inline-block px-4 py-1.5 text-xs font-semibold 
                           rounded-full bg-blue-600/20 text-blue-200 
                           border border-blue-500/30 backdrop-blur
                           shadow-[0_0_10px_rgba(59,130,246,0.2)]">
                        {{ $vendor->bookings->count() }} Booking
                    </span>
                </div>

            </div>

        </div>


        {{-- CARD: RIWAYAT BOOKING --}}
        <div
            class="p-8 rounded-3xl border border-white/10 bg-white/[0.03] backdrop-blur-xl
               shadow-[inset_0_0_0_1px_rgba(255,255,255,0.05),0_0_45px_-15px_rgba(0,0,0,0.6)]">

            <h3 class="text-xl font-semibold text-slate-100 mb-6 flex items-center gap-2">
                Riwayat Booking
            </h3>

            @if ($vendor->bookings->count() == 0)

                <p class="text-slate-500 text-sm italic">Vendor ini belum pernah melakukan booking.</p>
            @else
                <div class="overflow-hidden rounded-2xl border border-white/10">
                    <table class="w-full text-sm text-slate-300">
                        <thead
                            class="bg-white/[0.04] text-slate-400 text-xs uppercase tracking-wide border-b border-white/10">
                            <tr>
                                <th class="px-5 py-3 text-left">Stand</th>
                                <th class="px-5 py-3 text-left">Nama Usaha</th>
                                <th class="px-5 py-3 text-left">Jenis Usaha</th>
                                <th class="px-5 py-3 text-left">Kontak</th>
                                <th class="px-5 py-3 text-left">Status</th>
                                <th class="px-5 py-3 text-left">Tanggal</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-white/5">

                            @foreach ($vendor->bookings as $b)
                                <tr class="hover:bg-white/[0.03] transition">

                                    <td class="px-5 py-3">
                                        <span class="font-semibold text-slate-100">
                                            {{ $b->stand->nomor_stand }}
                                        </span>
                                    </td>

                                    <td class="px-5 py-3">{{ $b->nama_usaha }}</td>
                                    <td class="px-5 py-3">{{ $b->jenis_usaha }}</td>
                                    <td class="px-5 py-3">{{ $b->kontak }}</td>

                                    <td class="px-5 py-3">
                                        @php
                                            $map = [
                                                'pending' => [
                                                    'bg-yellow-600/20',
                                                    'border-yellow-500/30',
                                                    'text-yellow-200',
                                                ],
                                                'approved' => [
                                                    'bg-green-600/20',
                                                    'border-green-500/30',
                                                    'text-green-200',
                                                ],
                                                'rejected' => ['bg-red-600/20', 'border-red-500/30', 'text-red-200'],
                                            ];
                                        @endphp


                                        <span
                                            class="px-3 py-1.5 rounded-full text-xs font-semibold backdrop-blur
                                                {{ $map[$b->status][0] }}
                                                {{ $map[$b->status][1] }}
                                                {{ $map[$b->status][2] }}">
                                            {{ ucfirst($b->status) }}
                                        </span>

                                    </td>

                                    <td class="px-5 py-3 text-slate-300">
                                        {{ $b->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>

            @endif
        </div>

    </div>

@endsection
