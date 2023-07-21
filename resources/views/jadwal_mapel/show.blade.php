@extends('layouts.main')
@section('title', '| Detail Kelas')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Kelas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kelas') }}">Kelas</a></li>
                            <li class="breadcrumb-item active">Detail Kelas</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Detail kelas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <form action="{{ route('mapel.update', $mapel->id) }}" method="post">
                                    @csrf
                                    @method('put') --}}
                                <div class="form-group">
                                    <label for="nama">Nama Kelas</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan nama kelas" value="{{ old('nama', $kelas->nama) }}"
                                        disabled />
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran"
                                        placeholder="Masukkan tahun ajaran"
                                        value="{{ old('tahun_ajaran', $kelas->tahun_ajaran) }}" disabled />
                                    @error('tahun_ajaran')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <a href="{{ route('kelas') }}" class="btn btn-primary">Kembali</a>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
