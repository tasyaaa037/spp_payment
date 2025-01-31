@extends('layouts.main')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3 text-end">
                <a href="{{ route('pembayaran.create') }}" class="btn btn-danger btn-sm">Eksport</a>
            </div>
            <div class="card shadow-sm" style="border-radius: 12px; background-color: #f0f8ff;">
                <div class="card-header text-center" style="background-color: #87ceeb; color: #000000; font-weight: bold; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    Rekapitulasi Pembayaran SPP
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead class="text-center" style="background-color: #e0f7ff;">
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Bayar</th>
                                <th>Bulan</th>
                                <th>Tahun || Nominal</th>
                                <th>Jumlah Bayar</th>
                                <th>Sisa Cicilan</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($pembayaran as $no => $p)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $p->siswa->nama }}</td>
                                    <td>{{ $p->tanggal_bayar }}</td>
                                    <td>{{ $p->bulan }}</td>
                                    <td>{{ $p->spp->tahun }} || {{ 'Rp. ' . number_format($p->spp->nominal, 2, ',', '.') }}</td>
                                    <td>{{ 'Rp. ' . number_format($p->total_bayar, 2, ',', '.') }}</td>
                                    <td>
                                        <button class="btn btn-outline-success btn-sm">
                                            {{ 'Rp. ' . number_format($p->spp->nominal - $p->total_bayar, 2, ',', '.') }}
                                        </button>
                                    </td>
                                    <td>{{ $p->nama_penginput }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <div class="alert alert-danger">
                                            <strong>Data pembayaran belum ada!</strong>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $pembayaran->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
