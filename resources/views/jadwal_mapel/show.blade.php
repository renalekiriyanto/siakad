@extends('layouts.main')
@section('title', '| Detail Jadwal Mata Pelajaran')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Jadwal Mata Pelajaran</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('jadwalmapel') }}">Jadwal Mata Pelajaran</a></li>
                            <li class="breadcrumb-item active">Detail Jadwal Mata Pelajaran</li>
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
                                <h3 class="card-title">Tambah jadwal mata pelajaran</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                    <input type="text" class="form-control" id="hari" name="hari"
                                        placeholder="Masukkan hari" value="{{ old('hari', $jadwalmapel->hari) }}"
                                        readonly />
                                    @error('hari')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mapel">Mata Pelajaran</label>
                                    <div class="row" id="card_mapel">
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>Nama Mata Pelajaran</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span id="span_mapel">{{ $jadwalmapel->mapel->nama }}</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <div class="row" id="card_kelas">
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td>Kelas</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span id="nama_kelas">{{ $jadwalmapel->kelas->nama }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tahun Ajaran</td>
                                                        <td>:</td>
                                                        <td>
                                                            <span
                                                                id="tahun_ajaran">{{ $jadwalmapel->kelas->tahun_ajaran }}</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Jam Mulai</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    value="{{ old('jam_mulai', $jadwalmapel->jam_mulai) }}" id="jam_mulai"
                                                    name="jam_mulai" readonly>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Jam Berakhir</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    value="{{ old('jam_berakhir', $jadwalmapel->jam_berakhir) }}"
                                                    id="jam_berakhir" name="jam_berakhir" readonly>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('jadwalmapel') }}" type="submit" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
