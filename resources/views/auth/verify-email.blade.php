<x-guest-layout>
    <div class="auth-light-wrapper">

        <div class="auth-light-card">

            {{-- Header --}}
            <div class="text-center mb-6">
                <h2 class="auth-light-title">Verify Your Email</h2>
                <p class="auth-light-subtitle">
                    Before continuing, please check your email for a verification link.
                    If you didn’t receive it, you can request another one.
                </p>
            </div>

            {{-- Status Message --}}
            @if (session('status') == 'verification-link-sent')
                <div class="auth-light-status">
                    A new verification link has been sent to your email.
                </div>
            @endif

            <div class="flex flex-col gap-4 mt-6">

                {{-- Resend Email --}}
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button class="auth-light-button w-full">
                        Resend Verification Email
                    </button>
                </form>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="w-full text-sm text-slate-600 hover:text-slate-800 transition underline">
                        Log Out
                    </button>
                </form>

            </div>

        </div>

    </div>
</x-guest-layout>
