@extends('layouts.vendor')

@section('title', 'Cari Stand')

@section('content')

    {{-- HERO SEARCH --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-3">Temukan Stand Terbaik</h1>
        <p class="text-gray-600 mb-4">Pilih stand yang sesuai lokasi, ukuran, atau harga terbaik.</p>

        <div class="relative">
            <input type="text" placeholder="Cari stand berdasarkan lokasi, nomor, fasilitas..."
                class="w-full px-5 py-3 pr-12 text-sm bg-white rounded-xl border border-gray-200 
                      shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <svg class="w-5 h-5 text-gray-400 absolute right-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>


    {{-- FILTER BAR --}}
    <div class="flex items-center gap-3 overflow-x-auto pb-2 mb-8">

        <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-gray-200">
            Semua
        </button>

        <button class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm hover:bg-blue-200">
            Promo
        </button>

        <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-gray-200">
            Ukuran Besar
        </button>

        <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-gray-200">
            Dekat Pintu Masuk
        </button>

        <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-gray-200">
            Termurah
        </button>

    </div>


    {{-- KATALOG STAND --}}
    <h3 class="text-xl font-semibold text-gray-900 mb-4">Stand Tersedia</h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach ($stands as $s)
            @include('vendor.partials.stand-card', ['s' => $s])
        @endforeach

        <div class="mt-6">
            {{ $stands->links() }}
        </div>

    </div>

@endsection
