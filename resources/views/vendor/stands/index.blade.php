@extends('layouts.vendor')
@section('title','Daftar Stand')

@section('content')

<h2 class="text-2xl font-semibold mb-6">Ketersediaan Stand</h2>

<div class="bg-white p-4 rounded shadow">
    @foreach ($stands as $s)
        <div class="border-b py-2 flex justify-between">
            <div>
                <p class="font-semibold">{{ $s->nama_stand }}</p>
                <p class="text-gray-600">{{ $s->lokasi }}</p>
            </div>

            @if ($s->status == 'available')
                <a href="{{ route('vendor.bookings.create',['stand' => $s->id]) }}"
                   class="px-3 py-1 bg-blue-600 text-white rounded">Book</a>
            @else
                <span class="text-yellow-600 font-semibold">Booked</span>
            @endif
        </div>
    @endforeach
</div>

@endsection
