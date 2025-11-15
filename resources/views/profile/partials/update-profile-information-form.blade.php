<section class="space-y-4">

    <header class="mb-3">
        <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Informasi Profil
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Perbarui nama dan alamat email akun Anda.
        </p>
    </header>


    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <!-- NAME -->
        <div class="space-y-1">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>

            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                class="w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" />

            <x-input-error class="text-xs" :messages="$errors->get('name')" />
        </div>

        <!-- EMAIL -->
        <div class="space-y-1">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>

            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                class="w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" />

            <x-input-error class="text-xs" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <p class="text-xs mt-1 text-gray-700">
                    Email Anda belum diverifikasi.
                    <button form="send-verification" class="underline text-blue-600 hover:text-blue-800">
                        Kirim ulang verifikasi.
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-1 text-sm text-green-600 font-semibold">
                        Link verifikasi baru telah dikirim!
                    </p>
                @endif
            @endif
        </div>

        <!-- BUTTON -->
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 transition">
                Simpan
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-xs text-green-600">Tersimpan.</p>
            @endif
        </div>

    </form>
</section>
