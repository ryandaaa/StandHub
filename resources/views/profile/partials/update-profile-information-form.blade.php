<section>

    <header>
        <h2 class="text-xl font-semibold text-slate-100">Informasi Profil</h2>
        <p class="text-sm text-slate-400 mt-1">Perbarui informasi akun Anda.</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- Name --}}
        <div>
            <label class="block text-sm font-medium text-slate-300">Nama</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                class="mt-2 w-full bg-slate-800 text-slate-100 border border-slate-600 rounded-lg px-4 py-3
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">

            @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm font-medium text-slate-300">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                class="mt-2 w-full bg-slate-800 text-slate-100 border border-slate-600 rounded-lg px-4 py-3
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">

            @error('email')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Button --}}
        <div class="flex items-center gap-4">
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold 
                       transition shadow hover:shadow-blue-900/40">
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)"
                    class="text-green-400 text-sm">
                    Berhasil disimpan!
                </p>
            @endif
        </div>

    </form>
</section>
