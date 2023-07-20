@extends('layouts.main')
@section('title', '| Daftar Mata Pelajaran')
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
                            <li class="breadcrumb-item active">Mata Pelajaran</li>
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
                                <h3 class="card-title">Management mata pelajaran</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="{{ route('mapel.tambah') }}" class="btn btn-primary btn-sm mb-3">Tambah</a>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_mapel as $item)
                                            <tr key={{ $item->id }}>
                                                <td>{{ $item->nama }}</td>
                                                <td class="d-flex align-content-between">
                                                    <a href="{{ route('mapel.edit', $item->id) }}" class="btn btn-success">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="{{ route('mapel.show', $item->id) }}" class="btn btn-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <form action="{{ route('mapel.delete', $item->id) }}" method="post">
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
                                {{ $list_mapel->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
