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
            <div class="card">
                <div class="card-header">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#TambahData" class="btn btn-primary btn-sm">New</a>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Kompetensi Keahlian</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kelas as $no => $k)
                                <tr>
                                    <th scope="row">{{ ++$no }}</th>
                                    <td>{{ $k->nama_kelas }}</td>
                                    <td>{{ $k->kompetensi_keahlian }}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" 
                                        data-bs-target="#Edit{{ $k->id }}"
                                        class="btn btn-secondary btn-sm">Edit</a>
                                        <a href="#" data-bs-toggle="modal" 
                                        data-bs-target="#delete{{ $k->id }}"
                                        class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <div>
                                                Data Kelas belum Ada!
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$kelas->links() }}
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kelas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" name="nama_kelas" placeholder="Masukan Nama Kelas dengan Benar">
                        @error('nama_kelas')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kompetensi Keahlian</label>
                        <input type="text" class="form-control @error('kompetensi_keahlian') is-invalid @enderror" name="kompetensi_keahlian" placeholder="Masukan Nama Jurusan dengan Benar">
                        @error('kompetensi_keahlian')
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
</div>
<!-- Modal Edit-->
@foreach ( $kelas as $k )
 <div class="modal fade" id="Edit{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kelas.update', $k->id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" 
                        class="form-control @error('nama_kelas') 
                        is-invalid 
                        @enderror"
                        name="nama_kelas" value="{{ old('nama_kelas', $k->nama_kelas )}}" 
                        placeholder="Masukan Nama Kelas dengan Benar">
                        @error('nama_kelas')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kompetensi Keahlian</label>
                        <input type="text" 
                        class="form-control 
                        @error('kompetensi_keahlian') 
                        is-invalid 
                        @enderror" name="kompetensi_keahlian" value="{{ old('kompetensi_keahlian', $k->kompetensi_keahlian )}}" 
                        placeholder="Masukan Nama Jurusan dengan Benar">
                        @error('kompetensi_keahlian')
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
@endforeach
{{-- Modal Delete --}}
@foreach ($kelas as $k)
<div class="modal fade" id="delete{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- Modal Header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data <b>{{ $k->nama_kelas }}</b>?</p>
            </div>

            {{-- Modal Footer --}}
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endpush