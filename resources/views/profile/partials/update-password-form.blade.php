<section>

    <header>
        <h2 class="text-xl font-semibold text-slate-100">Ubah Password</h2>
        <p class="text-sm text-slate-400 mt-1">Pastikan akun Anda tetap aman dengan password yang kuat.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')


        {{-- Password Saat Ini --}}
        <div>
            <label class="block text-sm font-medium text-slate-300">Password Saat Ini</label>
            <input id="current_password" name="current_password" type="password"
                class="mt-2 w-full bg-slate-800 text-slate-100 border border-slate-600 rounded-lg px-4 py-3
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">

            @error('current_password')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>


        {{-- Password Baru --}}
        <div>
            <label class="block text-sm font-medium text-slate-300">Password Baru</label>
            <input id="password" name="password" type="password"
                class="mt-2 w-full bg-slate-800 text-slate-100 border border-slate-600 rounded-lg px-4 py-3
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">

            @error('password')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>


        {{-- Konfirmasi Password --}}
        <div>
            <label class="block text-sm font-medium text-slate-300">Konfirmasi Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-2 w-full bg-slate-800 text-slate-100 border border-slate-600 rounded-lg px-4 py-3
                       focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        </div>


        <div class="flex items-center gap-4">
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold 
                       transition shadow hover:shadow-blue-900/40">
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)"
                    class="text-green-400 text-sm">
                    Password diperbarui!
                </p>
            @endif
        </div>

    </form>
</section>
