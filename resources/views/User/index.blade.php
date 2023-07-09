@extends('layouts.main')
@section('title', '| Daftar User')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary">Tambah</button>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List semua data user yang terdaftar</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>E-mail</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr key={{ $item->id }}
                                                class="@if (!$item->is_verified) bg-warning @endif">
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->role->full_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->profile->alamat }}</td>
                                                <td>
                                                    <button class="btn btn-block btn-success btn-sm">Edit</button>
                                                    <button type="submit"
                                                        class="btn btn-block btn-{{ $item->is_verified ? 'danger' : 'primary' }} btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#modal-lock-user{{ $item->id }}"><i
                                                            class="fas fa-{{ $item->is_verified ? 'lock' : 'unlock' }}"></i></button>
                                                    {{-- Modal Lock User --}}
                                                    <div class="modal fade" id="modal-lock-user{{ $item->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Konfirmasi Penguncian Akun</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('lock_user', "$item->id") }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="password">Password Konfirmasi
                                                                                Penguncian</label>
                                                                            <input type="password" class="form-control"
                                                                                id="password" name="password"
                                                                                placeholder="Masukkan password">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Kunci
                                                                            Akun</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Modal Lock User --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                {{ $data->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
