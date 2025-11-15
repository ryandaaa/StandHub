<x-guest-layout>
    <div class="auth-light-wrapper">

        <div class="auth-light-card">

            {{-- Header --}}
            <div class="text-center mb-6">
                <h2 class="auth-light-title">Confirm Password</h2>
                <p class="auth-light-subtitle">
                    This is a secure area. Please confirm your password to continue.
                </p>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
                @csrf

                {{-- Password --}}
                <div>
                    <label for="password" class="auth-light-label">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="auth-light-input" placeholder="••••••••">

                    @error('password')
                        <p class="auth-light-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button class="auth-light-button w-full">
                    Confirm
                </button>
            </form>

        </div>
    </div>
</x-guest-layout>
