@extends('layouts.admin') {{-- Jika vendor punya layout terpisah, ganti sesuai --}}
@section('title', 'Notifikasi')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Notifikasi</h1>

        {{-- tombol mark all --}}
        @if($notifications->whereNull('read_at')->count() > 0)
            <form action="#" method="POST" id="mark-all-form">
                @csrf
                <button 
                    type="button"
                    onclick="document.querySelectorAll('.mark-read-btn').forEach(btn => btn.click());"
                    class="px-4 py-2 text-sm font-medium text-blue-600 hover:underline">
                    Tandai semua sebagai dibaca
                </button>
            </form>
        @endif
    </div>


    {{-- LIST --}}
    <div class="bg-white shadow-sm rounded-xl border border-gray-200 divide-y divide-gray-200">

        @forelse ($notifications as $n)
        
            <div class="p-5 flex items-start gap-4">
                
                {{-- Bullet unread --}}
                @if(!$n->read_at)
                    <span class="w-3 h-3 mt-2 rounded-full bg-blue-500"></span>
                @else
                    <span class="w-3 h-3 mt-2 rounded-full bg-gray-300"></span>
                @endif

                <div class="flex-1">

                    <p class="text-sm {{ $n->read_at ? 'text-gray-600' : 'text-gray-900 font-semibold' }}">
                        {{ $n->message }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        {{ $n->created_at->diffForHumans() }}
                    </p>
                </div>

                {{-- Button mark read --}}
                @if(!$n->read_at)
                <form action="{{ route('notifications.read', $n->id) }}" method="POST">
                    @csrf
                    <button 
                        class="mark-read-btn text-xs text-blue-600 hover:underline"
                        title="Tandai dibaca">
                        Tandai
                    </button>
                </form>
                @endif
            </div>

        @empty
            <div class="p-6 text-center text-gray-500">
                Tidak ada notifikasi.
            </div>
        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="mt-6">
        {{ $notifications->links() }}
    </div>

</div>

@endsection
