@extends('layouts.main')
@section('title', '| Tambah User')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
                            <li class="breadcrumb-item active">Tambah User</li>
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
                                <h3 class="card-title">Menambah akun</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="bs-stepper">
                                    <div class="bs-stepper-header" role="tablist">
                                        <!-- your steps here -->
                                        <div class="step" data-target="#users-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="users-part" id="users-part-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Users</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#profile-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="profile-part" id="profile-part-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Profile</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <!-- your steps content here -->
                                        <div id="users-part" class="content" role="tabpanel"
                                            aria-labelledby="users-part-trigger">
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Masukkan nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Masukkan email">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username"
                                                    placeholder="Masukkan username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password"
                                                    placeholder="Password">
                                            </div>
                                            <button class="btn btn-primary" onclick="stepper.next()">Lanjut</button>
                                        </div>
                                        <div id="profile-part" class="content" role="tabpanel"
                                            aria-labelledby="profile-part-trigger">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                                        placeholder="Alamat">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nohp">No. HP</label>
                                                    <input type="text" class="form-control" id="nohp" name="nohp"
                                                        placeholder="No. HP">
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control select2" style="width: 100%;" id="gender"
                                                        name="gender">
                                                        <option selected="selected">--Pilih Gender--</option>
                                                        @foreach ($list_gender as $item)
                                                            <option value="{{ $item['value'] }}">{{ $item['nama'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <select class="form-control select2" style="width: 100%;"
                                                        id="agama" name="agama">
                                                        <option selected="selected">--Pilih Agama--</option>
                                                        @foreach ($list_agama as $item)
                                                            <option value="{{ $item['value'] }}">{{ $item['value'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="tempat_lahir"
                                                        name="tempat_lahir" placeholder="Tempat Lahir">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <div class="input-group date" id="reservationdate"
                                                        data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#reservationdate" id="tanggal_lahir"
                                                            name="tanggal_lahir" />
                                                        <div class="input-group-append" data-target="#reservationdate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="golongan_darah">Golongan Darah</label>
                                                    <input type="text" class="form-control" id="golongan_darah"
                                                        name="golongan_darah" placeholder="Golongan Darah">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary"
                                                onclick="stepper.previous()">Sebelumnya</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
