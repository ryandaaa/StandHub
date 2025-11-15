@extends('layouts.admin')

@section('title', 'Detail Vendor')

@section('content')
<h2 class="text-2xl font-semibold mb-6">Detail Vendor</h2>

<div class="bg-white p-6 rounded shadow mb-6">

    <h3 class="text-xl font-semibold mb-4">Informasi Vendor</h3>

    <div class="grid grid-cols-2 gap-4">

        <div>
            <p class="text-gray-600">Nama Vendor:</p>
            <p class="font-semibold text-lg">{{ $vendor->name }}</p>
        </div>

        <div>
            <p class="text-gray-600">Email:</p>
            <p class="font-semibold">{{ $vendor->email }}</p>
        </div>

        <div>
            <p class="text-gray-600">Tanggal Bergabung:</p>
            <p class="font-semibold">
                {{ $vendor->created_at->format('d M Y') }}
            </p>
        </div>

        <div>
            <p class="text-gray-600">Total Booking:</p>
            <p class="font-semibold">{{ $vendor->bookings->count() }}</p>
        </div>

    </div>
</div>


{{-- Riwayat Booking --}}
<div class="bg-white p-6 rounded shadow">

    <h3 class="text-xl font-semibold mb-4">Riwayat Booking</h3>

    @if($vendor->bookings->count() == 0)
        <p class="text-gray-600">Vendor ini belum pernah melakukan booking.</p>
    @else
        <table class="w-full bg-white rounded">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 text-left">Stand</th>
                    <th class="p-3 text-left">Nama Usaha</th>
                    <th class="p-3 text-left">Jenis Usaha</th>
                    <th class="p-3 text-left">Kontak</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Tanggal</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($vendor->bookings as $b)
                    <tr class="border-t">
                        <td class="p-3">{{ $b->stand->nomor_stand }}</td>
                        <td class="p-3">{{ $b->nama_usaha }}</td>
                        <td class="p-3">{{ $b->jenis_usaha }}</td>
                        <td class="p-3">{{ $b->kontak }}</td>

                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-sm
                                @if($b->status=='pending') bg-yellow-100 text-yellow-600
                                @elseif($b->status=='approved') bg-green-100 text-green-600
                                @else bg-red-100 text-red-600
                                @endif
                            ">
                                {{ $b->status }}
                            </span>
                        </td>

                        <td class="p-3">
                            {{ $b->created_at->format('d M Y') }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif

</div>

@endsection
