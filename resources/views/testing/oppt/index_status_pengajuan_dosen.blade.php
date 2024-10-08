<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Status Pengajuan Dosen</h2>

        <h4>Periode Pengajuan: {{ $pengajuan->id_periode }}</h4>
        <p><strong>Tanggal Dibuat:</strong> {{ $pengajuan->created_at }}</p>
        <p><strong>Terakhir Diubah:</strong> {{ $pengajuan->updated_at }}</p>

        <h5>Daftar Dosen yang Diajukan:</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Dosen</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Tanggal Diajukan</th>
                    <th>Tanggal Disetujui</th>
                    <th>Tanggal Ditolak</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuan->user as $dosen)
                    <tr>
                        <td>{{ $dosen->name }}</td>
                        <td>{{ $dosen->email }}</td>
                        <td>{{ $dosen->pivot->status }}</td>
                        <td>{{ \Carbon\Carbon::parse($dosen->pivot->created_at)->format('d-m-Y') }} </td>
                        <td>{{ $dosen->pivot->tanggal_disetujui ?? '-' }}</td>
                        <td>{{ $dosen->pivot->tanggal_ditolak ?? '-' }}</td>
                        <td>{{ $dosen['pivot']['pesan'] ?? '-'}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
