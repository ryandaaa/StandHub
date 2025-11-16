@extends('layouts.vendor')

@section('title', 'Cari Stand')

@section('content')

    {{-- HERO SEARCH --}}
    <div class="mb-6 mt-2">

        {{-- Title --}}
        <h1 class="text-4xl font-extrabold tracking-tight text-slate-100">
            Temukan Stand Terbaik
        </h1>

        <p class="text-slate-400 mt-1">
            Cari lokasi, fasilitas, ukuran, atau harga yang cocok untuk usaha Anda.
        </p>

        {{-- Search Field --}}
        <div class="relative mt-6">
            <input type="text" id="searchInput" placeholder="Cari stand berdasarkan nomor, lokasi, fasilitas, atau harga…"
                class="w-full px-5 py-3 pr-12 text-sm rounded-xl
                       bg-slate-800/50 border border-slate-700
                       text-slate-100 placeholder-slate-400
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent
                       shadow-[0_0_20px_-6px_rgba(0,0,0,0.6)] backdrop-blur">

            <svg class="w-5 h-5 text-slate-400 absolute right-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>


    {{-- FILTER KATEGORI --}}
    <div class="flex items-center gap-3 overflow-x-auto pb-3 mb-4">

        {{-- Semua --}}
        <a href="{{ route('vendor.dashboard') }}"
            class="px-5 py-2.5 rounded-full text-sm font-medium transition
                {{ request('category')
                    ? 'bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700'
                    : 'bg-blue-600 text-white shadow shadow-blue-500/20' }}">
            Semua
        </a>

        {{-- A, B, C --}}
        @foreach ($categories as $cat)
            <a href="{{ route('vendor.dashboard', ['category' => $cat]) }}"
                class="px-5 py-2.5 rounded-full text-sm font-medium border transition
                    {{ request('category') == $cat
                        ? 'bg-blue-600 text-white border-blue-500 shadow shadow-blue-500/20'
                        : 'bg-slate-800 text-slate-300 border-slate-700 hover:bg-slate-700' }}">
                {{ $cat }}
            </a>
        @endforeach

    </div>


    {{-- TITLE LIST --}}
    <h3 class="text-2xl font-bold text-slate-100 mb-4">
        Stand Tersedia
    </h3>


    {{-- LIST --}}
    <div id="standContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @include('vendor.partials.stand-list', ['stands' => $stands])
    </div>

    {{-- PAGINATION --}}
    <div class="mt-10 text-center">
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
                .then(html => container.innerHTML = html);
        });
    </script>

@endsection
