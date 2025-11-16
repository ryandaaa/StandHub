@extends('layouts.admin')

@section('title', 'Daftar Vendor')

@section('content')

    <div class="space-y-4">

        {{-- HEADER --}}
        <div>
            <h2
                class="text-4xl font-extrabold tracking-tight 
                   bg-gradient-to-r from-slate-100 to-slate-400 
                   bg-clip-text text-transparent">
                Daftar Vendor
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Semua vendor terdaftar dan ringkasan aktivitas mereka.
            </p>
        </div>


        {{-- ALERT --}}
        @if (session('success'))
            <div
                class="p-4 rounded-xl border border-emerald-500/20 
                    bg-emerald-500/10 text-emerald-300 backdrop-blur">
                {{ session('success') }}
            </div>
        @endif


        @if ($vendors->count() == 0)

            <div
                class="p-12 text-center rounded-3xl border border-white/10 
                    bg-white/[0.03] backdrop-blur-xl
                    shadow-[inset_0_0_0_1px_rgba(255,255,255,0.06),0_0_40px_-12px_rgba(0,0,0,0.7)]">
                <p class="text-slate-400 text-sm italic">Belum ada vendor terdaftar.</p>
            </div>
        @else
            {{-- TABLE WRAPPER --}}
            <div
                class="rounded-3xl overflow-hidden border border-white/10 bg-white/[0.02] backdrop-blur-xl
                   shadow-[inset_0_0_0_1px_rgba(255,255,255,0.05),0_0_50px_-15px_rgba(0,0,0,0.8)]">

                <table class="w-full text-sm text-slate-300">
                    <thead class="bg-white/[0.03] border-b border-white/10 text-slate-400 text-xs uppercase tracking-wide">
                        <tr>
                            <th class="px-6 py-4 text-left">Vendor</th>
                            <th class="px-6 py-4 text-left">Email</th>
                            <th class="px-6 py-4 text-left">Tanggal Daftar</th>
                            <th class="px-6 py-4 text-left">Total Booking</th>
                            <th class="px-6 py-4 text-left">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-white/5">

                        @foreach ($vendors as $v)
                            <tr class="hover:bg-white/[0.03] transition">

                                {{-- AVATAR + NAME --}}
                                <td class="px-6 py-4 flex items-center gap-4">

                                    <div
                                        class="h-11 px-4 w-11 rounded-2xl flex items-center justify-center 
                                            bg-blue-500/10 text-blue-300 font-semibold
                                            border border-blue-400/20 backdrop-blur shadow-inner">
                                        {{ strtoupper(substr($v->name, 0, 1)) }}
                                    </div>

                                    <div>
                                        <p class="font-semibold text-slate-100 text-base">{{ $v->name }}</p>
                                        <p class="text-xs text-slate-500">ID: {{ $v->id }}</p>
                                    </div>

                                </td>

                                {{-- EMAIL --}}
                                <td class="px-6 py-4">
                                    <span class="text-slate-300">
                                        {{ $v->email }}
                                    </span>
                                </td>

                                {{-- CREATED DATE --}}
                                <td class="px-6 py-4">
                                    <span class="text-slate-300">
                                        {{ $v->created_at->format('d M Y') }}
                                    </span>
                                </td>

                                {{-- BOOKING COUNT --}}
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1.5 rounded-full text-xs font-semibold
                                           bg-blue-600/20 border border-blue-500/30 text-blue-200
                                           backdrop-blur shadow-[0_0_8px_rgba(59,130,246,0.25)]">
                                        {{ $v->bookings->count() }} Booking
                                    </span>
                                </td>

                                {{-- ACTION --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-2">

                                        {{-- DETAIL --}}
                                        <a href="{{ route('admin.vendors.show', $v->id) }}"
                                            class="px-4 py-1.5 text-xs rounded-lg font-medium
                                               bg-blue-600/20 text-blue-200 border border-blue-500/30
                                               hover:bg-blue-600/30 transition backdrop-blur">
                                            Detail
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('admin.vendors.destroy', $v->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus vendor ini? Semua booking vendor akan hilang!');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="px-4 py-1.5 text-xs rounded-lg font-medium
                                                   bg-red-600/20 text-red-200 border border-red-500/30
                                                   hover:bg-red-600/30 transition backdrop-blur">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

            {{-- PAGINATION --}}
            <div class="pt-6">
                {{ $vendors->links() }}
            </div>

        @endif

    </div>

@endsection
