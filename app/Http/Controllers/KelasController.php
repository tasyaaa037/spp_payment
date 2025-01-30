<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::paginate(5);
        return view('admin.kelas.index', compact('kelas'));
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
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $kelas = Kelas::create([
            'nama_kelas' => $request->input('nama_kelas'),
            'kompetensi_keahlian' => $request->input('kompetensi_keahlian'),
        ]);

        if ($kelas) {
            return redirect()->route('kelas.index')->with(['success' => 'Data Kelas berhasil disimpan!']);
        } else {
            return redirect()->route('kelas.index')->with(['error' => 'Data Kelas tidak dapat disimpan!']);
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
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required'
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nama_kelas' => $request->input('nama_kelas'),
            'kompetensi_keahlian' => $request->input('kompetensi_keahlian')
        ]);

        if ($kelas) {
            return redirect()->route('kelas.index')->with(['update' => 'Data Kelas Berhasil diperbarui!']);
        } else {
            return redirect()->route('kelas.index')->with(['error' => 'Data Kelas tidak dapat diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        // Menghapus data kelas
        $kelas->delete();

        if ($kelas) {
            return redirect()->route('kelas.index')->with(['delete' => 'Data Kelas berhasil dihapus!']);
        } else {
            return redirect()->route('kelas.index')->with(['error' => 'Data Kelas Gagal dihapus!']);
        }
    }

    }
