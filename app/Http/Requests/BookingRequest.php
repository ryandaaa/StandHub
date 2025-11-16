<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        // boleh simpel gini dulu
        return Auth::check() && Auth::user()->role === 'vendor';
        // atau kalau mau paling simpel:
        // return true;
        // return true;
    }

    public function rules()
    {
        return [
            'stand_id'    => ['required', 'exists:stands,id'],
            'nama_usaha'  => ['required', 'string', 'max:255'],
            'jenis_usaha' => ['required', 'string', 'max:255'],
            'kontak'      => ['required', 'string', 'max:20'],
        ];
    }
}
