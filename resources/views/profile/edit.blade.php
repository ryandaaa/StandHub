@extends('layouts.wrapper')

@section('title', 'Pengaturan Profil')

@section('content')

    <div class="mb-4 mt-2">
        <h1 class="text-3xl font-extrabold text-slate-100">Pengaturan Profil</h1>
        <p class="text-slate-400 mt-1">Kelola informasi akun dan keamanan Anda.</p>
    </div>

    <div class="space-y-10">

        {{-- ========================= --}}
        {{-- INFORMASI PROFIL --}}
        {{-- ========================= --}}
        <div class="bg-slate-800/60 backdrop-blur-xl border border-slate-700 rounded-xl shadow-md p-8">
            <div class="max-w-lg">

                {{-- FORM ASLI BREEZE, only styled --}}
                @include('profile.partials.update-profile-information-form')

            </div>
        </div>


        {{-- ========================= --}}
        {{-- PASSWORD --}}
        {{-- ========================= --}}
        <div class="bg-slate-800/60 backdrop-blur-xl border border-slate-700 rounded-xl shadow-md p-8">

            <div class="max-w-lg">

                @include('profile.partials.update-password-form')

            </div>
        </div>


        {{-- ========================= --}}
        {{-- DELETE ACCOUNT --}}
        {{-- ========================= --}}
        <div class="bg-slate-800/60 backdrop-blur-xl border border-red-700/40 rounded-xl shadow-md p-8">

            <div class="max-w-lg">
                @include('profile.partials.delete-user-form')
            </div>

        </div>

    </div>

@endsection
