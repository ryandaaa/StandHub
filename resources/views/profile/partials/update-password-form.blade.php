<section class="space-y-4">

    <!-- HEADER -->
    <header class="mb-3">
        <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 11c1.654 0 3-1.346 3-3S13.654 5 12 5s-3 1.346-3 3 1.346 3 3 3zM5 20a7 7 0 0114 0H5z" />
            </svg>
            Ganti Password
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Gunakan password yang kuat untuk menjaga keamanan akun Anda.
        </p>
    </header>


    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <!-- CURRENT PASSWORD -->
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">
                Password Saat Ini
            </label>

            <input name="current_password" type="password"
                class="w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" />

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-xs" />
        </div>

        <!-- NEW PASSWORD -->
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">
                Password Baru
            </label>

            <input name="password" type="password"
                class="w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" />

            <x-input-error :messages="$errors->updatePassword->get('password')" class="text-xs" />
        </div>

        <!-- CONFIRM PASSWORD -->
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">
                Konfirmasi Password
            </label>

            <input name="password_confirmation" type="password"
                class="w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" />

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-xs" />
        </div>


        <!-- BUTTON -->
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 transition">
                Simpan
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-xs text-green-600">Password diperbarui.</p>
            @endif
        </div>
    </form>

</section>
