<section class="space-y-3">

    <header>
        <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Hapus Akun
        </h2>

        <p class="text-sm text-gray-600 mt-1">
            Menghapus akun akan menghapus seluruh data secara permanen. Tindakan ini tidak dapat dibatalkan.
        </p>
    </header>

    <!-- BUTTON -->
    <button x-data x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion')"
        class="px-4 mt-2 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 transition">
        Hapus Akun
    </button>

    <!-- MODAL -->
    <x-modal name="confirm-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-4">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-gray-900">
                Yakin ingin menghapus akun?
            </h2>

            <p class="text-sm text-gray-600">
                Masukkan password Anda untuk mengonfirmasi penghapusan akun secara permanen.
            </p>

            <div class="space-y-1">
                <input id="password" name="password" type="password" placeholder="Password"
                    class="w-full rounded-md border-gray-300 focus:ring-red-500 focus:border-red-500">

                <x-input-error :messages="$errors->userDeletion->get('password')" class="text-xs" />
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <button type="button" x-on:click="$dispatch('close')"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                    Batal
                </button>

                <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 shadow-sm transition">
                    Hapus Akun
                </button>
            </div>

        </form>
    </x-modal>

</section>
