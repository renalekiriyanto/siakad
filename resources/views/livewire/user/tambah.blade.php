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
                                        <div class="line"></div>
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
                                    <button class="btn btn-primary" wire:click="increment">Selanjutnya</button>
                                </div>
                            @endif
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
