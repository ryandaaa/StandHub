@extends('layouts.admin')

@section('title', 'Daftar Stand')

@section('content')

    <div class="space-y-10">

        {{-- HEADER SECTION --}}
        <div class="flex flex-col gap-6 mb-8">

            {{-- Top Row: Title + Add Button --}}
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-4xl font-extrabold tracking-tight text-slate-100">Daftar Stand</h2>
                    <p class="text-sm text-slate-400 mt-1">
                        Kelola seluruh stand bazaar dan pantau status ketersediaannya.
                    </p>
                </div>

                <a href="{{ route('admin.stands.create') }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600/80 hover:bg-blue-600 text-white 
                   rounded-xl shadow-lg shadow-blue-900/40 
                   transition-all duration-300 backdrop-blur border border-white/10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Stand
                </a>
            </div>

            {{-- Search + Filter Row --}}
            <div class="flex items-center justify-between gap-4">

                {{-- Search --}}
                <form method="GET" class="flex-1">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-full bg-white/5 border border-white/10 text-slate-200 
                           rounded-xl py-3 pl-11 text-sm shadow-inner 
                           focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50
                           placeholder-slate-500 backdrop-blur"
                            placeholder="Cari nomor stand, lokasi, atau ukuran...">

                    </div>
                </form>

                {{-- Filter --}}
                <div class="flex shrink-0 gap-2">

                    @php
                        $filter = request('status');
                        $pills = [
                            ['name' => '', 'label' => 'Semua', 'color' => 'slate'],
                            ['name' => 'available', 'label' => 'Available', 'color' => 'emerald'],
                            ['name' => 'booked', 'label' => 'Booked', 'color' => 'rose'],
                        ];
                    @endphp

                    @foreach ($pills as $p)
                        @php
                            $active = $filter === $p['name'] || ($p['name'] === '' && $filter === null);
                        @endphp

                        <a href="?status={{ $p['name'] }}"
                            class="px-4 py-2 rounded-xl text-sm font-medium border transition-all duration-300
                           backdrop-blur
                           {{ $active
                               ? 'bg-' .
                                   $p['color'] .
                                   '-600/20 text-' .
                                   $p['color'] .
                                   '-200 border-' .
                                   $p['color'] .
                                   '-400/30 shadow-[0_0_12px_rgba(0,0,0,0.6)]'
                               : 'bg-white/5 text-slate-300 border-white/10 hover:bg-white/10 hover:border-white/20' }}">
                            {{ $p['label'] }}
                        </a>
                    @endforeach

                </div>

            </div>
        </div>


        <!-- TABLE WRAPPER -->
        <div
            class="rounded-3xl overflow-hidden border border-white/10
        bg-white/[0.03] backdrop-blur-xl
        shadow-[inset_0_0_0_1px_rgba(255,255,255,0.05),0_0_40px_-10px_rgba(0,0,0,0.8)]">

            <table class="w-full text-sm">
                <thead class="bg-white/5 border-b border-white/10 text-slate-300">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Nomor Stand</th>
                        <th class="px-6 py-4 font-semibold">Lokasi</th>
                        <th class="px-6 py-4 font-semibold">Ukuran</th>
                        <th class="px-6 py-4 font-semibold">Harga</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/5 text-slate-200">

                    @foreach ($stands as $s)
                        <tr class="hover:bg-white/5 transition-all duration-200">

                            <td class="px-6 py-4 font-medium">{{ $s->nomor_stand }}</td>
                            <td class="px-6 py-4 text-slate-400">{{ $s->lokasi }}</td>
                            <td class="px-6 py-4 text-slate-400">{{ $s->ukuran }}</td>

                            <td class="px-6 py-4 font-semibold text-slate-100">
                                Rp {{ number_format($s->harga) }}
                            </td>

                            <td class="px-6 py-4">
                                @php
                                    $status = [
                                        'available' => ['green', 'Available'],
                                        'booked' => ['red', 'Booked'],
                                        'occupied' => ['slate', 'Occupied'],
                                        'maintenance' => ['yellow', 'Maintenance'],
                                    ][$s->status] ?? ['slate', ucfirst($s->status)];
                                @endphp

                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold
                            bg-{{ $status[0] }}-600/20 text-{{ $status[0] }}-300 border border-{{ $status[0] }}-500/20
                            shadow-[0_0_15px_rgba(0,0,0,0.2)] backdrop-blur">
                                    {{ $status[1] }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">

                                    <!-- BOOKING -->
                                    <a href="{{ route('admin.stands.bookings', $s->id) }}" class="glass-btn blue">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M5 13l4 4L19 7" />
                                        </svg>
                                    </a>

                                    <!-- EDIT -->
                                    <a href="{{ route('admin.stands.edit', $s->id) }}" class="glass-btn yellow">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M11 5h2M12 4v2m-2.121 7.879l2 2L18 7.758l-2-2L9.879 11.879z" />
                                        </svg>
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('admin.stands.destroy', $s->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus stand ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="glass-btn red">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2">
                                                <path
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3H4m16 0H4" />
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>


        <!-- PAGINATION -->
        <div class="mt-8 text-slate-400">
            {{ $stands->links() }}
        </div>

    </div>



    {{-- GLOBAL BUTTON STYLES --}}
    <style>
        .glass-btn {
            @apply flex items-center justify-center w-10 h-10 rounded-xl bg-white/5 border border-white/10 text-slate-200 shadow-[0_0_15px_rgba(0, 0, 0, 0.3)] hover:bg-white/10 hover:scale-105 hover:shadow-[0_0_25px_rgba(0, 0, 0, 0.5)] backdrop-blur-xl transition;
        }

        .glass-btn.blue {
            @apply text-blue-300 border-blue-500/20 bg-blue-500/10;
        }

        .glass-btn.yellow {
            @apply text-yellow-300 border-yellow-500/20 bg-yellow-500/10;
        }

        .glass-btn.red {
            @apply text-red-300 border-red-500/20 bg-red-500/10;
        }
    </style>

@endsection
