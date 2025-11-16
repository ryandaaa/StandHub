<div
    class="relative bg-slate-900/60 backdrop-blur-xl rounded-xl border border-white/10 
           shadow-[0_0_25px_-8px_rgba(0,0,0,0.6)] 
           hover:shadow-[0_0_40px_-6px_rgba(0,0,0,0.8)] 
           hover:-translate-y-1 transition-all duration-300 overflow-hidden group">

    {{-- FOTO --}}
    <div class="relative h-48 w-full overflow-hidden">
        <img src="https://picsum.photos/800/600"
            class="w-full h-full object-cover group-hover:scale-110 
                   transition-all duration-700 opacity-90" />

        {{-- STATUS --}}
        <span
            class="absolute top-3 right-3 px-3 py-1 text-xs rounded-full font-semibold
            {{ $s->status == 'available'
                ? 'bg-blue-500/20 text-blue-300 border border-blue-500/30 backdrop-blur-md'
                : 'bg-rose-500/20 text-rose-300 border border-rose-500/30 backdrop-blur-md' }}">
            {{ ucfirst($s->status) }}
        </span>

        {{-- GRADIENT --}}
        <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
    </div>

    <div class="p-5">

        {{-- JUDUL --}}
        <h3 class="text-lg font-bold text-slate-100 tracking-tight">
            {{ $s->nomor_stand }}
        </h3>

        <p class="text-slate-400 text-sm mb-3">
            {{ $s->lokasi }}
        </p>

        {{-- INFO ROW --}}
        <div class="flex items-center gap-4 text-slate-300/80 text-sm mb-4">

            {{-- UKURAN --}}
            <div class="flex items-center gap-1">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 8h16M4 16h16M8 4v16M16 4v16" />
                </svg>
                {{ $s->ukuran }}
            </div>

            {{-- HARGA --}}
            <div class="flex items-center gap-1">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 1.343-3 3m0 0c0 1.657 1.343 3 3 3m0-6c1.657 0 3 1.343 3 3m0 0c0 1.657-1.343 3-3 3m0 4v-4m0-8V4" />
                </svg>
                Rp {{ number_format($s->harga, 0, ',', '.') }}
            </div>
        </div>

        {{-- TOMBOL --}}
        @if ($s->status == 'available')
            <a href="{{ route('vendor.bookings.create', ['stand' => $s->id]) }}"
                class="block w-full text-center py-2.5 rounded-lg font-semibold
                       bg-blue-600 hover:bg-blue-500 text-white
                       shadow-[0_0_20px_-6px_rgba(37,99,235,0.5)] hover:shadow-[0_0_25px_-4px_rgba(37,99,235,0.7)]
                       transition">
                Book Sekarang
            </a>
        @else
            <button
                class="w-full py-2.5 rounded-lg cursor-not-allowed
                       bg-slate-700 text-slate-400 border border-slate-600">
                Tidak Tersedia
            </button>
        @endif

    </div>

</div>
