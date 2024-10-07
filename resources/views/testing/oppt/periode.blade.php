<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Periode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Daftar Periode</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Periode</th>
                    <th>Nama Periode</th>
                    <th>Tipe Periode</th>
                    <th>Masa Periode Awal</th>
                    <th>Masa Periode Berakhir</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($periode as $p)
                    <tr>
                        <td>{{ $p->id_periode }}</td>
                        <td>{{ $p->nama_periode }}</td>
                        <td>{{ $p->tipe_periode ? 'Bulanan' : 'Semester' }}</td>
                        <td>{{ $p->masa_periode_awal }}</td>
                        <td>{{ $p->masa_periode_berakhir }}</td>
                        <td>{{ $p->status ? 'Aktif' : 'Non-Aktif' }}</td>
                        <td><a href="{{ route('oppt.pengajuan.dosen', $p->id_periode) }}"> Ajukan</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
