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

                        <form class="forms-sample" action="{{ route('super.dosen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Gelar Depan -->
                            <div class="form-group">
                                <label for="id_gelar_depan">Gelar Depan</label>
                                <select class="form-control js-example-basic-multiple w-100" id="id_gelar_depan" name="id_gelar_depan">
                                    <option value="">Pilih Gelar Depan</option>
                                    @foreach($gelarDepan as $gelar)
                                        <option value="{{ $gelar->id_gelar_depan }}">{{ $gelar->nama_gelar_depan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                            </div>

                            <!-- Gelar Belakang -->
                            <div class="form-group">
                                <label for="id_gelar_belakang">Gelar Belakang</label>
                                <select class="form-control js-example-basic-multiple w-100" id="id_gelar_belakang" name="id_gelar_belakang">
                                    <option value="">Pilih Gelar Belakang</option>
                                    @foreach($gelarBelakang as $gelar)
                                        <option value="{{ $gelar->id_gelar_belakang }}">{{ $gelar->nama_gelar_belakang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>

                            <!-- NUPTK -->
                            <div class="form-group">
                                <label for="nidn">NUPTK</label>
                                <input type="text" class="form-control" id="nidn" name="nidn" placeholder="NUPTK">
                            </div>

                            <!-- Jabatan Fungsional -->
                            <div class="form-group">
                                <label for="id_jabatan_fungsional">Jabatan Fungsional</label>
                                <select class="form-control" id="id_jabatan_fungsional" name="id_jabatan_fungsional" required>
                                    <option value="">Pilih Jabatan Fungsional</option>
                                    @foreach($jabatanFungsional as $jabatan)
                                        <option value="{{ $jabatan->id_jabatan_fungsional }}">{{ $jabatan->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Pangkat Dosen -->
                            <div class="form-group">
                                <label for="id_pangkat_dosen">Pangkat Dosen</label>
                                <select class="form-control" id="id_pangkat_dosen" name="id_pangkat_dosen" required>
                                    <option value="">Pilih Pangkat Dosen</option>
                                    @foreach($pangkatDosen as $pangkat)
                                        <option value="{{ $pangkat->id_pangkat_dosen }}">{{ $pangkat->nama_pangkat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Program Studi -->
                            <div class="form-group">
                                <label for="id_prodi">Program Studi</label>
                                <select class="form-control" id="id_prodi" name="id_prodi" required>
                                    <option value="">Pilih Program Studi</option>
                                    @foreach($prodi as $progdi)
                                        <option value="{{ $progdi->id_prodi }}">{{ $progdi->nama_prodi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Universitas -->
                            <div class="form-group">
                                <label for="id_universitas">Universitas</label>
                                <select class="form-control" id="id_universitas" name="id_universitas" required>
                                    <option value="">Pilih Universitas</option>
                                    @foreach($universitas as $univ)
                                        <option value="{{ $univ->id_universitas }}">{{ $univ->nama_universitas }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Upload Foto -->
                            <div class="form-group">
                                <label for="image">Foto</label>
                                <input type="file" class="file-upload-default" id="image" name="image" accept="image/*">
                                <div class="input-group">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>

                            <!-- Upload Sertifikasi Dosen -->
                            <div class="form-group">
                                <label for="file_serdos">File Sertifikasi Dosen</label>
                                <input type="file" class="file-upload-default" id="file_serdos" name="file_serdos" accept=".pdf">
                                <div class="input-group">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File Sertifikasi">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>

                            <!-- NPWP -->
                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP">
                            </div>

                            <!-- No Rekening -->
                            <div class="form-group">
                                <label for="no_rek">No Rekening</label>
                                <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="No Rekening">
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Kata Sandi</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <span class="input-group-text" onclick="togglePassword('password', 'togglePasswordIcon1')">
                                        <i class="mdi mdi-eye" id="togglePasswordIcon1"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password" required>
                                    <span class="input-group-text" onclick="togglePassword('password_confirmation', 'togglePasswordIcon2')">
                                        <i class="mdi mdi-eye" id="togglePasswordIcon2"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("mdi-eye");
            icon.classList.add("mdi-eye-off");
        } else {
            input.type = "password";
            icon.classList.remove("mdi-eye-off");
            icon.classList.add("mdi-eye");
        }
    }
</script>
@endsection
