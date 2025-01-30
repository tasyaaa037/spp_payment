<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp = Spp::paginate(5);
        return view('admin.spp.index', compact('spp'));
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
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $spp = Spp::create([
            'tahun' => $request->input('tahun'),
            'nominal' => $request->input('nominal'),
        ]);

        if ($spp) {
            return redirect()->route('spp.index')->with(['success' => 'Data SPP berhasil disimpan!']);
        } else {
            return redirect()->route('spp.index')->with(['error' => 'Data SPP tidak dapat disimpan!']);
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
        $spp = Spp::findOrFail($id);
        return view('admin.spp.edit', compact('spp')); // Anda perlu membuat tampilan untuk form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'tahun' => 'required',
            'nominal' => 'required'
        ]);

        $spp = Spp::findOrFail($id);
        $spp->update([
            'tahun' => $request->input('tahun'),
            'nominal' => $request->input('nominal')
        ]);

        if ($spp) {
            return redirect()->route('spp.index')->with(['success' => 'Data SPP berhasil diperbarui!']);
        } else {
            return redirect()->route('spp.index')->with(['error' => 'Data SPP tidak dapat diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $spp = Spp::findOrFail($id);

        // Menghapus data Spp
        $spp->delete();

        if ($spp) {
            return redirect()->route('spp.index')->with(['success' => 'Data SPP berhasil dihapus!']);
        } else {
            return redirect()->route('spp.index')->with(['error' => 'Data SPP gagal dihapus!']);
        }
    }
}
