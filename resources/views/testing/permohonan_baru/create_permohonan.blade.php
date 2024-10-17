<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Permohonan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Create Permohonan</h2>
    @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
              </div>
                 @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('oppt.permohonan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="id">Dosen</label>
            <select class="form-control" id="id" name="id">
                <option value="">Select Dosen</option>
                @foreach($dosen as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Name Input -->
        <div class="form-group">
            <label for="name_baru">Name</label>
            <input type="text" class="form-control" id="name_baru" name="name_baru" value="{{ old('name_baru') }}" >
        </div>


        <!-- Tempat Lahir Input -->
        <div class="form-group">
            <label for="tempat_lahir_baru">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir_baru" name="tempat_lahir_baru" value="{{ old('tempat_lahir_baru') }}">
        </div>

        <!-- Tanggal Lahir Input -->
        <div class="form-group">
            <label for="tanggal_lahir_baru">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir_baru" name="tanggal_lahir_baru" value="{{ old('tanggal_lahir_baru') }}">
        </div>

        <!-- Tanggal Lahir Input -->
        <div class="form-group">
            <label for="awal_kerja_baru">Awal Kerja</label>
            <input type="date" class="form-control" id="awal_kerja_baru" name="awal_kerja_baru" value="{{ old('awal_kerja_baru') }}">
        </div>

        <!-- NPWP Input -->
        <div class="form-group">
            <label for="npwp_baru">NPWP</label>
            <input type="text" class="form-control" id="npwp_baru" name="npwp_baru" value="{{ old('npwp_baru') }}">
        </div>

        <!-- NIDN Input -->
        <div class="form-group">
            <label for="nidn_baru">NIDN</label>
            <input type="text" class="form-control" id="nidn_baru" name="nidn_baru" value="{{ old('nidn_baru') }}">
        </div>

        <!-- No Rekening Input -->
        <div class="form-group">
            <label for="no_rek_baru">No Rekening</label>
            <input type="text" class="form-control" id="no_rek_baru" name="no_rek_baru" value="{{ old('no_rek_baru') }}">
        </div>

        <!-- No Rekening Input -->
        <div class="form-group">
            <label for="nama_rekening_baru">Nama Rekening</label>
            <input type="text" class="form-control" id="nama_rekening_baru" name="nama_rekening_baru" value="{{ old('nama_rekening_baru') }}">
        </div>

        <!-- Email Input -->
        <div class="form-group">
            <label for="email_baru">Email</label>
            <input type="email" class="form-control" id="email_baru" name="email_baru" value="{{ old('email_baru') }}" >
        </div>

        <!-- Password Input -->
        <div class="form-group">
            <label for="password_baru">Password</label>
            <input type="password" class="form-control" id="password_baru" name="password_baru" >
        </div>

        <div class="form-group">
            <label for="password_baru_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_baru_confirmation" name="password_baru_confirmation" >
        </div>

        <!-- Jabatan Fungsional Select -->
        <div class="form-group">
            <label for="id_jabatan_fungsional_baru">Jabatan Fungsional</label>
            <select class="form-control" id="id_jabatan_fungsional_baru" name="id_jabatan_fungsional_baru">
                <option value="">Select Jabatan Fungsional</option>
                @foreach($jabatanFungsional as $jabatan)
                    <option value="{{ $jabatan->id_jabatan_fungsional }}">{{ $jabatan->nama_jabatan }}</option>
                @endforeach
            </select>
        </div>

        <!-- Bank Select -->
        <div class="form-group">
            <label for="id_bank">Bank</label>
            <select class="form-control" id="id_bank_baru" name="id_bank_baru">
                <option value="">Select bank</option>
                @foreach($bank as $b)
                    <option value="{{ $b->id_bank }}">{{ $b->nama_bank }}</option>
                @endforeach
            </select>
        </div>

        <!-- Universitas Select -->
        <div class="form-group">
            <label for="id_universitas_baru">Universitas</label>
            <select class="form-control" id="id_universitas_baru" name="id_universitas_baru">
                <option value="">Select Universitas</option>
                @foreach($universitas as $univ)
                    <option value="{{ $univ->id_universitas }}">{{ $univ->nama_universitas }}</option>
                @endforeach
            </select>
        </div>

        <!-- Prodi Select -->
        <div class="form-group">
            <label for="id_prodi_baru">Prodi</label>
            <select class="form-control" id="id_prodi_baru" name="id_prodi_baru">
                <option value="">Select Prodi</option>
                @foreach($prodi as $prd)
                    <option value="{{ $prd->id_prodi }}">{{ $prd->nama_prodi }}</option>
                @endforeach
            </select>
        </div>

        <!-- Pangkat Dosen Select -->
        <div class="form-group">
            <label for="id_pangkat_dosen_baru">Pangkat Dosen</label>
            <select class="form-control" id="id_pangkat_dosen_baru" name="id_pangkat_dosen_baru">
                <option value="">Select Pangkat Dosen</option>
                @foreach($pangkatDosen as $pangkat)
                    <option value="{{ $pangkat->id_pangkat_dosen }}">{{ $pangkat->nama_pangkat }}</option>
                @endforeach
            </select>
        </div>

        <!-- Gelar Depan Select -->
        <div class="form-group">
            <label for="id_gelar_depan_baru">Gelar Depan</label>
            <select class="form-control" id="id_gelar_depan_baru" name="id_gelar_depan_baru">
                <option value="">Select Gelar Depan</option>
                @foreach($gelarDepan as $gelar)
                    <option value="{{ $gelar->id_gelar_depan }}">{{ $gelar->nama_gelar_depan }}</option>
                @endforeach
            </select>
        </div>

        <!-- Gelar Belakang Select -->
        <div class="form-group">
            <label for="id_gelar_belakang_baru">Gelar Belakang</label>
            <select class="form-control" id="id_gelar_belakang_baru" name="id_gelar_belakang_baru">
                <option value="">Select Gelar Belakang</option>
                @foreach($gelarBelakang as $gelar)
                    <option value="{{ $gelar->id_gelar_belakang }}">{{ $gelar->nama_gelar_belakang }}</option>
                @endforeach
            </select>
        </div>

        <!-- File Upload for Serdos -->
        <div class="form-group">
            <label for="file_serdos_baru">File Serdos</label>
            <input type="file" class="form-control-file" id="file_serdos_baru" name="file_serdos_baru">
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label for="image_baru">Upload Image</label>
            <input type="file" class="form-control-file" id="image_baru" name="image_baru">
        </div>

        <!-- File Upload for Lampiran -->
        <div class="form-group">
            <label for="lampiran_permohonan">Lampiran permohonan</label>
            <input type="file" class="form-control-file" id="lampiran_permohonan" name="lampiran_permohonan">
        </div>

        <!-- Status Select -->
        <div class="form-group">
            <label for="status_baru">Status</label>
            <select class="form-control" id="status_baru" name="status_baru">
                <option value="aktif">Aktif</option>
                <option value="non-aktif">Non-Aktif</option>
                <option value="pensiun">Pensiun</option>
                <option value="belajar">Belajar</option>
            </select>
        </div>

        <!-- Permohonan Description -->
        <div class="form-group">
            <label for="permohonan">Permohonan Description</label>
            <textarea class="form-control" id="permohonan" name="permohonan" rows="3">{{ old('permohonan') }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit Permohonan</button>
    </form>
</div>

    </body>
</html>
