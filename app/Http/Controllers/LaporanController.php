<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $laporan = Pembayaran::with('siswa', 'petugas', 'spp')
            ->whereBetween('tgl_bayar', [$validated['start_date'], $validated['end_date']])
            ->get();

        return view('laporan.result', compact('laporan'));
    }
}
