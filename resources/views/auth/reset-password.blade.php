<x-guest-layout>
    <div class="auth-light-wrapper">

        <div class="auth-light-card">

            {{-- Header --}}
            <div class="text-center mb-6">
                <h2 class="auth-light-title">Reset Your Password</h2>
                <p class="auth-light-subtitle">
                    Enter your new password and confirm it to complete the reset process.
                </p>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf

                {{-- Token --}}
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                {{-- Email --}}
                <div>
                    <label for="email" class="auth-light-label">Email Address</label>
                    <input id="email" type="email" name="email" class="auth-light-input"
                        value="{{ old('email', $request->email) }}" required autofocus placeholder="you@example.com">

                    @error('email')
                        <p class="auth-light-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="auth-light-label">New Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="auth-light-input" placeholder="••••••••">

                    @error('password')
                        <p class="auth-light-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="auth-light-label">Confirm New Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password" class="auth-light-input" placeholder="••••••••">

                    @error('password_confirmation')
                        <p class="auth-light-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button class="auth-light-button w-full">
                    Reset Password
                </button>

            </form>

        </div>
    </div>
</x-guest-layout>
