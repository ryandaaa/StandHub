@extends('layouts.admin')
@section('title','Manajemen Booking')

@section('content')

<x-alert />

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Daftar Booking</h2>
        <p class="text-sm text-gray-500 mt-1">
            Pantau pengajuan booking vendor dan kelola statusnya.
        </p>
    </div>
</div>

{{-- WRAPPER --}}
<div class="space-y-4">

    @foreach ($bookings as $b)

    <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-5 hover:shadow-md transition">

        <div class="flex items-center justify-between">

            {{-- LEFT CONTENT --}}
            <div class="flex items-start gap-4">

                {{-- ICON --}}
                <div class="p-3 bg-gray-100 rounded-xl">
                    <svg class="w-7 h-7 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                {{-- TEXT AREA --}}
                <div>
                    <p class="text-lg font-semibold text-gray-900">{{ $b->vendor->name }}</p>

                    <p class="text-sm text-gray-600 mt-1">
                        Stand: <span class="font-medium text-gray-800">
                            {{ $b->stand->nomor_stand }}
                            
                        </span>
                    </p>

                    {{-- Status --}}
                    <div class="mt-2">
                        @if($b->status == 'pending')
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                Pending
                            </span>
                        @elseif($b->status == 'approved')
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                Approved
                            </span>
                        @elseif($b->status == 'rejected')
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                Rejected
                            </span>
                        @endif
                    </div>

                    {{-- Catatan admin --}}
                    @if($b->status == 'rejected' && $b->catatan_admin)
                        <p class="text-red-600 text-sm mt-2">
                            Catatan: {{ $b->catatan_admin }}
                        </p>
                    @endif
                </div>

            </div>

            {{-- RIGHT CONTENT --}}
            <div class="flex flex-col items-end gap-2">

                {{-- DETAIL BUTTON --}}
                <a href="{{ route('admin.bookings.show', $b) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm3 0a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Detail
                </a>

            </div>

        </div>
    </div>

    @endforeach

</div>

@endsection
