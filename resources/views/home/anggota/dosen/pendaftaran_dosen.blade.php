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
                                <label for="gelar_depan">Gelar Depan</label>
                                <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" value="{{ old('gelar_depan') }}">
                            </div>



                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                            </div>

                            <!-- Gelar Belakang -->
                            <div class="form-group">
                                <label for="gelar_belakang">Gelar Belakang</label>
                                <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" value="{{ old('gelar_belakang') }}">
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

                            <div class="form-group">
                                <label for="masa_kerja">Masa Kerja</label>
                                <input type="text" class="form-control" name="masa_kerja" id="masa_kerja" placeholder="Masa Kerja">
                            </div>

                            <div class="form-group">
                                <label for="awal_belajar">Awal Belajar</label>
                                <input type="date" class="form-control" name="awal_belajar" id="awal_belajar" placeholder="Awal Belajar">
                            </div>

                            <div class="form-group">
                                <label for="akhir_belajar">Akhir Belajar</label>
                                <input type="date" class="form-control" name="akhir_belajar" id="akhir_belajar" placeholder="Akhir Belajar">
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
                                <label for="image">Foto Profil</label>
                                <input type="file" name="image" class="form-control">
                               
                            </div>

                            <div class="form-group">
                                <label for="tipe_dosen">Tipe Dosen</label>
                                    {{-- @foreach ($dosen as $item)
                                        <option value="{{ $item->tipe_dosen }}">{{ $item->name }}</option>
                                    @endforeach --}}
                                    <select name="tipe_dosen" id="tipe_dosen" class="form-control">
                                        <option value="">Pilih Tipe Dosen</option>
                                            <option value="pns-gb">PNS Guru Besar</option>
                                            <option value="pns-profesi">PNS Profesi</option>
                                            <option value="non-gb">Non Guru Besar</option>
                                            <option value="non-profesi">Non Profesi</option>
                                        
                                </select>
                            </div>

                            <!-- Upload Sertifikasi Dosen -->
                            <div class="form-group">
                                <label for="file_serdos">File Sertifikasi Dosen</label>
                                <input type="file" name="file_serdos" class="form-control" accept="application/pdf">                               
                            </div>

                            <div class="form-group">
                                <label for="no_serdos">Nomor Sertifikasi Dosen</label>
                                <input type="text" class="form-control" id="no_serdos" name="no_serdos" placeholder="Nomor Sertifikasi Dosen">
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

                            <div class="form-group">
                                <label for="nama_rekening">Nama Rekening</label>
                                <input type="text" class="form-control" id="nama_rekening" name="nama_rekening" placeholder="No Rekening">
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
