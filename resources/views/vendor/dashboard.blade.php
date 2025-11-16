@extends('layouts.vendor')

@section('title', 'Cari Stand')

@section('content')

    {{-- HERO SEARCH --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-3">Temukan Stand Terbaik</h1>
        <p class="text-gray-600 mb-4">Pilih stand yang sesuai lokasi, ukuran, atau harga terbaik.</p>

        <div class="relative">
            <input type="text" id="searchInput" placeholder="Cari stand berdasarkan lokasi, nomor, fasilitas..."
                class="w-full px-5 py-3 pr-12 text-sm bg-white rounded-xl border border-gray-200
                       shadow-sm focus:ring-2 focus:ring-green-500 focus:border-transparent">

            <svg class="w-5 h-5 text-gray-400 absolute right-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>

    {{-- FILTER KATEGORY --}}
    <div class="flex items-center gap-3 overflow-x-auto pb-2 mb-8">

        {{-- Semua --}}
        <a href="{{ route('vendor.dashboard') }}"
            class="px-4 py-2 rounded-full text-sm
            {{ request('category') ? 'bg-gray-100 text-gray-700' : 'bg-green-100 text-green-700' }}">
            Semua
        </a>

        {{-- A, B, C --}}
        @foreach ($categories as $cat)
            <a href="{{ route('vendor.dashboard', ['category' => $cat]) }}"
                class="px-4 py-2 rounded-full text-sm
              {{ request('category') == $cat ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                {{ $cat }}
            </a>
        @endforeach

    </div>

    {{-- KATALOG --}}
    <h3 class="text-xl font-semibold text-gray-900 mb-4">Stand Tersedia</h3>

    {{-- CONTAINER untuk AJAX --}}
    <div id="standContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @include('vendor.partials.stand-list', ['stands' => $stands])
    </div>

    {{-- PAGINATION --}}
    <div class="mt-6">
        {{ $stands->withQueryString()->links() }}
    </div>


    {{-- AJAX SEARCH --}}
    <script>
        const search = document.getElementById('searchInput');
        const container = document.getElementById('standContainer');

        search.addEventListener('input', function() {

            let value = this.value;
            let category = "{{ request('category') }}";

            fetch(`{{ route('vendor.stands.search') }}?search=${value}&category=${category}`)
                .then(res => res.text())
                .then(html => {
                    container.innerHTML = html;
                });
        });
    </script>

@endsection
