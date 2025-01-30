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
                                <th scope="col">Nama Petugas</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $no => $u)
                                <tr>
                                    <th scope="row">{{ ++$no }}</th>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        @if ($u->role == 1)
                                            <button class="btn btn-success btn-sm">Administrator</button>
                                        @else
                                            <button class="btn btn-primary btn-sm">Petugas</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($u->role == 1)
                                            <button class="btn btn-danger btn-sm">Tidak bisa di Akses</button>
                                        @else
                                             <a href="#" data-bs-toggle="modal" 
                                        data-bs-target="#Edit{{ $u->id }}"
                                        class="btn btn-secondary btn-sm">Edit</a>
                                        <a href="#" data-bs-toggle="modal" 
                                        data-bs-target="#delete{{ $u->id }}"
                                        class="btn btn-danger btn-sm">Hapus</a>
                                        @endif
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
                                                Data SPP belum Ada!
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$user->links() }}
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('petugas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Petugas</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan Nama Petugas dengan Benar">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan Email Petugas dengan Benar">
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
                        <label class="form-label">Role</label>
                       <select class="form-select @error('role') is-invalid @enderror" name="role" aria-label="Default select example">
                        <option selected>Pilih Role</option>
                        <option value="1">Administrator</option>
                        <option value="2">Petugas</option>
                        </select>
                        @error('role')
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
@foreach ( $user as $u )
 <div class="modal fade" id="Edit{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Petugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('petugas.update', $u->id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Petugas</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $u->name)}}" placeholder="Masukan Nama Petugas dengan Benar">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email', $u->email)}}" placeholder="Masukan Email Petugas dengan Benar">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                                        <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{ old('password', $u->password)}}" placeholder="Masukan Password dengan Benar">
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                       <select class="form-select @error('role') is-invalid @enderror" name="role" aria-label="Default select example">
                        <option selected>{{ $u->role }}</option>
                        <option value="1">Administrator</option>
                        <option value="2">Petugas</option>
                        </select>
                        @error('role')
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
@foreach ($user as $u)
<div class="modal fade" id="delete{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- Modal Header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Petugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data <b>{{ $u->name }}</b>?</p>
            </div>

            {{-- Modal Footer --}}
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <form action="{{ route('petugas.destroy', $u->id) }}" method="POST">
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
