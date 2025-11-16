<section>

    <header>
        <h2 class="text-xl font-semibold text-red-400">Hapus Akun</h2>
        <p class="text-sm text-slate-400 mt-1">Aksi ini tidak dapat dibatalkan. Semua data Anda akan dihapus permanen.
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-6">
        @csrf
        @method('delete')

        {{-- Konfirmasi password --}}
        <div>
            <label class="block text-sm font-medium text-slate-300">Konfirmasi Password</label>
            <input id="password" name="password" type="password"
                class="mt-2 w-full bg-slate-800 text-slate-100 border border-slate-600 rounded-lg px-4 py-3
                       focus:ring-2 focus:ring-red-500 focus:border-transparent transition">

            @error('password')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button
            class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg
                   transition shadow hover:shadow-red-900/40">
            Hapus Akun
        </button>

    </form>

</section>
