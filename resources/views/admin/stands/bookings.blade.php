@extends('layouts.admin')

@section('title', 'Booking untuk Stand ' . $stand->nomor_stand)

@section('content')

    <h2 class="text-3xl font-bold text-gray-900 mb-6">
        Booking untuk Stand: {{ $stand->nomor_stand }}
    </h2>

    <div class="space-y-4">

        @forelse ($bookings as $b)
            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition">

                <div class="flex justify-between items-start">

                    <div class="flex items-start gap-4">

                        <div class="p-3 rounded-xl bg-gray-100">
                            <svg class="w-7 h-7 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                        </div>

                        <div>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ $b->vendor->name }}
                            </p>

                            <p class="text-sm text-gray-500">
                                {{ $b->created_at->diffForHumans() }}
                            </p>

                            <div class="mt-2">
                                @if ($b->status == 'pending')
                                    <span class="px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">
                                        Pending
                                    </span>
                                @elseif($b->status == 'approved')
                                    <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                        Approved
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs bg-red-100 text-red-700 rounded-full">
                                        Rejected
                                    </span>
                                @endif
                            </div>

                            @if ($b->status == 'rejected' && $b->catatan_admin)
                                <p class="text-sm text-red-600 mt-2">{{ $b->catatan_admin }}</p>
                            @endif
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('admin.bookings.show', $b) }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                            Detail
                        </a>
                    </div>

                </div>

            </div>

        @empty
            <p class="text-gray-500 text-sm text-center py-8">Belum ada booking untuk stand ini.</p>
        @endforelse

    </div>

@endsection
