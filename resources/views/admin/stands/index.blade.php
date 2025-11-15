@extends('layouts.admin')

@section('title', 'Daftar Stand')

@section('content')

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Daftar Stand</h2>
            <p class="text-sm text-gray-500 mt-1">
                Kelola seluruh stand bazaar dan pantau status ketersediaannya.
            </p>
        </div>

        <a href="{{ route('admin.stands.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Stand
        </a>
    </div>


    {{-- FILTER BAR --}}
    <div class="mt-6 flex items-center justify-between gap-4">

        {{-- Search --}}
        <form method="GET" class="flex-1">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full bg-white border border-gray-300 rounded-xl py-2.5 pl-10 pr-4 text-sm shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500"
                    placeholder="Cari nomor stand, lokasi, atau ukuran...">

                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </form>

        {{-- Filter --}}
        <div class="flex gap-2">
            <a href="?status="
                class="px-4 py-2 rounded-xl text-sm font-medium border {{ request('status') == '' ? 'bg-gray-900 text-white' : 'bg-white text-gray-700 border-gray-300' }} hover:bg-gray-100">
                Semua
            </a>

            <a href="?status=available"
                class="px-4 py-2 rounded-xl text-sm font-medium border {{ request('status') == 'available' ? 'bg-green-600 text-white' : 'bg-white text-gray-700 border-gray-300' }} hover:bg-gray-100">
                Available
            </a>

            <a href="?status=booked"
                class="px-4 py-2 rounded-xl text-sm font-medium border {{ request('status') == 'booked' ? 'bg-red-600 text-white' : 'bg-white text-gray-700 border-gray-300' }} hover:bg-gray-100">
                Booked
            </a>
        </div>
    </div>


    {{-- TABLE WRAPPER --}}
    <div class="bg-white mt-6 border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 font-semibold text-gray-900">Nomor Stand</th>
                    <th class="px-6 py-3 font-semibold text-gray-900">Lokasi</th>
                    <th class="px-6 py-3 font-semibold text-gray-900">Ukuran</th>
                    <th class="px-6 py-3 font-semibold text-gray-900">Harga</th>
                    <th class="px-6 py-3 font-semibold text-gray-900">Status</th>
                    <th class="px-6 py-3 font-semibold text-gray-900 text-center">Aksi</th>
                </tr>

            <tbody class="divide-y divide-gray-100">



                @foreach ($stands as $s)
                    <tr class="hover:bg-blue-50/40 transition">

                        <td class="px-6 py-4 font-medium text-gray-900">{{ $s->nomor_stand }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $s->lokasi }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $s->ukuran }}</td>

                        <td class="px-6 py-4 font-semibold text-gray-900">
                            Rp {{ number_format($s->harga) }}
                        </td>

                        <td class="px-6 py-4">
                            @php
                                $map = [
                                    'available' => ['bg-green-100', 'text-green-700', 'Available'],
                                    'booked' => ['bg-red-100', 'text-red-700', 'Booked'],
                                    'occupied' => ['bg-gray-100', 'text-gray-700', 'Occupied'],
                                    'maintenance' => ['bg-gray-200', 'text-gray-700', 'Maintenance'],
                                ];

                                $style = $map[$s->status] ?? ['bg-gray-100', 'text-gray-700', ucfirst($s->status)];
                            @endphp

                            <span
                                class="px-3 py-1 rounded-full text-xs font-semibold {{ $style[0] }} {{ $style[1] }}">
                                {{ $style[2] }}
                            </span>
                        </td>


                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">

                                {{-- BOOKING (icon only) --}}
                                <a href="{{ route('admin.stands.bookings', $s->id) }}"
                                    class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-100 text-blue-700 shadow-sm hover:bg-blue-200 transition"
                                    title="Lihat Booking Stand">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('admin.stands.edit', $s->id) }}"
                                    class="flex items-center justify-center w-10 h-10 rounded-lg bg-yellow-100 text-yellow-700 shadow-sm hover:bg-yellow-200 transition"
                                    title="Edit Stand">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5h2M12 4v2m-2.121 7.879l2 2L18 7.758l-2-2L9.879 11.879z" />
                                    </svg>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('admin.stands.destroy', $s->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus stand ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="flex items-center justify-center w-10 h-10 rounded-lg bg-red-100 text-red-600 shadow-sm hover:bg-red-200 transition"
                                        title="Hapus Stand">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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

    {{-- PAGINATION --}}
    <div class="mt-6">
        {{ $stands->links() }}
    </div>

@endsection
