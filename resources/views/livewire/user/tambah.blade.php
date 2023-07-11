<div>
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" wire:model="name"
                                            placeholder="Masukkan nama">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" wire:model="email"
                                            placeholder="Masukkan email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2bs4" wire:model="role">
                                    <option value="" selected>---Pilih Role---</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    @if ($role == 3)
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control" wire:model="nip"
                                                placeholder="Masukkan nip">
                                        </div>
                                    @elseif($role == 4)
                                        <div class="form-group">
                                            <label for="nis">NIS</label>
                                            <input type="text" class="form-control" wire:model="nis"
                                                placeholder="Masukkan nis">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" wire:model="username"
                                                placeholder="Masukkan username">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="{{ $showPassword ? 'text' : 'password' }}" class="form-control"
                                            wire:model="password" placeholder="Masukkan password">
                                    </div>
                                    <div class="form-group">
                                        <div class="">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="showPassword"
                                                    wire:model="showPassword">
                                                <label class="form-check-label" for="showPassword">Lihat
                                                    password</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%"></div>
            </div> --}}
        </div>
    </section>
</div>
