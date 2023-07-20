@extends('layouts.main')
@section('title', '| Detail Mata Pelajaran')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Mata Pelajaran</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('mapel') }}">Mata Pelajaran</a></li>
                            <li class="breadcrumb-item active">Detail Mata Pelajaran</li>
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
                                <h3 class="card-title">Detail mata pelajaran</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <form action="{{ route('mapel.update', $mapel->id) }}" method="post">
                                    @csrf
                                    @method('put') --}}
                                <div class="form-group">
                                    <label for="nama">Nama Mata Pelajaran</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan nama mata pelajaran" value="{{ old('nama', $mapel->nama) }}"
                                        disabled />
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <a href="{{ route('mapel') }}" class="btn btn-primary">Kembali</a>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
