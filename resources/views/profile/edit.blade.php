@extends('layouts.wrapper')

@section('title', 'Pengaturan Profil')

@section('content')

    <h2 class="text-3xl font-bold text-gray-900 mb-8 flex items-center gap-2">
        Pengaturan Profil
    </h2>

    <div class="space-y-10">

        <!-- Informasi Profil -->
        <div class="bg-white border border-gray-200 rounded-xl shadow p-8">
            <div class="max-w-lg">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>


        <!-- Password -->
        <div class="bg-white border border-gray-200 rounded-xl shadow p-8 mt-5">
            <div class="max-w-lg">
                @include('profile.partials.update-password-form')
            </div>

        </div>

        <!-- Hapus Akun -->
        <div class="bg-white border border-gray-200 rounded-xl shadow p-8 mt-5">
            <div class="max-w-lg">
                @include('profile.partials.delete-user-form')
            </div>

        </div>

    </div>

@endsection
