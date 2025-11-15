@extends('layouts.vendor')
@section('title', 'Booking Stand')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Booking Stand</h2>

    <div class="bg-white p-4 rounded shadow">
        <p class="mb-4">Stand: <strong>{{ $stand->nomor_stand }}</strong></p>

        <form method="POST" action="{{ route('vendor.bookings.store') }}">
            @csrf

            <input type="hidden" name="stand_id" value="{{ $stand->id }}">

            <div class="mb-4">
                <label class="block mb-1">Nama Usaha</label>
                <input type="text" name="nama_usaha" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Jenis Usaha</label>
                <input type="text" name="jenis_usaha" class="border p-2 w-full" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Kontak</label>
                <input type="text" name="kontak" class="border p-2 w-full" required>
            </div>

            <button class="px-4 py-2 bg-green-600 text-white rounded">Konfirmasi Booking</button>
        </form>
    </div>
@endsection
