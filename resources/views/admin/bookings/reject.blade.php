@extends('layouts.admin')

@section('title', 'Tolak Booking')

@section('content')

<h2 class="text-2xl font-semibold mb-6">Tolak Booking</h2>

<div class="bg-white p-6 rounded shadow">

    <p class="mb-4">
        Anda akan menolak booking dari vendor: 
        <strong>{{ $booking->vendor->name }}</strong> 
        untuk stand <strong>{{ $booking->stand->nomor_stand }}</strong>.
    </p>

    <form method="POST" action="{{ route('admin.bookings.reject', $booking->id) }}">
        @csrf
        <label class="block mb-2 text-gray-700">Alasan Penolakan</label>
        <textarea name="catatan_admin" rows="4"
                  class="w-full border rounded p-2"
                  required>{{ old('catatan_admin') }}</textarea>

        @error('catatan_admin')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <div class="mt-4 flex gap-3">
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">
                Tolak Booking
            </button>

            <a href="{{ route('admin.bookings.show', $booking->id) }}" 
               class="px-4 py-2 bg-gray-300 rounded">
               Batal
            </a>
        </div>
    </form>

</div>

@endsection
