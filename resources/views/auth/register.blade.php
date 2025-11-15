<x-guest-layout>
    <div class="auth-light-wrapper">

        <div class="auth-light-card">

            {{-- Header --}}
            <div class="text-center mb-6">
                <h2 class="auth-light-title">Create an Account</h2>
                <p class="auth-light-subtitle">
                    Join StandHub and start managing your stands today.
                </p>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                {{-- Name --}}
                <div>
                    <label for="name" class="auth-light-label">Full Name</label>
                    <input id="name" type="text" name="name" class="auth-light-input"
                        value="{{ old('name') }}" required autofocus placeholder="John Doe">

                    @error('name')
                        <p class="auth-light-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="auth-light-label">Email Address</label>
                    <input id="email" type="email" name="email" class="auth-light-input"
                        value="{{ old('email') }}" required placeholder="you@example.com" autocomplete="username">

                    @error('email')
                        <p class="auth-light-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="auth-light-label">Password</label>
                    <input id="password" type="password" name="password" class="auth-light-input" required
                        autocomplete="new-password" placeholder="••••••••">

                    @error('password')
                        <p class="auth-light-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="auth-light-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="auth-light-input" required autocomplete="new-password" placeholder="••••••••">

                    @error('password_confirmation')
                        <p class="auth-light-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button class="auth-light-button w-full">
                    Create Account
                </button>

            </form>

            {{-- Link to login --}}
            <div class="mt-6 text-center text-sm text-slate-600">
                Already have an account?
                <a href="{{ route('login') }}" class="auth-light-link font-medium">
                    Sign In
                </a>
            </div>

        </div>

    </div>
</x-guest-layout>
{{-- This file is part of Bazaar Stand --}}
