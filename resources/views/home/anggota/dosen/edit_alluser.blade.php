@extends('layouts.home.app')
@section('title', 'Sunting Dosen')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sunting Data {{ $user->name }}</h4>

                    <form class="forms-sample" action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Left Side: Personal Information and Role -->
                            <div class="col-md-6">
                                <h5 class="mb-3">Informasi Pribadi</h5>

                                <div class="form-group">
                                    <label for="gelar_depan">Gelar Depan</label>
                                    <input type="text" name="gelar_depan" class="form-control" value="{{ old('gelar_depan', $user->gelar_depan) }}">
                                    @error('gelar_depan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gelar_belakang">Gelar Belakang</label>
                                    <input type="text" name="gelar_belakang" class="form-control" value="{{ old('gelar_belakang', $user->gelar_belakang) }}">
                                    @error('gelar_belakang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="id_role">Role</label>
                                    <select class="form-control" id="id_role" name="id_role" style="background-color: white; color: black;">
                                        <option value="">Pilih Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id_role }}" {{ $role->id_role == $user->id_role ? 'selected' : '' }}>{{ $role->nama_role }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                                    @error('tempat_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                                    @error('tanggal_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                                </div>

                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <span class="input-group-text" onclick="togglePassword('password', 'togglePasswordIcon1')">
                                            <i class="mdi mdi-eye" id="togglePasswordIcon1"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
                                        <span class="input-group-text" onclick="togglePassword('password_confirmation', 'togglePasswordIcon2')">
                                            <i class="mdi mdi-eye" id="togglePasswordIcon2"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <h5 class="mb-3">Informasi Akademik dan Pekerjaan</h5>

                                <div class="form-group">
                                    <label for="id_jabatan_fungsional">Jabatan Fungsional</label>
                                    <select class="form-control" id="id_jabatan_fungsional" name="id_jabatan_fungsional">
                                        <option value="">Pilih Jabatan Fungsional</option>
                                        @foreach($jabatanFungsional as $jabatan)
                                            <option value="{{ $jabatan->id_jabatan_fungsional }}" {{ $jabatan->id_jabatan_fungsional == $user->id_jabatan_fungsional ? 'selected' : '' }}>{{ $jabatan->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_jabatan_fungsional')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="id_pangkat_dosen">Pangkat Dosen</label>
                                    <select class="form-control" id="id_pangkat_dosen" name="id_pangkat_dosen">
                                        <option value="">Pilih Pangkat Dosen</option>
                                        @foreach($pangkatDosen as $pangkat)
                                            <option value="{{ $pangkat->id_pangkat_dosen }}" {{ $pangkat->id_pangkat_dosen == $user->id_pangkat_dosen ? 'selected' : '' }}>{{ $pangkat->nama_pangkat }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_pangkat_dosen')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="awal_belajar">Awal Belajar</label>
                                    <input type="date" class="form-control" id="awal_belajar" name="awal_belajar" placeholder="Awal Belajar" value="{{ old('awal_belajar', $user->awal_belajar) }}">
                                </div>

                                <div class="form-group">
                                    <label for="akhir_belajar">Akhir Belajar</label>
                                    <input type="date" class="form-control" id="akhir_belajar" name="akhir_belajar" placeholder="Akhir Belajar" value="{{ old('akhir_belajar', $user->akhir_belajar) }}">
                                </div>

                                <div class="form-group">
                                    <label for="id_bank">Bank</label>
                                    <select class="form-control" id="id_bank" name="id_bank">
                                        <option value="">Pilih Bank</option>
                                        @foreach($banks as $bank)
                                            <option value="{{ $bank->id_bank }}" {{ $bank->id_bank == $user->id_bank ? 'selected' : '' }}>{{ $bank->nama_bank }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_bank')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no_rek">No Rekening</label>
                                    <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="No Rekening" value="{{ old('no_rek', $user->no_rek) }}">
                                </div>

                                <div class="form-group">
                                    <label for="id_gapok">Gapok</label>
                                    <select class="form-control" id="id_gapok" name="id_gapok">
                                        <option value="">Pilih Gapok</option>
                                        @foreach($gapoks as $gapok)
                                            <option value="{{ $gapok->id_gapok }}" {{ $gapok->id_gapok == $user->id_gapok ? 'selected' : '' }}>{{ $gapok->golongan }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_bank')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="">Pilih Status</option>
                                        <option value="aktif" {{ old('status', $user->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="non-aktif" {{ old('status', $user->status) == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                                        <option value="pensiun" {{ old('status', $user->status) == 'pensiun' ? 'selected' : '' }}>Pensiun</option>
                                        <option value="belajar" {{ old('status', $user->status) == 'belajar' ? 'selected' : '' }}>Belajar</option>
                                        <option value="belum_serdos" {{ old('status', $user->status) == 'belum_serdos' ? 'selected' : '' }}>Belum Serdos</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <button type="button" class="btn btn-light" onclick="window.location.href='{{ route('admin.index') }}'">Batalkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
