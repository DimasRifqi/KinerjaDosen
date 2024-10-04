<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Data Dosen</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('oppt.update.dosen', $dosen->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $dosen->name) }}" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Gelar Depan -->
            <div class="form-group">
                <label for="id_gelar_depan">Gelar Depan</label>
                <select name="id_gelar_depan" class="form-control">
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

            <!-- Gelar Belakang -->
            <div class="form-group">
                <label for="id_gelar_belakang">Gelar Belakang</label>
                <select name="id_gelar_belakang" class="form-control">
                    <option value="">Pilih Gelar Belakang</option>
                    @foreach($gelar_belakang as $gelar)
                        <option value="{{ $gelar->id_gelar_belakang }}" {{ $dosen->id_gelar_belakang == $gelar->id_gelar_belakang ? 'selected' : '' }}>
                            {{ $gelar->nama_gelar_belakang }}
                        </option>
                    @endforeach
                </select>
                @error('id_gelar_belakang')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Jabatan Fungsional -->
            <div class="form-group">
                <label for="id_jabatan_fungsional">Jabatan Fungsional</label>
                <select name="id_jabatan_fungsional" class="form-control">
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
            </div>

            <!-- Pangkat Dosen -->
            <div class="form-group">
                <label for="id_pangkat_dosen">Pangkat Dosen</label>
                <select name="id_pangkat_dosen" class="form-control">
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

            <!-- Universitas -->
            <div class="form-group">
                <label for="id_universitas">Universitas</label>
                <select name="id_universitas" class="form-control">
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

            <!-- No Rekening -->
            <div class="form-group">
                <label for="no_rek">No Rekening</label>
                <input type="text" name="no_rek" class="form-control" value="{{ old('no_rek', $dosen->no_rek) }}" required>
                @error('no_rek')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

             <!-- NIDN -->
             <div class="form-group">
                <label for="nidn">NIDN</label>
                <input type="text" name="nidn" class="form-control" value="{{ old('nidn', $dosen->nidn) }}" required>
                @error('nidn')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- NPWP -->
            <div class="form-group">
                <label for="npwp">NPWP</label>
                <input type="text" name="npwp" class="form-control" value="{{ old('npwp', $dosen->npwp) }}" required>
                @error('npwp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tanggal Lahir -->
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $dosen->tanggal_lahir) }}" required>
                @error('tanggal_lahir')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tempat Lahir -->
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $dosen->tempat_lahir) }}" required>
                @error('tempat_lahir')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="aktif" {{ $dosen->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="non-aktif" {{ $dosen->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                    <option value="pensiun" {{ $dosen->status == 'pensiun' ? 'selected' : '' }}>Pensiun</option>
                    <option value="belajar" {{ $dosen->status == 'belajar' ? 'selected' : '' }}>Belajar</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- File Serdos -->
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

            <!-- Gambar -->
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

            <!-- Submit -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Dosen</button>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
