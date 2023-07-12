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
                            <div class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <!-- your steps here -->
                                    @foreach ($list_stepper as $item)
                                        <div class="step @if ($item['value'] == $stepper) active @endif "
                                            data-target="#{{ $item['slug'] }}-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="{{ $item['slug'] }}-part"
                                                id="{{ $item['slug'] }}-part-trigger">
                                                <span class="bs-stepper-circle">{{ $item['value'] }}</span>
                                                <span class="bs-stepper-label">{{ $item['name'] }}</span>
                                            </button>
                                        </div>
                                        @if (count($list_stepper) > $item['value'])
                                            <div class="line"></div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            {{-- User --}}
                            @if ($stepper == 1)
                                <div>
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" placeholder="Masukkan nama lengkap"
                                            wire:model="name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" placeholder="Masukkan email"
                                            wire:model="email" />
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" wire:model="role">
                                            @foreach ($roles as $item)
                                                <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($role === 2)
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="nip" class="form-control" placeholder="Masukkan NIP"
                                                wire:model="nip" />
                                        </div>
                                    @elseif($role === 3)
                                        <div class="form-group">
                                            <label for="nis">NIS</label>
                                            <input type="nis" class="form-control" placeholder="Masukkan NIS"
                                                wire:model="nis" />
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="username" class="form-control" placeholder="Masukkan username"
                                                wire:model="username" />
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" placeholder="Masukkan password"
                                                wire:model="password" />
                                        </div>
                                    @endif
                                </div>
                            @endif
                            @if ($stepper == 2)
                                <div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" placeholder="Masukkan alamat"
                                                    wire:model="alamat" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="no_hp">No. HP</label>
                                                <input type="text" class="form-control" placeholder="Masukkan No. HP"
                                                    wire:model="no_hp" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <input type="file" class="form-control" placeholder="Masukkan photo"
                                                    wire:model="photo" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="no_hp">Gender</label>
                                                <select class="form-control" wire:model="gender">
                                                    <option value="">---Pilih Jenis Kelamin---</option>
                                                    @foreach ($list_gender as $item)
                                                        <option value="{{ $item['value'] }}">{{ $item['nama'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan tempat lahir" wire:model="tempat_lahir" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            {{-- <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <div class="input-group date" id="reservationdate"
                                                    data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                        data-target="#reservationdate" />
                                                    <div class="input-group-append" data-target="#reservationdate"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control"
                                                    placeholder="Masukkan tanggal lahir" wire:model="tanggal_lahir" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div>
                                @if ($stepper !== 1)
                                    <button class="btn btn-primary mr-3" wire:click="decrement">Sebelumnya</button>
                                @endif
                                @if ($stepper !== count($list_stepper))
                                    <button class="btn btn-primary" wire:click="increment">Selanjutnya</button>
                                @else
                                    <button class="btn btn-primary" wire:click="store">Submit</button>
                                @endif
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
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    </script>
</div>
