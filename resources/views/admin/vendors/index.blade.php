@extends('layouts.admin')

@section('title', 'Daftar Vendor')

@section('content')

    <h2 class="text-3xl font-bold text-gray-900 mb-6">Daftar Vendor</h2>

    {{-- ALERT --}}
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    @if ($vendors->count() == 0)

        <div class="bg-white p-10 rounded-xl shadow text-center text-gray-500">
            Belum ada vendor terdaftar.
        </div>
    @else
        <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="p-4 text-left">Vendor</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Tanggal Daftar</th>
                        <th class="p-4 text-left">Total Booking</th>
                        <th class="p-4 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @foreach ($vendors as $v)
                        <tr class="hover:bg-gray-50 transition">

                            {{-- VENDOR + AVATAR --}}
                            <td class="p-4 flex items-center gap-3">
                                <div
                                    class="h-10 w-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold shadow">
                                    {{ strtoupper(substr($v->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="font-semibold text-gray-900">{{ $v->name }}</p>
                                    <p class="text-xs text-gray-500">ID: {{ $v->id }}</p>
                                </div>
                            </td>

                            {{-- EMAIL --}}
                            <td class="p-4">
                                <span class="text-gray-700">{{ $v->email }}</span>
                            </td>

                            {{-- CREATED --}}
                            <td class="p-4">
                                <span class="text-gray-700">
                                    {{ $v->created_at->format('d M Y') }}
                                </span>
                            </td>

                            {{-- BOOKING COUNT --}}
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">
                                    {{ $v->bookings->count() }} Booking
                                </span>
                            </td>

                            {{-- ACTION --}}
                            <td class="p-4">

                                <div class="flex items-center gap-2">

                                    {{-- DETAIL --}}
                                    <a href="{{ route('admin.vendors.show', $v->id) }}"
                                        class="px-3 py-1.5 rounded-lg bg-blue-600 text-white text-xs font-medium hover:bg-blue-700 transition">
                                        Detail
                                    </a>

                                    {{-- HAPUS --}}
                                    <form action="{{ route('admin.vendors.destroy', $v->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus vendor ini? Semua data booking vendor juga akan hilang!');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="px-3 py-1.5 rounded-lg bg-red-600 text-white text-xs font-medium hover:bg-red-700 transition">
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

        <div class="mt-4">
            {{ $vendors->links() }}
        </div>

    @endif

@endsection
@section('scripts')
