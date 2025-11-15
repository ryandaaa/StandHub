<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stand;
use Illuminate\Http\Request;

class StandController extends Controller
{
    public function index()
    {
        $stands = Stand::latest()->paginate(10);
        return view('admin.stands.index', compact('stands'));
    }

    public function create()
    {
        return view('admin.stands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_stand' => 'required|unique:stands',
            'lokasi' => 'required',
            'ukuran' => 'required',
            'harga' => 'required|integer|min:0',
            'fasilitas' => 'required',
            'status' => 'required|in:available,booked,occupied,maintenance',
        ]);

        Stand::create($request->all());

        return redirect()->route('admin.stands.index')
            ->with('success', 'Stand berhasil ditambahkan.');
    }

    public function edit(Stand $stand)
    {
        return view('admin.stands.edit', compact('stand'));
    }

    public function update(Request $request, Stand $stand)
    {
        $request->validate([
            'nomor_stand' => 'required|unique:stands,nomor_stand,' . $stand->id,
            'lokasi' => 'required',
            'ukuran' => 'required',
            'harga' => 'required|integer|min:0',
            'fasilitas' => 'required',
            'status' => 'required|in:available,booked,occupied,maintenance',
        ]);

        $stand->update($request->all());

        return redirect()->route('admin.stands.index')
            ->with('success', 'Stand berhasil diupdate.');
    }

    public function destroy(Stand $stand)
    {
        $stand->delete();

        return redirect()->route('admin.stands.index')
            ->with('success', 'Stand berhasil dihapus.');
    }
}
