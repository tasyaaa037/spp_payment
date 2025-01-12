<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('siswa', 'petugas', 'spp')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $petugas = Petugas::all();
        $spp = Spp::all();
        return view('pembayaran.create', compact('siswa', 'petugas', 'spp'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_petugas' => 'required|exists:petugas,id_petugas',
            'nisn' => 'required|exists:siswa,nisn',
            'tgl_bayar' => 'required|date',
            'bulan_dibayar' => 'required|string|max:8',
            'tahun_dibayar' => 'required|string|max:4',
            'id_spp' => 'required|exists:spp,id_spp',
            'jumlah_bayar' => 'required|integer',
        ]);

        Pembayaran::create($validated);
        return redirect()->route('pembayaran.index')->with('success', 'Transaksi pembayaran berhasil ditambahkan.');
    }

    public function history($nisn)
    {
        $pembayaran = Pembayaran::where('nisn', $nisn)->with('spp', 'petugas')->get();
        return view('pembayaran.history', compact('pembayaran'));
    }
}
