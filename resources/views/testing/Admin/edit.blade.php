<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit User</h1>

        <form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_role" class="form-label">Role</label>
                <select class="form-select" id="id_role" name="id_role" required>
                    <option value="">Pilih Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id_role }}" {{ $role->id_role == $user->id_role ? 'selected' : '' }}>
                            {{ $role->nama_role }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_jabatan_fungsional" class="form-label">Jabatan Fungsional</label>
                <select class="form-select" id="id_jabatan_fungsional" name="id_jabatan_fungsional" required>
                    <option value="">Pilih Jabatan Fungsional</option>
                    @foreach($jabatanFungsional as $jabatan)
                        <option value="{{ $jabatan->id_jabatan_fungsional }}" {{ $jabatan->id_jabatan_fungsional == $user->id_jabatan_fungsional ? 'selected' : '' }}>
                            {{ $jabatan->nama_jabatan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_universitas" class="form-label">Universitas</label>
                <select class="form-select" id="id_universitas" name="id_universitas" required>
                    <option value="">Pilih Universitas</option>
                    @foreach($universitas as $uni)
                        <option value="{{ $uni->id_universitas }}" {{ $uni->id_universitas == $user->id_universitas ? 'selected' : '' }}>
                            {{ $uni->nama_universitas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_prodi" class="form-label">Program Studi</label>
                <select class="form-select" id="id_prodi" name="id_prodi" required>
                    <option value="">Pilih Program Studi</option>
                    @foreach($prodi as $program)
                        <option value="{{ $program->id_prodi }}" {{ $program->id_prodi == $user->id_prodi ? 'selected' : '' }}>
                            {{ $program->nama_prodi }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_pangkat_dosen" class="form-label">Pangkat Dosen</label>
                <select class="form-select" id="id_pangkat_dosen" name="id_pangkat_dosen" required>
                    <option value="">Pilih Pangkat Dosen</option>
                    @foreach($pangkatDosen as $pangkat)
                        <option value="{{ $pangkat->id_pangkat_dosen }}" {{ $pangkat->id_pangkat_dosen == $user->id_pangkat_dosen ? 'selected' : '' }}>
                            {{ $pangkat->nama_pangkat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_gelar_depan" class="form-label">Gelar Depan</label>
                <select class="form-select" id="id_gelar_depan" name="id_gelar_depan">
                    <option value="">Pilih Gelar Depan</option>
                    @foreach($gelarDepan as $gelar)
                        <option value="{{ $gelar->id_gelar_depan }}" {{ $gelar->id_gelar_depan == $user->id_gelar_depan ? 'selected' : '' }}>
                            {{ $gelar->nama_gelar_depan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_gelar_belakang" class="form-label">Gelar Belakang</label>
                <select class="form-select" id="id_gelar_belakang" name="id_gelar_belakang">
                    <option value="">Pilih Gelar Belakang</option>
                    @foreach($gelarBelakang as $gelar)
                        <option value="{{ $gelar->id_gelar_belakang }}" {{ $gelar->id_gelar_belakang == $user->id_gelar_belakang ? 'selected' : '' }}>
                            {{ $gelar->nama_gelar_belakang }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
            </div>

            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
            </div>

            <div class="mb-3">
                <label for="no_rek" class="form-label">No Rekening</label>
                <input type="text" class="form-control" id="no_rek" name="no_rek" value="{{ old('no_rek', $user->no_rek) }}">
            </div>

            <div class="mb-3">
                <label for="npwp" class="form-label">NPWP</label>
                <input type="text" class="form-control" id="npwp" name="npwp" value="{{ old('npwp', $user->npwp) }}">
            </div>

            <div class="mb-3">
                <label for="nidn" class="form-label">NIDN</label>
                <input type="text" class="form-control" id="nidn" name="nidn" value="{{ old('nidn', $user->nidn) }}">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="">Pilih Status</option>
                    <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="non-aktif" {{ $user->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                    <option value="pensiun" {{ $user->status == 'pensiun' ? 'selected' : '' }}>Pensiun</option>
                    <option value="belajar" {{ $user->status == 'belajar' ? 'selected' : '' }}>Belajar</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                @if($user->image)
                    <img src="{{ asset('storage/img/foto_users/' . $user->image) }}" alt="User Image" class="mt-2" style="max-width: 100px;">
                @endif
            </div>

            <div class="mb-3">
                <label for="file_serdos" class="form-label">File Serdos (PDF)</label>
                <input type="file" class="form-control" id="file_serdos" name="file_serdos" accept="application/pdf">
                @if($user->file_serdos)
                    <a href="{{ asset('storage/file/file_serdos/' . $user->file_serdos) }}" target="_blank">Lihat File Serdos</a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
