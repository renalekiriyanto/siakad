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
                            <a href="{{ route('tambah_user') }}" class="btn btn-primary">Import Guru</a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List semua data user yang terdaftar</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (session('status'))
                                    <div id="session-message" class="alert alert-success alert-dismissible fade show"
                                        role="alert">
                                        <strong>Sukses!</strong> {{ session('status') }}.
                                    </div>
                                    <script>
                                        // Menghilangkan pesan session secara otomatis setelah 3 detik
                                        setTimeout(function() {
                                            var sessionMessage = document.getElementById('session-message');
                                            if (sessionMessage) {
                                                sessionMessage.remove();
                                            }
                                        }, 3000);
                                    </script>
                                @endif
                                @if (session('success'))
                                    <div id="session-message" class="alert alert-success alert-dismissible fade show"
                                        role="alert">
                                        <strong>Sukses!</strong> {{ session('success') }}.
                                    </div>
                                    <script>
                                        // Menghilangkan pesan session secara otomatis setelah 3 detik
                                        setTimeout(function() {
                                            var sessionMessage = document.getElementById('session-message');
                                            if (sessionMessage) {
                                                sessionMessage.remove();
                                            }
                                        }, 3000);
                                    </script>
                                @endif
                                @if (session('error'))
                                    <div id="session-message" class="alert alert-danger alert-dismissible fade show"
                                        role="alert">
                                        <strong>Sukses!</strong> {{ session('error') }}.
                                    </div>
                                    <script>
                                        // Menghilangkan pesan session secara otomatis setelah 3 detik
                                        setTimeout(function() {
                                            var sessionMessage = document.getElementById('session-message');
                                            if (sessionMessage) {
                                                sessionMessage.remove();
                                            }
                                        }, 3000);
                                    </script>
                                @endif
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
                                                    <a href="{{ route('edit_user', $item->id) }}"
                                                        class="btn btn-block btn-success btn-sm">Edit</a>
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
    <div class="modal fade" id="modal-uploadsiswa">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Import Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('import_user_siswa') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
