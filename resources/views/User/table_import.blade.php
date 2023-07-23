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
                            <a href="{{ route('tambah_user') }}" class="btn btn-primary">Tambah</a>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-uploadsiswa">Import
                                Siswa</button>
                            <a href="{{ route('tambah_user') }}" class="btn btn-primary">Tambah</a>
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
                                        @foreach ($data as $items)
                                            @foreach ($items as $item)
                                                <tr key="{{ $item[0] }}">
                                                    <td>{{ $item[1] }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
