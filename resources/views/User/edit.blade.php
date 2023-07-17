@extends('layouts.main')
@section('title', '| Edit User')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
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
                                <h3 class="card-title">Edit user</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body full-width">
                                <form action="{{ route('edit_user', $userSelect->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <h3>User</h3>
                                        <div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">Nama Lengkap</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Masukkan nama lengkap" id="name"
                                                            name="name" value="{{ old('name', $userSelect->name) }}" />
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email">E-mail</label>
                                                        <input type="email" class="form-control"
                                                            placeholder="Masukkan email" id="email" name="email"
                                                            value="{{ old('email', $userSelect->email) }}" />
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                @if ($userSelect->role->name == 'guru')
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nip">NIP</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Masukkan nip" id="nip" name="nip"
                                                                value="{{ old('nip', $userSelect->table_detail->nip) }}" />
                                                            @error('nip')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @elseif($userSelect->role->name == 'siswa')
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="nis">NIS</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Masukkan nis" id="nis" name="nis"
                                                                value="{{ old('nis', $userSelect->table_detail->nis) }}" />
                                                            @error('nis')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Masukkan username" id="username"
                                                                name="username"
                                                                value="{{ old('username', $userSelect->username) }}" />
                                                            @error('username')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="role">Role</label>
                                                        <select class="form-control" id="role" name="role">
                                                            <option value="" selected>--Pilih Role--</option>
                                                            @foreach ($list_role as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($item->id == $userSelect->role_id) selected @endif>
                                                                    {{ $item->full_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
