<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pengajuan Dosen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Title -->
        <h2 class="mb-4">History Pengajuan Dosen</h2>

        <!-- Dosen Information -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Informasi Dosen</h5>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Nama: </strong>{{ $dosen->name }}</li>
                    <li class="list-group-item"><strong>Email: </strong>{{ $dosen->email }}</li>
                    <li class="list-group-item"><strong>NIDN: </strong>{{ $dosen->nidn }}</li>
                    <li class="list-group-item"><strong>Status: </strong>{{ ucfirst($dosen->status) }}</li>
                </ul>
            </div>
        </div>

        <!-- Pengajuan Table -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Riwayat Pengajuan</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID Pengajuan</th>
                                <th>Periode</th>
                                <th>Status</th>
                                <th>Tanggal Diajukan</th>
                                <th>Tanggal Disetujui</th>
                                <th>Tanggal Ditolak</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dosen->pengajuan as $pengajuan)
                                <tr>
                                    <td>{{ $pengajuan->id_pengajuan }}</td>
                                    <td>{{ $pengajuan->periode->nama_periode }}</td>
                                    <td>{{ ucfirst($pengajuan->pivot->status) }}</td>
                                    <td>{{ $pengajuan->pivot->tanggal_diajukan ? \Carbon\Carbon::parse($pengajuan->pivot->tanggal_diajukan)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $pengajuan->pivot->tanggal_disetujui ? \Carbon\Carbon::parse($pengajuan->pivot->tanggal_disetujui)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $pengajuan->pivot->tanggal_ditolak ? \Carbon\Carbon::parse($pengajuan->pivot->tanggal_ditolak)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $pengajuan->pivot->pesan ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
