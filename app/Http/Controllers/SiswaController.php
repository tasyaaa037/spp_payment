<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
     public function index()
    {
        $siswa = Siswa::with('kelas', 'spp')->paginate(5);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.index', compact('siswa', 'kelas', 'spp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required|unique:siswas,nisn',
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'spp_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $siswa = Siswa::create([
            'nisn' => $request->input('nisn'),
            'nis' => $request->input('nis'),
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'spp_id' => $request->input('spp_id'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($siswa) {
            return redirect()->route('siswa.index')->with(['success' => 'Data Siswa Berhasil Disimpan!']);
        } else {
            return redirect()->route('siswa.index')->with(['error' => 'Data Siswa Tidak Dapat Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $this->validate($request, [
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'spp_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update([
            'nisn' => $request->input('nisn'),
            'nis' => $request->input('nis'),
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'spp_id' => $request->input('spp_id'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($siswa) {
            return redirect()->route('siswa.index')->with(['update' => 'Data siswa Berhasil diperbarui!']);
        } else {
            return redirect()->route('siswa.index')->with(['error' => 'Data siswa tidak dapat diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        // Menghapus data siswa
        $siswa->delete();

        if ($siswa) {
            return redirect()->route('siswa.index')->with(['delete' => 'Data siswa berhasil dihapus!']);
        } else {
            return redirect()->route('siswa.index')->with(['error' => 'Data siswa Gagal dihapus!']);
        }
    }

    }