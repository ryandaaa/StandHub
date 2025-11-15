@extends('layouts.vendor')

@section('title', 'Booking Saya')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Booking Saya</h2>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($bookings->count() == 0)
        <p class="text-gray-600">Belum ada booking.</p>
    @else
        <table class="w-full bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3">Stand</th>
                    <th class="p-3">Nama Usaha</th>
                    <th class="p-3">Jenis Usaha</th>
                    <th class="p-3">Kontak</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($bookings as $b)
                    <tr class="border-t">
                        <td class="p-3">{{ $b->stand->nomor_stand }}</td>
                        <td class="p-3">{{ $b->nama_usaha }}</td>
                        <td class="p-3">{{ $b->jenis_usaha }}</td>
                        <td class="p-3">{{ $b->kontak }}</td>

                        <td class="p-3">
                            <span
                                class="px-2 py-1 rounded text-sm
                            @if ($b->status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($b->status == 'approved') bg-green-100 text-green-700
                            @elseif($b->status == 'rejected') bg-red-100 text-red-700 @endif
                            ">
                                {{ $b->status }}
                            </span>

                            @if ($b->status == 'rejected' && $b->catatan_admin)
                                <p class="text-red-600 text-sm mt-1">
                                    Alasan ditolak: {{ $b->catatan_admin }}
                                </p>
                            @endif
                        </td>
                        <td class="p-3">{{ $b->created_at->format('d M Y') }}</td>
                        <td class="p-3">
                        <td class="p-3 space-x-2">


                            @if ($b->status == 'pending')
                                <form action="{{ route('vendor.bookings.destroy', $b->id) }}" method="POST"
                                    onsubmit="return confirm('Batalkan booking ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 bg-red-600 text-white rounded">
                                        Batalkan
                                    </button>
                                </form>
                                @if (!$b->bukti_pembayaran)
                                    <a href="{{ route('vendor.bookings.uploadForm', $b->id) }}"
                                        class="px-3 py-1 bg-blue-500 text-white rounded">
                                        Upload Bukti
                                    </a>
                                @endif
                            @else
                                <span class="text-gray-500 text-sm">Tidak ada aksi</span>
                            @endif
                            <a href="{{ route('vendor.bookings.show', $b->id) }}"
                                class="px-3 py-1 bg-gray-700 text-black rounded hover:bg-gray-800">
                                Lihat

                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $bookings->links() }}
        </div>

    @endif

@endsection
