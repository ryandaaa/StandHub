@extends('layouts.admin')

@section('title', 'Tambah Stand')

@section('content')

    <div class="mb-6">
        <h2 class="text-4xl font-extrabold tracking-tight text-slate-100">
            Tambah Stand
        </h2>
        <p class="text-slate-400 text-sm mt-1">
            Lengkapi data untuk membuat stand baru pada sistem.
        </p>
    </div>

    <form method="POST" action="{{ route('admin.stands.store') }}"
        class="p-8 rounded-3xl border border-white/10 bg-white/[0.03] backdrop-blur-xl
               shadow-[inset_0_0_0_1px_rgba(255,255,255,0.06),0_0_40px_-10px_rgba(0,0,0,0.9)]
               transition-all duration-500">
        @csrf

        {{-- FIELD GROUP --}}
        @php
            $fields = [
                ['label' => 'Nomor Stand', 'name' => 'nomor_stand', 'type' => 'text', 'placeholder' => 'Contoh: R-12'],
                [
                    'label' => 'Lokasi',
                    'name' => 'lokasi',
                    'type' => 'text',
                    'placeholder' => 'Dekat Panggung, Hall A, dll',
                ],
                ['label' => 'Ukuran (m)', 'name' => 'ukuran', 'type' => 'text', 'placeholder' => 'Contoh: 3x3 atau 10'],
                ['label' => 'Harga', 'name' => 'harga', 'type' => 'number', 'placeholder' => 'Contoh: 150000'],
            ];
        @endphp

        {{-- INPUT FIELDS --}}
        @foreach ($fields as $f)
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-300 tracking-wide">{{ $f['label'] }}</label>

                <input type="{{ $f['type'] }}" name="{{ $f['name'] }}" placeholder="{{ $f['placeholder'] }}"
                    class="w-full rounded-xl bg-white/5 border border-white/10 text-slate-200
                           px-4 py-3 text-sm shadow-inner backdrop-blur
                           focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400/40
                           transition-all duration-300">
            </div>
        @endforeach

        {{-- FASILITAS --}}
        <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-300 tracking-wide">Fasilitas</label>

            <textarea name="fasilitas" rows="4" placeholder="Contoh: Meja, Kursi, Listrik, Tenda..."
                class="w-full rounded-xl bg-white/5 border border-white/10 text-slate-200
                       px-4 py-3 text-sm shadow-inner backdrop-blur
                       focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400/40
                       transition-all duration-300"></textarea>
        </div>

        {{-- STATUS --}}
        <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-300 tracking-wide">Status</label>

            <select name="status"
                class="w-full rounded-xl bg-white/5 border border-white/10 text-slate-200
                       px-4 py-3 text-sm shadow-inner backdrop-blur
                       focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400/40
                       transition-all duration-300">
                <option value="available">Available</option>
                <option value="booked">Booked</option>
                <option value="occupied">Occupied</option>
                <option value="maintenance">Maintenance</option>
            </select>
        </div>

        {{-- SUBMIT BUTTON --}}
        <div class="pt-4">
            <button
                class="px-6 py-3 rounded-xl w-full md:w-auto
                       text-slate-100 text-sm font-semibold tracking-wide
                       bg-blue-600/30 border border-blue-500/20 backdrop-blur
                       shadow-[0_0_25px_rgba(59,130,246,0.35)]
                       hover:bg-blue-600/40 hover:shadow-[0_0_35px_rgba(59,130,246,0.5)]
                       transition-all duration-300">
                Simpan Stand
            </button>
        </div>

    </form>

@endsection
