@extends('layouts.vendor')
@section('title', 'Daftar Stand')

@section('content')

    <h2 class="text-2xl font-semibold mb-6">Stand Tersedia</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach ($stands as $s)
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 
                    hover:shadow-lg hover:-translate-y-1 transition-all duration-300 
                    overflow-hidden relative group">

                {{-- FOTO --}}
                <div class="h-44 w-full overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=800"
                        class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500" alt="Foto Stand">

                    {{-- BADGE STATUS --}}
                    <span
                        class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-semibold
                    @if ($s->status === 'available') bg-green-100 text-green-700
                    @else bg-red-100 text-red-600 @endif">
                        {{ ucfirst($s->status) }}
                    </span>

                    {{-- GRADIENT BAWAH FOTO --}}
                    <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>


                {{-- ISI CARD --}}
                <div class="p-5">

                    {{-- NOMOR STAND --}}
                    <h3 class="font-semibold text-lg text-gray-900 mb-1">
                        {{ $s->nomor_stand }}
                    </h3>

                    {{-- LOKASI --}}
                    <p class="text-sm text-gray-600 mb-3">
                        {{ $s->lokasi }}
                    </p>

                    {{-- DETAIL ICON FASILITAS --}}
                    <div class="flex items-center gap-3 text-gray-600 text-sm mb-4">

                        {{-- ICON UKURAN --}}
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 8h16M4 16h16M8 4v16M16 4v16" />
                            </svg>
                            {{ $s->ukuran }}
                        </div>

                        {{-- ICON HARGA --}}
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 1.343-3 3m0 0c0 1.657 1.343 3 3 3m0-6c1.657 0 3 1.343 3 3m0 0c0 1.657-1.343 3-3 3m0 4v-4m0-8V4" />
                            </svg>
                            Rp {{ number_format($s->harga, 0, ',', '.') }}
                        </div>

                        {{-- ICON FASILITAS --}}
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Fasilitas
                        </div>

                    </div>

                    {{-- CTA --}}
                    @if ($s->status == 'available')
                        <a href="{{ route('vendor.bookings.create', ['stand' => $s->id]) }}"
                            class="block text-center py-2.5 rounded-lg 
                              bg-blue-600 hover:bg-blue-700 text-white font-medium
                              transition duration-300">
                            Book Sekarang
                        </a>
                    @else
                        <button class="w-full py-2.5 rounded-lg bg-gray-300 text-gray-600 cursor-not-allowed">
                            Tidak Tersedia
                        </button>
                    @endif

                </div>

            </div>
        @endforeach



    </div>

    <div class="mt-6">
        {{ $stands->links() }}
    </div>



@endsection
