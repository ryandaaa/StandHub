@extends('layouts.wrapper')

@section('title', 'Notifikasi')

@section('content')

    <div class="max-w-4xl mx-auto pt-4">

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-100 tracking-tight">Notifikasi</h1>
                <p class="text-slate-400 text-sm mt-1">
                    Semua pembaruan terbaru terkait booking dan aktivitas akun Anda.
                </p>
            </div>

            {{-- Mark All --}}
            @if ($notifications->whereNull('read_at')->count() > 0)
                <button onclick="document.querySelectorAll('.mark-read-btn').forEach(btn => btn.click());"
                    class="px-4 py-2 text-sm font-medium bg-blue-600/80 hover:bg-blue-600 text-white rounded-lg shadow transition">
                    Tandai semua dibaca
                </button>
            @endif
        </div>


        {{-- LIST WRAPPER --}}
        <div
            class="bg-slate-900/40 backdrop-blur-xl border border-white/10 shadow-xl rounded-2xl overflow-hidden divide-y divide-white/5">

            @forelse ($notifications as $n)
                <div class="p-6 flex items-start gap-4 hover:bg-white/5 transition">

                    {{-- Bullet --}}
                    <span
                        class="w-2.5 h-2.5 mt-2 rounded-full 
                    {{ $n->read_at ? 'bg-slate-500' : 'bg-blue-500 animate-pulse' }}">
                    </span>

                    {{-- TEXT --}}
                    <div class="flex-1">
                        <p
                            class="text-sm leading-relaxed
                        {{ $n->read_at ? 'text-slate-300' : 'text-slate-100 font-semibold' }}">
                            {{ $n->message }}
                        </p>

                        <p class="text-xs text-slate-500 mt-1">
                            {{ $n->created_at->diffForHumans() }}
                        </p>
                    </div>

                    {{-- Button Mark Read --}}
                    @if (!$n->read_at)
                        <form action="{{ route('notifications.read', $n->id) }}" method="POST">
                            @csrf
                            <button
                                class="mark-read-btn text-xs text-blue-400 hover:text-blue-300 hover:underline transition"
                                title="Tandai dibaca">
                                Tandai
                            </button>
                        </form>
                    @endif

                </div>

            @empty

                <div class="p-10 text-center">
                    <p class="text-slate-400 text-sm">Tidak ada notifikasi saat ini.</p>
                </div>
            @endforelse
        </div>


        {{-- PAGINATION --}}
        <div class="mt-8">
            <div class="flex justify-center">
                {{ $notifications->links('pagination::tailwind') }}
            </div>
        </div>

    </div>

@endsection
