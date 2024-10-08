<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Permohonan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Daftar Permohonan Admin </h4>
                    </div>
                    <div class="card-body">
                        @if($permohonan->isEmpty())
                            <p class="text-center">Tidak ada permohonan yang tersedia.</p>
                        @else
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr class="table-primary">
                                        <th>#</th>
                                        <th>Nama Dosen</th>
                                        <th>Universitas</th>
                                        <th>Permohonan</th>
                                        <th>Status</th>
                                        <th>Tanggal Diajukan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permohonan as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->universitas->nama_universitas ?? '-' }}</td> <!-- Asumsi ada relasi universitas -->
                                            <td>{{ $item->permohonan }}</td>
                                            <td>{{ $item->status ? 'Selesai' : 'Proses' }}</td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td><a href="{{ route('verifikator.permohonan.show', $item->id_permohonan) }}"> Detail</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
