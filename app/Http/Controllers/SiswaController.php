<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas', 'spp')->get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.create', compact('kelas', 'spp'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|unique:siswa,nisn|max:10',
            'nis' => 'required|unique:siswa,nis|max:8',
            'nama' => 'required|string|max:35',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:13',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_spp' => 'required|exists:spp,id_spp',
        ]);

        Siswa::create($validated);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.edit', compact('siswa', 'kelas', 'spp'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nisn' => 'required|max:10|unique:siswa,nisn,' . $siswa->nisn . ',nisn',
            'nis' => 'required|max:8|unique:siswa,nis,' . $siswa->nis . ',nis',
            'nama' => 'required|string|max:35',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:13',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_spp' => 'required|exists:spp,id_spp',
        ]);

        $siswa->update($validated);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
