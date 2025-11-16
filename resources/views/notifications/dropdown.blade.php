<div x-show="openNotif" x-cloak @click.outside="openNotif = false"
    class="absolute right-0 top-14 w-80 
           rounded-2xl backdrop-blur-xl 
           bg-slate-900
           border border-white/10 
           shadow-[0_8px_30px_rgba(0,0,0,0.6)]
           p-4 z-50 transition-all duration-300">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-3 px-1">
        <h3 class="text-sm font-semibold text-slate-100 tracking-wide">Notifikasi</h3>
    </div>

    <!-- LIST -->
    <div
        class="divide-y divide-white/5 max-h-80 overflow-y-auto scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-slate-900/20">

        @forelse ($notifications as $n)
            <div class="py-3 flex items-start gap-3 group">

                <!-- BULLET -->
                <span
                    class="w-2 h-2 mt-2 rounded-full 
                    {{ !$n->read_at ? 'bg-blue-400 animate-pulse' : 'bg-slate-500' }}">
                </span>

                <!-- MESSAGE -->
                <div class="flex-1">
                    <p class="text-sm text-slate-200 leading-snug">
                        {{ $n->message }}
                    </p>
                    <p class="text-[11px] text-slate-400 mt-1">
                        {{ $n->created_at->diffForHumans() }}
                    </p>
                </div>

                <!-- MARK AS READ -->
                @if (!$n->read_at)
                    <form action="{{ route('notifications.read', $n->id) }}" method="POST">
                        @csrf
                        <button class="text-[11px] text-blue-400 hover:text-blue-300 transition">
                            Tandai
                        </button>
                    </form>
                @endif

            </div>

        @empty

            <div class="py-6 text-center">
                <svg class="w-8 h-8 mx-auto text-slate-600 mb-2" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M12 8v4m0 4h.01M21 12A9 9 0 116 5.29" />
                </svg>
                <p class="text-sm text-slate-500">Tidak ada notifikasi.</p>
            </div>
        @endforelse

    </div>

    <!-- FOOTER -->
    <a href="{{ route('notifications.index') }}"
        class="block text-center text-sm text-slate-300 hover:text-white mt-3 transition">
        Lihat semua
    </a>
</div>
