@extends('layouts.main')
@section('title', '| Tambah Kelas')
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
                            <li class="breadcrumb-item"><a href="{{ route('mapel') }}">Kelas</a></li>
                            <li class="breadcrumb-item active">Tambah Kelas</li>
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
                                <h3 class="card-title">Tambah kelas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('kelas.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama Kelas</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Masukkan nama kelas" />
                                        @error('nama')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="walikelas">Wali Kelas</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control" placeholder="Wali Kelas"
                                                id="walikelas" name="walikelas" readonly>
                                            <input type="hidden" name="id_walikelas" id="id_walikelas">
                                            <div class="input-group-append">
                                                <button type="button" data-toggle="modal" data-target="#modal-walikelas"
                                                    class="btn btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row" id="card_walikelas">
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td>Nama Wali Kelas</td>
                                                            <td>:</td>
                                                            <td>
                                                                <span id="span_walikelas"></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun_ajaran">Tahun Ajaran</label>
                                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran"
                                            placeholder="Masukkan tahun ajaran" />
                                        @error('tahun_ajaran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
    <div class="modal fade" id="modal-walikelas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mata Pelajaran</h4>
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
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_guru as $item)
                                <tr key={{ $item->user->id }}>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td class="d-flex align-content-between">
                                        <button class="btn btn-primary btn-sm" onclick="pilihGuru({{ $item->id }})"
                                            data-dismiss="modal">Pilih</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $list_guru->links('pagination::bootstrap-5') }}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        let span_walikelas = document.getElementById('span_walikelas');
        let card_walikelas = document.getElementById('card_walikelas');
        let id_walikelas = document.getElementById('id_walikelas');
        let walikelas = document.getElementById('walikelas');

        id_walikelas.value ? card_walikelas.style.display = "block" : card_walikelas.style.display = "none";

        const pilihGuru = async (id) => {
            const res = await axios.get(`/api/getshowguru/${id}`);
            id_walikelas.value = res.data.id;

            span_walikelas.innerHTML = res.data.user.name;
            walikelas.value = res.data.user.name;
            card_walikelas.style.display = "block";
        }
    </script>
@endsection
