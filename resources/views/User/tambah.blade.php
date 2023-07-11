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

        <livewire:user.tambah />
    </div>
    <script>
        let role = document.getElementById('role')
        let guruStepperHeader = document.getElementById('guruStepperHeader')
        let siswaStepperHeader = document.getElementById('siswaStepperHeader')
        let divProfile = document.getElementById('divProfile')

        guruStepperHeader.style.display = 'none';
        siswaStepperHeader.style.display = 'none';
        divProfile.style.display = 'none';

        role.addEventListener('change', () => {
            // Guru
            if (role.value == 3) {
                divProfile.style.display = 'block';

                guruStepperHeader.style.display = 'block';
                siswaStepperHeader.style.display = 'none';
            }
            // Siswa
            else if (role.value == 4) {
                divProfile.style.display = 'block';
                guruStepperHeader.style.display = 'none';
                siswaStepperHeader.style.display = 'block';
            } else {
                divProfile.style.display = 'none';
                guruStepperHeader.style.display = 'none';
                siswaStepperHeader.style.display = 'none';
            }
        })
    </script>
@endsection
