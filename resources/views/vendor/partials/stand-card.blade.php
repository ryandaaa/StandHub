<div
    class="relative bg-white rounded-xl border border-gray-200 shadow-sm 
            hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden group">

    {{-- FOTO --}}
    <div class="relative h-48 w-full overflow-hidden">
        <img src="https://picsum.photos/800/600"
            class="w-full h-full object-cover group-hover:scale-110 transition-all duration-700" />

        {{-- STATUS --}}
        <span
            class="absolute top-3 right-3 px-3 py-1 text-xs rounded-full font-semibold
            {{ $s->status == 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
            {{ ucfirst($s->status) }}
        </span>

        {{-- GRADIENT --}}
        <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/40 to-transparent"></div>
    </div>

    <div class="p-5">

        <h3 class="text-lg font-semibold text-gray-900">{{ $s->nomor_stand }}</h3>
        <p class="text-gray-600 text-sm mb-3">{{ $s->lokasi }}</p>

        <div class="flex items-center gap-3 text-gray-600 text-sm mb-4">
            <div class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 8h16M4 16h16M8 4v16M16 4v16" />
                </svg>
                {{ $s->ukuran }}
            </div>

            <div class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 1.343-3 3m0 0c0 1.657 1.343 3 3 3m0-6c1.657 0 3 1.343 3 3m0 0c0 1.657-1.343 3-3 3m0 4v-4m0-8V4" />
                </svg>
                Rp {{ number_format($s->harga, 0, ',', '.') }}
            </div>
        </div>

        @if ($s->status == 'available')
            <a href="{{ route('vendor.bookings.create', ['stand' => $s->id]) }}"
                class="block w-full text-center bg-green-600 hover:bg-green-700 
                       text-white py-2.5 rounded-lg font-medium transition">
                Book Sekarang
            </a>
        @else
            <button class="w-full py-2.5 bg-gray-300 text-gray-600 rounded-lg cursor-not-allowed">
                Tidak Tersedia
            </button>
        @endif

    </div>

</div>
