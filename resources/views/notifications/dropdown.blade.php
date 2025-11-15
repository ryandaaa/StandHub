<div x-show="openNotif" x-cloak @click.outside="openNotif = false"
    class="absolute right-0 top-12 w-80 bg-white rounded-xl shadow-lg border border-gray-200 p-4 z-50">

    <h3 class="text-sm font-semibold text-gray-900 mb-2">Notifikasi</h3>

    <div class="divide-y divide-gray-100 max-h-80 overflow-y-auto">

        @forelse ($notifications as $n)
            <div class="py-2 flex items-start gap-3">

                {{-- BULLET UNREAD --}}
                @if (!$n->read_at)
                    <span class="w-2 h-2 mt-2 rounded-full bg-blue-500"></span>
                @else
                    <span class="w-2 h-2 mt-2 rounded-full bg-gray-300"></span>
                @endif

                <div class="flex-1">
                    <p class="text-sm text-gray-800">
                        {{ $n->message }}
                    </p>
                    <p class="text-xs text-gray-500 mt-1">
                        {{ $n->created_at->diffForHumans() }}
                    </p>
                </div>

                {{-- MARK AS READ --}}
                @if (!$n->read_at)
                    <form action="{{ route('notifications.read', $n->id) }}" method="POST">
                        @csrf
                        <button class="text-xs text-blue-600 hover:underline">Mark</button>
                    </form>
                @endif

            </div>

        @empty
            <p class="text-sm text-gray-500 py-4 text-center">
                Tidak ada notifikasi.
            </p>
        @endforelse

    </div>

    <a href="{{ route('notifications.index') }}" class="block text-center text-sm text-blue-600 hover:underline mt-3">
        Lihat semua
    </a>
</div>
