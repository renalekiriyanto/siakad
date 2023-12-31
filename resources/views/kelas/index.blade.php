@extends('layouts.main')
@section('title', '| Daftar Kelas')
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
                            <li class="breadcrumb-item active">Kelas</li>
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
                                <h3 class="card-title">Management kelas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="{{ route('kelas.tambah') }}" class="btn btn-primary btn-sm mb-3">Tambah</a>
                                @if (session('success'))
                                    <div id="session-message" class="alert alert-success alert-dismissible fade show"
                                        role="alert">
                                        <strong>Sukses!</strong> {{ session('success') }}
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
                                @if (session('warning'))
                                    <div id="session-message" class="alert alert-warning alert-dismissible fade show"
                                        role="alert">
                                        <strong>Peringatan!</strong> {{ session('warning') }}
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
                                        <strong>Peringatan!</strong> {{ session('error') }}
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
                                            <th>Tahun Ajaran</th>
                                            <th>Wali Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_kelas as $item)
                                            <tr key={{ $item->id }}>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->tahun_ajaran }}</td>
                                                <td>{{ $item->walikelas->user->name }}</td>
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
                                <br>
                                {{ $list_kelas->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
