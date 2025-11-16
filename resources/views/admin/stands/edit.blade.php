@extends('layouts.admin')

@section('title', 'Edit Stand')

@section('content')

    <div class="space-y-6">

        <!-- HEADER -->
        <div>
            <h2
                class="text-4xl font-extrabold tracking-tight bg-gradient-to-r from-slate-100 to-slate-400 
                   bg-clip-text text-transparent">
                Edit Stand
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Perbarui data stand ini dengan informasi terbaru.
            </p>
        </div>

        <form method="POST" action="{{ route('admin.stands.update', $stand->id) }}"
            class="p-8 rounded-3xl border border-white/5 bg-white/[0.03] backdrop-blur-xl
               shadow-[inset_0_0_0_1px_rgba(255,255,255,0.06),0_0_40px_-10px_rgba(0,0,0,0.7)]
               space-y-6">

            @csrf
            @method('PUT')

            {{-- INPUT TEMPLATE --}}
            @php
                function input($label, $name, $value, $placeholder = '')
                {
                    return "
                <div class='space-y-1'>
                    <label class=\"text-sm font-medium text-slate-300\">$label</label>
                    <input 
                        name=\"$name\"
                        value=\"$value\"
                        placeholder=\"$placeholder\"
                        class=\"w-full rounded-xl px-4 py-2.5 bg-white/5 border border-white/10
                               text-slate-200 placeholder-slate-500
                               focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400
                               transition-all duration-300\" />
                </div>
                ";
                }
            @endphp

            {!! input('Nomor Stand', 'nomor_stand', $stand->nomor_stand, 'Contoh: R-12') !!}
            {!! input('Lokasi', 'lokasi', $stand->lokasi, 'Dekat Panggung, Hall A, dll') !!}
            {!! input('Ukuran (m)', 'ukuran', $stand->ukuran, 'Contoh: 3x3 atau 10') !!}
            {!! input('Harga', 'harga', $stand->harga, 'Contoh: 150000 atau 1000000') !!}

            {{-- FASILITAS --}}
            <div class="space-y-1">
                <label class="text-sm font-medium text-slate-300">Fasilitas</label>
                <textarea name="fasilitas" rows="4"
                    class="w-full rounded-xl px-4 py-3 bg-white/5 border border-white/10
                       text-slate-200 placeholder-slate-500
                       focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400
                       transition-all duration-300"
                    placeholder="Contoh: Meja, Kursi, Listrik, Tenda...">{{ $stand->fasilitas }}</textarea>
            </div>

            {{-- STATUS --}}
            <div class="space-y-1">
                <label class="text-sm font-medium text-slate-300">Status</label>
                <select name="status"
                    class="w-full rounded-xl px-4 py-2.5 bg-white/5 border border-white/10
                       text-slate-200 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-400
                       transition-all duration-300">

                    <option value="available" {{ $stand->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="booked" {{ $stand->status == 'booked' ? 'selected' : '' }}>Booked</option>
                    <option value="occupied" {{ $stand->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                    <option value="maintenance" {{ $stand->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>

            {{-- ACTION --}}
            <div class="pt-4">
                <button
                    class="px-6 py-3 rounded-xl w-full sm:w-auto text-sm font-semibold
                bg-amber-500/20 text-amber-300 border border-amber-500/20
                hover:bg-amber-500/30 hover:border-amber-500/30
                shadow-[0_0_12px_rgba(251,191,36,0.15)]
                transition-all duration-300 backdrop-blur-md">
                    Perbarui Stand
                </button>
            </div>

        </form>

    </div>

@endsection
