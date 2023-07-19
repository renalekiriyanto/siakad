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
                        <h1>Manage Permission User</h1>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Management permission users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
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
                                        @foreach ($list_users as $item)
                                            <tr key={{ $item->id }}
                                                class="@if (!$item->is_verified) bg-warning @endif">
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->role->full_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->profile->alamat }}</td>
                                                <td>
                                                    <a href="{{ route('edit_permission_user', $item->id) }}"
                                                        class="btn btn-block btn-success btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                {{ $list_users->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
