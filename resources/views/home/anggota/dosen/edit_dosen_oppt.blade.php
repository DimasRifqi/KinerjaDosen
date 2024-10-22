@extends('layouts.home.app')
@section('title', 'Sunting Dosen')
@section('userTypeOnPage', 'SuperAdmin, OPPT')
@section('content')
<div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sunting Data Dosen</h4>

                        <form class="forms-sample" action="{{ route('oppt.update.dosen', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                           
                                
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id_gelar_depan">Gelar Depan</label>
                                            <select class="form-control js-example-basic-multiple w-100" multiple="multiple" id="id_gelar_depan" name="id_gelar_depan">
                                                <option value="">Pilih Gelar Depan</option>
                                                @foreach($gelar_depan as $gelar)
                                                    <option value="{{ $gelar->id_gelar_depan }}" {{ $dosen->id_gelar_depan == $gelar->id_gelar_depan ? 'selected' : '' }}>
                                                        {{ $gelar->nama_gelar_depan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_gelar_depan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> --}}

                                   
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name', $dosen->name) }}" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    

                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id_gelar_belakang">Gelar Belakang</label>
                                            <select class="form-control js-example-basic-multiple w-100" multiple="multiple" id="id_gelar_belakang" name="id_gelar_belakang">
                                                <option value="">Pilih Gelar Belakang</option>
                                                    @foreach($gelar_depan as $gelar)
                                                        <option value="{{ $gelar->id_gelar_depan }}">{{ $gelar->nama_gelar_depan }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                
                           

                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir', $dosen->tempat_lahir) }}">
                                @error('tempat_lahir')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $dosen->tanggal_lahir) }}">
                                @error('tanggal_lahir')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nidn">NUPTK</label>
                                <input type="text" class="form-control" id="nidn" name="nidn" placeholder="NUPTK"  value="{{ old('nidn', $dosen->nidn) }}" required>
                            </div>
<!-- 
                            <div class="form-group">
                                <label for="id_jabatan_fungsional">Jabatan Fungsional</label>
                                <select class="form-control" id="id_jabatan_fungsional" name="id_jabatan_fungsional">
                                <option value="">Pilih Jabatan Fungsional</option>
                                    @foreach($jabatan_fungsional as $jabatan)
                                        <option value="{{ $jabatan->id_jabatan_fungsional }}" {{ $dosen->id_jabatan_fungsional == $jabatan->id_jabatan_fungsional ? 'selected' : '' }}>
                                            {{ $jabatan->nama_jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_jabatan_fungsional')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> -->

                            <div class="form-group">
                                <label for="id_pangkat_dosen">Pangkat Dosen</label>
                                <select class="form-control" id="id_pangkat_dosen" name="id_pangkat_dosen">
                                    <option value="">Pilih Pangkat Dosen</option>
                                    @foreach($pangkat_dosen as $pangkat)
                                        <option value="{{ $pangkat->id_pangkat_dosen }}" {{ $dosen->id_pangkat_dosen == $pangkat->id_pangkat_dosen ? 'selected' : '' }}>
                                            {{ $pangkat->nama_pangkat }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_pangkat_dosen')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- gabisa edit prodi tp bisa edit univ??? -->
                            {{-- <div class="form-group">
                                <label for="id_prodi">Program Studi</label> 
                                <select class="form-control" id="id_prodi" name="id_prodi" required>
                                    <option value="">Pilih Program Studi</option>
                                    @foreach($prodi as $progdi)
                                        <option value="{{ $progdi->id_prodi }}">{{ $progdi->nama_prodi }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label for="id_universitas">Universitas</label>
                                <select class="form-control" id="id_universitas" name="id_universitas" disabled>
                                    <option value="">Pilih Universitas</option>
                                    @foreach($universitas as $uni)
                                        <option value="{{ $uni->id_universitas }}" {{ $dosen->id_universitas == $uni->id_universitas ? 'selected' : '' }}>
                                            {{ $uni->nama_universitas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_universitas')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Foto Profil</label>
                                <input type="file" name="image" class="form-control">
                                @if ($dosen->image)
                                    <p>Foto saat ini: <img src="{{ asset('storage/'.$dosen->image) }}" alt="Foto Dosen" width="150"></p>
                                @endif
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="file_serdos">File Serdos (PDF)</label>
                                <input type="file" name="file_serdos" class="form-control">
                                @if ($dosen->file_serdos)
                                    <p>File saat ini: <a href="{{ asset('storage/'.$dosen->file_serdos) }}" target="_blank">Lihat File</a></p>
                                @endif
                                @error('file_serdos')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP" value="{{ old('npwp', $dosen->npwp) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="bank">bank</label>
                                <select class="form-control" id="bbank" name="bank">
                                    <option value="bri">BRI</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="no_rek">No Rekening</label>
                                <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="No Rekening">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Kata Sandi</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <span class="input-group-text" onclick="togglePassword('password', 'togglePasswordIcon1')">
                                        <i class="mdi mdi-eye" id="togglePasswordIcon1"></i> <!-- Icon mata untuk password -->
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                                    <span class="input-group-text" onclick="togglePassword('password_confirmation', 'togglePasswordIcon2')">
                                        <i class="mdi mdi-eye" id="togglePasswordIcon2"></i> <!-- Icon mata untuk konfirmasi password -->
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection