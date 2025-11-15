@extends('layouts.vendor')
@section('title', 'Detail Booking')

@section('content')

    <h2 class="text-2xl font-semibold mb-4">Detail Booking</h2>

    <div class="bg-white p-4 rounded shadow space-y-2">
        <p>Stand: <strong>{{ $booking->stand->nama_stand }}</strong></p>
        <p>Status: <strong>{{ $booking->status }}</strong></p>
    </div>

@endsection
