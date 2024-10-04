<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Tambah User</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                    </div>

                    <div class="form-group">
                        <label for="id_role">Role</label>
                        <select class="form-control" id="id_role" name="id_role" required>
                            <option value="">Pilih Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id_role }}">{{ $role->nama_role }}</option>
                            @endforeach
                        </select>
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
                        <label for="id_universitas">Universitas</label>
                        <select class="form-control" id="id_universitas" name="id_universitas" required>
                            <option value="">Pilih Universitas</option>
                            @foreach($universitas as $univ)
                                <option value="{{ $univ->id_universitas }}">{{ $univ->nama_universitas }}</option>
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
                        <label for="id_pangkat_dosen">Pangkat Dosen</label>
                        <select class="form-control" id="id_pangkat_dosen" name="id_pangkat_dosen" required>
                            <option value="">Pilih Pangkat Dosen</option>
                            @foreach($pangkatDosen as $pangkat)
                                <option value="{{ $pangkat->id_pangkat_dosen }}">{{ $pangkat->nama_pangkat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_gelar_depan">Gelar Depan</label>
                        <select class="form-control" id="id_gelar_depan" name="id_gelar_depan">
                            <option value="">Pilih Gelar Depan</option>
                            @foreach($gelarDepan as $gelar)
                                <option value="{{ $gelar->id_gelar_depan }}">{{ $gelar->nama_gelar_depan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_gelar_belakang">Gelar Belakang</label>
                        <select class="form-control" id="id_gelar_belakang" name="id_gelar_belakang">
                            <option value="">Pilih Gelar Belakang</option>
                            @foreach($gelarBelakang as $gelar)
                                <option value="{{ $gelar->id_gelar_belakang }}">{{ $gelar->nama_gelar_belakang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                    </div>

                    <div class="form-group">
                        <label for="no_rek">No Rekening</label>
                        <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="No Rekening">
                    </div>

                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP">
                    </div>

                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" class="form-control" id="nidn" name="nidn" placeholder="NIDN">
                    </div>

                    <div class="form-group">
                        <label for="file_serdos">File Sertifikasi Dosen</label>
                        <input type="file" class="form-control" id="file_serdos" name="file_serdos" accept=".pdf">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="non-aktif">Non-Aktif</option>
                            <option value="pensiun">Pensiun</option>
                            <option value="belajar">Belajar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
