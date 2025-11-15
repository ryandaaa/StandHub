@extends('layouts.vendor')
@section('title', 'Upload Bukti Pembayaran')

@section('content')

    <h2 class="text-2xl font-semibold mb-4">Upload Bukti Pembayaran</h2>

    <div class="bg-white p-4 rounded shadow">

        <p class="mb-4">
            Booking untuk stand <strong>{{ $booking->stand->nomor_stand }}</strong>
        </p>

        <form method="POST" action="{{ route('vendor.bookings.upload', $booking->id) }}" enctype="multipart/form-data">
            @csrf

            <label class="block mb-2 text-gray-700">Upload Bukti (JPG, PNG, PDF)</label>
            <input type="file" name="bukti" class="border p-2 rounded w-full" required>

            @error('bukti')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">
                Upload
            </button>
        </form>

    </div>

@endsection
@section('scripts')
