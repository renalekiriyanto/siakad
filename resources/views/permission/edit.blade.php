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
                        <div class="mb-3">
                            <a href="" class="btn btn-primary">Tambah</a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Management permission users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('update_user', $user->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="permission">Permission</label>
                                        <select class="select2" multiple="multiple" data-placeholder="Pilih hak akses"
                                            style="width: 100%;" id="permission" name="permission">
                                            @foreach ($list_permission as $item)
                                                <option value="{{ $item->name }}"
                                                    @if ($user->hasPermissionTo($item->name)) selected @endif>{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
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
@endsection
