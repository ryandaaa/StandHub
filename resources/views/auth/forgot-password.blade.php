<x-guest-layout>
    <div class="auth-light-wrapper">

        <div class="auth-light-card">

            {{-- Header --}}
            <div class="text-center mb-6">
                <h2 class="auth-light-title">Forgot Password?</h2>
                <p class="auth-light-subtitle">
                    Enter your email and we’ll send you a password reset link.
                </p>
            </div>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="auth-light-status">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="auth-light-label">Email address</label>
                    <input id="email" type="email" name="email" class="auth-light-input"
                        value="{{ old('email') }}" required autofocus placeholder="you@example.com">

                    @error('email')
                        <p class="auth-light-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit" class="auth-light-button w-full">
                    Send Reset Link
                </button>
            </form>

        </div>
    </div>
</x-guest-layout>
