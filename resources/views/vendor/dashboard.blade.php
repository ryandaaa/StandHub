@extends('layouts.vendor')
@section('title','Dashboard Vendor')

@section('content')

<h2 class="text-2xl font-semibold mb-6">Dashboard Vendor</h2>

<div class="bg-white p-4 rounded shadow">
    <h3 class="text-xl font-semibold mb-3">Booking Terbaru</h3>

    @foreach ($bookings as $b)
        <div class="border-b py-2">
            Stand: {{ $b->stand->nama_stand }} — Status: {{ $b->status }}
        </div>
    @endforeach
</div>

@endsection
