@extends('layouts.main')
@section('title', '| Tambah Jadwal Mata Pelajaran')
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
                            <li class="breadcrumb-item active">Tambah Jadwal Mata Pelajaran</li>
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
                                <form action="{{ route('jadwalmapel.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="hari">Hari</label>
                                        <input type="text" class="form-control" id="hari" name="hari"
                                            placeholder="Masukkan hari" />
                                        @error('hari')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="mapel">Mata Pelajaran</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control"
                                                placeholder="Mata Pelajaran">
                                            <div class="input-group-append">
                                                <button type="button" data-toggle="modal" data-target="#modal-mapel"
                                                    class="btn btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mapel">Kelas</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control" placeholder="Kelas">
                                            <div class="input-group-append">
                                                <button type="button" data-toggle="modal" data-target="#modal-kelas"
                                                    class="btn btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="modal-mapel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" name="search" id="search" placeholder="Cari">
                    </div>
                    <table id="table_" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Hari</th>
                                <th>Jam Mulai</th>
                                <th>Jam Berakhir</th>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_jadwal as $item)
                                <tr key={{ $item->id }}>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tahun_ajaran }}</td>
                                    <td class="d-flex align-content-between">
                                        <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-success">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{ route('kelas.show', $item->id) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('kelas.delete', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-kelas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
