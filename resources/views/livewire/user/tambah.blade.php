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
                        <form wire:submit.prevent="store">
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
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Nama Lengkap</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan nama lengkap" wire:model="name" />
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="email">E-mail</label>
                                                    <input type="email" class="form-control"
                                                        placeholder="Masukkan email" wire:model="email" />
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <select class="form-control" wire:model="role">
                                                        <option value="">---Pilih Role---</option>
                                                        @foreach ($roles as $item)
                                                            <option value="{{ $item->id }}">{{ $item->full_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('role')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                @if ($role == 2)
                                                    <div class="form-group">
                                                        <label for="nip">NIP</label>
                                                        <input type="nip" class="form-control"
                                                            placeholder="Masukkan NIP" wire:model="nip"
                                                            maxlength="18" />
                                                        @error('nip')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                @endif
                                                @if ($role == 1)
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="username" class="form-control"
                                                            placeholder="Masukkan username" wire:model="username" />
                                                        @error('username')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Masukkan password" wire:model="password" />
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($stepper == 2)
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan alamat" wire:model="alamat" />
                                                    @error('alamat')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="no_hp">No. HP</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan No. HP" wire:model="no_hp" />
                                                    @error('no_hp')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="photo">Photo</label>
                                                    <input type="file" class="form-control"
                                                        placeholder="Masukkan photo" wire:model="photo" />
                                                    @error('photo')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" wire:model="gender">
                                                        <option value="">---Pilih Jenis Kelamin---</option>
                                                        @foreach ($list_gender as $item)
                                                            <option value="{{ $item['value'] }}">{{ $item['nama'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('gender')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan tempat lahir"
                                                        wire:model="tempat_lahir" />
                                                    @error('tempat_lahir')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control"
                                                        placeholder="Masukkan tanggal lahir"
                                                        wire:model="tanggal_lahir" />
                                                    @error('tanggal_lahir')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="agama">Agama</label>
                                                    <select class="form-control" wire:model="agama" id="agama">
                                                        <option value="">---Pilih Agama---</option>
                                                        @foreach ($list_agama as $item)
                                                            <option value="{{ $item['value'] }}">{{ $item['value'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('agama')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if ($role == 2)
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="nik">NIK</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Masukkan NIK" wire:model="nik"
                                                            maxlength="16" />
                                                        @error('nik')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                @if ($stepper == 3)
                                    {{-- Guru --}}
                                    @if ($role == 2)
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nuptk">NUPTK</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan NUPTK" wire:model="nuptk"
                                                        maxlength="16" />
                                                    @error('nuptk')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nrg">NRG</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan NRG" wire:model="nrg" maxlength="12" />
                                                    @error('nrg')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="pangkat">Pangkat</label>
                                                    <select class="form-control" id="pangkat" wire:model="pangkat">
                                                        <option value="">---Pilih Jenis Pangkat---</option>
                                                        @foreach ($list_pangkat as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('pangkat')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="golongan">Golongan</label>
                                                    <select class="form-control" id="golongan"
                                                        wire:model="golongan">
                                                        <option value="">---Pilih Jenis Golongan---</option>
                                                        @foreach ($list_golongan as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->pangkat }} - {{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('golongan')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="jabatan">Jabatan</label>
                                                    <select class="form-control" id="jabatan" wire:model="jabatan">
                                                        <option value="">---Pilih Jenis Jabatan---</option>
                                                        @foreach ($list_jabatan as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('jabatan')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="pendidikan">Pendidikan Terakhir</label>
                                                    <select class="form-control" id="pendidikan"
                                                        wire:model="pendidikan">
                                                        <option value="">---Pilih Jenis Pendidikan Terakhir---
                                                        </option>
                                                        @foreach ($list_pendidikan as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->pangkat }} - {{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('pendidikan')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nis">NIS</label>
                                                    <input type="nis" class="form-control"
                                                        placeholder="Masukkan NIS" wire:model="nis" maxlength="10" />
                                                    @error('nis')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nisn">NISN</label>
                                                    <input type="nisn" class="form-control"
                                                        placeholder="Masukkan NISN" wire:model="nisn"
                                                        maxlength="10" />
                                                    @error('nisn')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama_ayah">Nama Ayah</label>
                                                    <input type="nama_ayah" class="form-control"
                                                        placeholder="Masukkan nama ayah" wire:model="nama_ayah"
                                                        maxlength="10" />
                                                    @error('nama_ayah')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama_ibu">Nama Ibu</label>
                                                    <input type="nama_ibu" class="form-control"
                                                        placeholder="Masukkan nama ibu" wire:model="nama_ibu"
                                                        maxlength="10" />
                                                    @error('nama_ibu')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="alamat_ayah">Alamat Ayah</label>
                                                    <input type="alamat_ayah" class="form-control"
                                                        placeholder="Masukkan alamat ayah" wire:model="alamat_ayah"
                                                        maxlength="10" />
                                                    @error('alamat_ayah')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="alamat_ibu">Alamat Ibu</label>
                                                    <input type="alamat_ibu" class="form-control"
                                                        placeholder="Masukkan alamat ibu" wire:model="alamat_ibu"
                                                        maxlength="10" />
                                                    @error('alamat_ibu')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nik_ayah">NIK Ayah</label>
                                                    <input type="nik_ayah" class="form-control"
                                                        placeholder="Masukkan nik ayah" wire:model="nik_ayah"
                                                        maxlength="10" />
                                                    @error('nik_ayah')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nik_ibu">NIK Ibu</label>
                                                    <input type="nik_ibu" class="form-control"
                                                        placeholder="Masukkan nik ibu" wire:model="nik_ibu"
                                                        maxlength="10" />
                                                    @error('nik_ibu')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Pekerjaan Ayah</label>
                                                    <select class="form-control" wire:model="pekerjaan_ayah">
                                                        <option value="">---Pilih Pekerjaan---</option>
                                                        @foreach ($list_pekerjaan as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('pekerjaan_ayah')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Pekerjaan Ibu</label>
                                                    <select class="form-control" wire:model="pekerjaan_ibu">
                                                        <option value="">---Pilih Pekerjaan---</option>
                                                        @foreach ($list_pekerjaan as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('pekerjaan_ibu')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                <div>
                                    @if ($stepper !== 1)
                                        <button type="button" class="btn btn-primary mr-3"
                                            wire:click="decrement">Sebelumnya</button>
                                    @endif
                                    @if ($stepper !== count($list_stepper))
                                        <button type="button" class="btn btn-primary"
                                            wire:click="increment">Selanjutnya</button>
                                    @else
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
