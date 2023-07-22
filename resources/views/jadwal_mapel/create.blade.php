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
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control"
                                                placeholder="Mata Pelajaran" id="mapel" name="mapel" readonly>
                                            <input type="hidden" name="id_mapel" id="id_mapel">
                                            <div class="input-group-append">
                                                <button type="button" data-toggle="modal" data-target="#modal-mapel"
                                                    class="btn btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row" id="card_mapel">
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td>Nama Mata Pelajaran</td>
                                                            <td>:</td>
                                                            <td>
                                                                <span id="span_mapel"></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control form-control" placeholder="Kelas"
                                                id="kelas" name="kelas" readonly>
                                            <input type="hidden" name="id_kelas" id="id_kelas">
                                            <div class="input-group-append">
                                                <button type="button" data-toggle="modal" data-target="#modal-kelas"
                                                    class="btn btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row" id="card_kelas">
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td>Kelas</td>
                                                            <td>:</td>
                                                            <td>
                                                                <span id="nama_kelas"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tahun Ajaran</td>
                                                            <td>:</td>
                                                            <td>
                                                                <span id="tahun_ajaran"></span>
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
                                                <div class="input-group clockpicker">
                                                    <input type="text" class="form-control" value="09:30" id="jam_mulai"
                                                        name="jam_mulai">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Jam Berakhir</label>
                                                <div class="input-group clockpicker">
                                                    <input type="text" class="form-control" value="09:30"
                                                        id="jam_berakhir" name="jam_berakhir">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                                <th>Mata Pelajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_mapel as $item)
                                <tr key={{ $item->id }}>
                                    <td>{{ $item->nama }}</td>
                                    <td class="d-flex align-content-between">
                                        <button class="btn btn-primary btn-sm" onclick="pilihMapel({{ $item->id }})"
                                            data-dismiss="modal">Pilih</button>
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
                    <table id="table_" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_kelas as $item)
                                <tr key={{ $item->id }}>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tahun_ajaran }}</td>
                                    <td class="d-flex align-content-between">
                                        <button class="btn btn-primary btn-sm" onclick="pilihKelas({{ $item->id }})"
                                            data-dismiss="modal">Pilih</button>
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
    <script>
        // Mapel
        let mapel = document.getElementById('mapel');
        let card_mapel = document.getElementById('card_mapel');
        let span_mapel = document.getElementById('span_mapel');
        let id_mapel = document.getElementById('id_mapel');
        // Kelas
        let kelas = document.getElementById('kelas');
        let card_kelas = document.getElementById('card_kelas');
        let nama_kelas = document.getElementById('nama_kelas');
        let tahun_ajaran = document.getElementById('tahun_ajaran');
        let id_kelas = document.getElementById('id_kelas');

        card_mapel.style.display = "none";
        card_kelas.style.display = "none";

        const pilihMapel = async (id) => {
            const res = await axios.get(`/api/getmapel/${id}`);
            mapel.value = res.data.nama;
            if (mapel.value) {
                card_mapel.style.display = "block";
                span_mapel.innerHTML = res.data.nama;
                id_mapel.value = res.data.id;
            } else {
                card_mapel.style.display = "none";
                span_mapel.innerHTML = "";
            }
        }

        const pilihKelas = async (id) => {
            const res = await axios.get(`/api/getkelas/${id}`);
            kelas.value = res.data.nama
            console.log(res.data);
            if (kelas.value) {
                card_kelas.style.display = "block";
                nama_kelas.innerHTML = res.data.nama;
                tahun_ajaran.innerHTML = res.data.tahun_ajaran;
                id_kelas.value = res.data.id;
            } else {
                card_kelas.style.display = "none";
                nama_kelas.innerHTML = "";
                tahun_ajaran.innerHTML = "";
            }
        }
    </script>
@endsection
