<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengajuan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Pengajuan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pengajuan</th>
                    <th>Periode</th>
                    <th>Draft</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diperbarui</th>
                    <th>Daftar Pengguna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuan as $item)
                    <tr>
                        <td>{{ $item->id_pengajuan }}</td>
                        <td>{{ $item->periode->nama_periode }}</td>
                        <td>{{ $item->draft }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <ul>
                                @foreach($item->user as $user)
                                    <li>
                                        <strong>Nama:</strong> {{ $user->name }} <br>
                                        <strong>Email:</strong> {{ $user->email }} <br>
                                        <strong>Status:</strong> {{ $user->pivot->status }} <br>
                                        <strong>Tanggal Diajukan:</strong> {{ $user->pivot->tanggal_diajukan ?? '-' }} <br>
                                        <strong>Tanggal Disetujui:</strong> {{ $user->pivot->tanggal_disetujui ?? '-' }} <br>
                                        <hr>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('verifikator.pengajuan.show', $item->id_pengajuan) }}">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
