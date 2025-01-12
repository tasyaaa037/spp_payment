<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:25|unique:petugas,username',
            'password' => 'required|string|min:6|confirmed',
            'nama_petugas' => 'required|string|max:35',
            'level' => 'required|in:admin,petugas',
        ]);

        Petugas::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'nama_petugas' => $validated['nama_petugas'],
            'level' => $validated['level'],
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil ditambahkan.');
    }

    public function edit(Petugas $petugas)
    {
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, Petugas $petugas)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:25|unique:petugas,username,' . $petugas->id_petugas . ',id_petugas',
            'password' => 'nullable|string|min:6|confirmed',
            'nama_petugas' => 'required|string|max:35',
            'level' => 'required|in:admin,petugas',
        ]);

        $petugas->update([
            'username' => $validated['username'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $petugas->password,
            'nama_petugas' => $validated['nama_petugas'],
            'level' => $validated['level'],
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diperbarui.');
    }

    public function destroy(Petugas $petugas)
    {
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil dihapus.');
    }
}
