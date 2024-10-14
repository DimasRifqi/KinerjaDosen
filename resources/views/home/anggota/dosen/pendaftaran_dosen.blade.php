@extends('layouts.home.app')
@section('title', 'Pendaftaran Dosen')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pendaftaran Dosen</h4>

                        <form class="forms-sample" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id_gelar_depan">Gelar Depan</label>
                                            <select class="form-control js-example-basic-multiple w-100" multiple="multiple" id="id_gelar_depan" name="id_gelar_depan">
                                                <option value="">Pilih Gelar Depan</option>
                                                @foreach($gelarDepan as $gelar)
                                                    <option value="{{ $gelar->id_gelar_depan }}">{{ $gelar->nama_gelar_depan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id_gelar_belakang">Gelar Belakang</label>
                                            <select class="form-control js-example-basic-multiple w-100" multiple="multiple" id="id_gelar_belakang" name="id_gelar_belakang">
                                                <option value="">Pilih Gelar Depan</option>
                                                    @foreach($gelarDepan as $gelar)
                                                        <option value="{{ $gelar->id_gelar_depan }}">{{ $gelar->nama_gelar_depan }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>

                            <div class="form-group">
                                <label for="nidn">NUPTK</label>
                                <input type="text" class="form-control" id="nidn" name="nidn" placeholder="NUPTK">
                            </div>

                            <div class="form-group">
                                <label for="id_jabatan_fungsional">Jabatan Fungsional</label>
                                <select class="form-control" id="id_jabatan_fungsional" name="id_jabatan_fungsional" required>
                                    <option value="">Pilih Jabatan Fungsional</option>
                                    @foreach($jabatanFungsional as $jabatan)
                                        <option value="{{ $jabatan->id_jabatan_fungsional }}">{{ $jabatan->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_pangkat_dosen">Pangkat Dosen</label>
                                <select class="form-control" id="id_pangkat_dosen" name="id_pangkat_dosen" required>
                                    <option value="">Pilih Pangkat Dosen</option>
                                    @foreach($pangkatDosen as $pangkat)
                                        <option value="{{ $pangkat->id_pangkat_dosen }}">{{ $pangkat->nama_pangkat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_prodi">Program Studi</label>
                                <select class="form-control" id="id_prodi" name="id_prodi" required>
                                    <option value="">Pilih Program Studi</option>
                                    @foreach($prodi as $progdi)
                                        <option value="{{ $progdi->id_prodi }}">{{ $progdi->nama_prodi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_universitas">Universitas</label>
                                <select class="form-control" id="id_universitas" name="id_universitas" required>
                                    <option value="">Pilih Universitas</option>
                                    @foreach($universitas as $univ)
                                        <option value="{{ $univ->id_universitas }}">{{ $univ->nama_universitas }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Foto</label>
                                <input type="file" class="file-upload-default" accept="image/*">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" id="image" name="image[]"  accept="image/*">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file_serdos">File Sertifikasi Dosen</label>
                                <input type="file" class="file-upload-default" accept=".pdf">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File" id="file_serdos" name="file_serdos[]"  accept=".pdf">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP">
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
