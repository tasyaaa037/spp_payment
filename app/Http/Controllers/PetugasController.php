<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.petugas.index', compact('user'));
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);

        if ($user) {
            return redirect()->route('petugas.index')->with(['success' => 'Data Petugas Berhasil Disimpan!']);
        } else {
            return redirect()->route('petugas.index')->with(['error' => 'Data Petugas Tidak Dapat Diproses!']);
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);

        if ($user) {
            return redirect()->route('petugas.index')->with(['update' => 'Data Petugas Berhasil Diubah!']);
        } else {
            return redirect()->route('petugas.index')->with(['error' => 'Data Petugas gagal di ubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $petugas = User::findOrFail($id);

        // Menghapus data siswa
       $petugas->delete();

        if ($petugas) {
            return redirect()->route('petugas.index')->with(['delete' => 'Data Petugas berhasil dihapus!']);
        } else {
            return redirect()->route('petugas.index')->with(['error' => 'Data Petugas Gagal dihapus!']);
        }
    }
}
