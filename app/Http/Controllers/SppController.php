<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $spp = Spp::all();
        return view('spp.index', compact('spp'));
    }

    public function create()
    {
        return view('spp.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nominal' => 'required|integer',
            'tahun' => 'required|digits:4',
        ]);

        Spp::create($validated);
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil ditambahkan.');
    }

    public function edit(Spp $spp)
    {
        return view('spp.edit', compact('spp'));
    }

    public function update(Request $request, Spp $spp)
    {
        $validated = $request->validate([
            'nominal' => 'required|integer',
            'tahun' => 'required|digits:4',
        ]);

        $spp->update($validated);
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil diperbarui.');
    }

    public function destroy(Spp $spp)
    {
        $spp->delete();
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil dihapus.');
    }
}
