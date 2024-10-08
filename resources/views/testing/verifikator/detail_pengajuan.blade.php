<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pengajuan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="h3">
                    Detail Pengajuan untuk Universitas:
                    {{ $pengajuan->user[0]->universitas->nama_universitas ?? 'Tidak Ditemukan' }}
                </h1>

            </div>
            <div class="card-body">
                <h2 class="h5">Informasi Pengajuan</h2>
                <ul class="list-group mb-4">
                    <li class="list-group-item"><strong>ID Periode:</strong> {{ $pengajuan['id_periode'] }}</li>
                    <li class="list-group-item"><strong>Dibuat Pada:</strong> {{ \Carbon\Carbon::parse($pengajuan['created_at'])->format('d-m-Y H:i:s') }}</li>
                </ul>

                <h2 class="h5">Dokumen Pengajuan</h2>
                <ul class="list-group mb-4">
    @foreach ($pengajuan->pengajuan_dokumen as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>{{ $item->nama_dokumen }}</span>
            <a href="{{ Storage::url($item->file_dokumen) }}"
               class="btn btn-sm btn-primary"
               download="{{ $item->nama_dokumen }}">
                Download
            </a>
        </li>
    @endforeach
</ul>


<h2 class="h5">Dosen Terkait</h2>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Status Pengajuan</th>
                <th>Aksi</th>
                <th>Tanggal Diajukan</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Update pesan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuan->user as $user)
                <tr>
                    <td>{{ $user['pivot']['id'] }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ ucfirst($user->pivot->status) }}</td>
                    <td>
                        <!-- Form untuk memperbarui status pengajuan -->
                        <form action="{{ route('verifikator.pengajuanStatus.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Dropdown untuk memilih status baru -->
                            <div class="input-group">
                                <select name="status" class="form-control">
                                    <option value="diajukan" {{ $user['pivot']['status'] == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
                                    <option value="disetujui" {{ $user['pivot']['status'] == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                    <option value="ditolak" {{ $user['pivot']['status'] == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($user['pivot']['tanggal_diajukan'])->format('d-m-Y') }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['pivot']['pesan'] }}</td>

                    <td>
                        <!-- Form for updating the pesan field -->
                        <form action="{{ route('verifikator.pesanPengajuan.store', $user->id) }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <textarea name="pesan" class="form-control">{{ $user->pivot->pesan }}</textarea>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm">Update Pesan</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
