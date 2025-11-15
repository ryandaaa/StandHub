@extends('layouts.admin')

@section('title', 'Edit Stand')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-semibold text-gray-900 flex items-center gap-3">
            Edit Stand
        </h2>
    </div>

    <form method="POST" action="{{ route('admin.stands.update', $stand->id) }}"
        class="bg-white p-6 rounded-xl shadow-md space-y-6 border border-gray-100">
        @csrf
        @method('PUT')

        {{-- NOMOR STAND --}}
        <div class="space-y-1">
            <label class="text-sm font-medium text-gray-700">Nomor Stand</label>
            <input type="text" name="nomor_stand" value="{{ $stand->nomor_stand }}"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Contoh: R-12">
        </div>

        {{-- LOKASI --}}
        <div class="space-y-1">
            <label class="text-sm font-medium text-gray-700">Lokasi</label>
            <input type="text" name="lokasi" value="{{ $stand->lokasi }}"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Dekat Panggung, Hall A, dll">
        </div>

        {{-- UKURAN --}}
        <div class="space-y-1">
            <label class="text-sm font-medium text-gray-700">Ukuran (m)</label>
            <input type="text" name="ukuran" value="{{ $stand->ukuran }}"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Contoh: 3x3 atau 10">
        </div>

        {{-- HARGA --}}
        <div class="space-y-1">
            <label class="text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="harga" value="{{ $stand->harga }}"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Contoh: 150000 atau 1000000">
        </div>

        {{-- FASILITAS --}}
        <div class="space-y-1">
            <label class="text-sm font-medium text-gray-700">Fasilitas</label>
            <textarea name="fasilitas" rows="4"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Contoh: Meja, Kursi, Listrik, Tenda...">{{ $stand->fasilitas }}</textarea>
        </div>

        {{-- STATUS --}}
        <div class="space-y-1">
            <label class="text-sm font-medium text-gray-700">Status</label>
            <select name="status" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                <option value="available" {{ $stand->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="booked" {{ $stand->status == 'booked' ? 'selected' : '' }}>Booked</option>
                <option value="occupied" {{ $stand->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                <option value="maintenance" {{ $stand->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>

        {{-- ACTION BUTTON --}}
        <div class="pt-4">
            <button class="px-6 py-2.5 bg-yellow-600 text-white rounded-lg shadow hover:bg-yellow-700 transition">
                Perbarui Stand
            </button>
        </div>

    </form>

@endsection
