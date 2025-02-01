@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
        @endif
         @if ($message = Session::get('update'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
        @endif
        @if ($message = Session::get('delete'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
        @endif
        <div class="col-md-8">
            <div class="card" style="background-color: #f0f8ff; border-radius: 12px;">
                <div class="card-header" style="background-color: #87ceeb; font-weight: bold; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#TambahData" class="btn btn-primary btn-sm">New</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nisn || Nis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa as $no => $s)
                                <tr>
                                    <th scope="row">{{ ++$no }}</th>
                                    <td>{{ $s->nisn }} | {{ $s->nis }}</td>
                                    <td>{{ $s->nama}}</td>
                                    <td>{{ $s->kelas->nama_kelas}}</td>
                                    <td>{{ $s->no_hp}}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" 
                                        data-bs-target="#Edit{{ $s->id }}"
                                        class="btn btn-secondary btn-sm">Edit</a>
                                        <a href="#" data-bs-toggle="modal" 
                                        data-bs-target="#Lihat{{ $s->id }}"
                                        class="btn btn-warning btn-sm">Detail</a>
                                        <a href="#" data-bs-toggle="modal" 
                                        data-bs-target="#delete{{ $s->id }}"
                                        class="btn btn-danger btn-sm">Hapus</a><br>
                                        <div class="dropdown mt-1">
                                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                Status SPP
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="{{ route('pembayaran.show', $s->id )}}">Riwayat</a></li>
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#bayar{{ $s->id }}">Bayar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <div>
                                                Data Siswa belum Ada!
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$siswa->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modal')
<!-- Modal Tambah Data -->
<div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukan Nama Siswa dengan Benar">
                        @error('nama')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan Email dengan Benar">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan Password dengan Benar">
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nisn</label>
                        <input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn" placeholder="Masukan Nisn dengan Benar">
                        @error('nisn')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label class="form-label">Nis</label>
                        <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis" placeholder="Masukan Nis dengan Benar">
                        @error('nis')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                      <select class="form-select @error('kelas_id') is-invalid @enderror" name="kelas_id" aria-label="Pilih Kelas">
                        <option selected>Open this select menu</option>
                        @foreach ($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kelas}}</option>
                        @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="Masukan Nomor dengan Benar">
                        @error('no_hp')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Masukan Alamat"></textarea>
                        @error('alamat')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilih Masa SPP</label>
                      <select class="form-select @error('spp_id') is-invalid @enderror" name="spp_id" aria-label="Pilih Tagihan SPP">
                        <option selected>Open this select menu</option>
                        @foreach ($spp as $s)
                        <option value="{{ $s->id }}">{{ $s->tahun}}</option>
                        @endforeach
                        </select>
                        @error('spp_id')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit-->
@foreach ( $siswa as $s )
<div class="modal fade" id="Edit{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswa.update', $s->id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $s->nama)}}" placeholder="Masukan Nama Siswa dengan Benar">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">NISN</label>
                        <input type="number" class="form-control" value="{{ $s->nisn }}" disabled>
                        <input type="hidden" name="nisn" value="{{ $s->nisn }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="number" class="form-control" value="{{ $s->nis }}" disabled>
                        <input type="hidden" name="nis" value="{{ $s->nis }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select class="form-select @error('kelas_id') is-invalid @enderror" name="kelas_id">
                            <option disabled selected>Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" @selected($k->id == $s->kelas_id)>{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', $s->no_hp)}}" placeholder="Masukan Nomor dengan Benar">
                        @error('no_hp')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3">{{ old('alamat', $s->alamat) }}</textarea>
                        @error('alamat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pilih Masa SPP</label>
                        <select class="form-select @error('spp_id') is-invalid @enderror" name="spp_id">
                            <option disabled selected>Pilih Masa SPP</option>
                            @foreach ($spp as $sp)
                                <option value="{{ $sp->id }}" @selected($sp->id == $s->spp_id)>{{ $sp->tahun}}</option>
                            @endforeach
                        </select>
                        @error('spp_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endforeach


<!-- Modal Tampil -->
@foreach ( $siswa as $s )
<div class="modal fade" id="Lihat{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Siswa</strong> : {{ $s->nama }}</p>
                <p><strong>Nisn / Nis</strong> : {{ $s->nisn }} | {{ $s->nis }}</p>
                <p><strong>Alamat</strong> : {{ $s->alamat }}</p>
                <p><strong>No Hp</strong> : {{ $s->no_hp }}</p>
                <p><strong>Kelas</strong> : {{ $s->Kelas->nama_kelas }}</p>
                <p><strong>Data Tahun Pembayaran Spp</strong> : {{ $s->spp->tahun }}</p>
                <p><strong>Data Nominal Pembayaran Spp</strong> : {{ 'Rp. ' . number_format($s->spp->nominal, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div> 
@endforeach

{{-- Modal Delete --}}
@foreach ($siswa as $s)
<div class="modal fade" id="delete{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- Modal Header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data <b>{{ $s->nama }}</b>?</p>
            </div>

            {{-- Modal Footer --}}
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <form action="{{ route('siswa.destroy', $s->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Bayar-->
@foreach ( $siswa as $s )
<div class="modal fade" id="bayar{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pembayaran.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $s->nama)}}" placeholder="Masukan Nama Siswa dengan Benar" readonly>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control @error('siswa_id') is-invalid @enderror" name="siswa_id" value="{{ old('siswa_id', $s->id)}}" hidden>
                        @error('siswa_id')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Bayar</label>
                        <input type="date" class="form-control @error('tanggal_bayar') is-invalid @enderror" name="tanggal_bayar"  placeholder="Masukan Tanggal Bayar dengan Benar">
                        @error('tanggal_bayar')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bulan</label>
                        <select class="form-select @error('bulan') is-invalid @enderror" name="bulan" aria-label="Pilih Bulan Pembayaran">
                            <option selected>Masukan Bulan Pembayaran</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                        @error('bulan')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SPP</label>
                        <select class="form-select @error('spp_id') is-invalid @enderror"  name="spp_id" aria-label="Pilih Masa SPP">
                            @foreach ($spp as $s)
                                <option value="{{ $s->id }}">{{ 'Rp. ' . number_format($s->nominal, 2, ',', '.') }}</option>
                            @endforeach
                        </select>
                        @error('spp_id')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Administrator</label>
                        <input type="text" 
                        class="form-control @error('nama_penginput') is-invalid @enderror" name="nama_penginput" value="{{ Auth::user()->name }}" placeholder="Masukan Nama Adminintrator dengan Benar" readonly>
                        @error('nama_penginput')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endforeach
@endpush

<style>
    /* Styling untuk modal */
    .modal-content {
        background-color: #f0f8ff; /* Soft Blue */
        border-radius: 15px; /* Rounded corners */
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); /* Soft shadow */
        border: 1px solid #87ceeb; /* Blue border */
    }

    .modal-header {
        background-color: #87ceeb; /* Soft Blue header */
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .modal-title {
        font-weight: bold;
        font-size: 1.25rem;
    }

    .modal-body {
        font-size: 16px;
        color: #333;
    }

    .modal-body p {
        margin-bottom: 10px;
    }

    .modal-body p strong {
        color: #007bff;
    }

    .btn-close {
        color: #fff;
        background-color: transparent;
        border: none;
    }

    .btn-close:hover {
        color: #fff;
        background-color: #005f6b;
        border-radius: 50%;
    }
</style>