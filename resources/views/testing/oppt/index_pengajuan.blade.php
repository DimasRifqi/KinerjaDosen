<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Daftar Pengajuan</h2>

        <table class="table table-bordered">
            @foreach ($pengajuan as $pengajuan)
            <thead>
                <tr>
                    <th>ID Pengajuan</th>
                    <th>Nama Periode</th>
                    <th>Awal Periode</th>
                    <th>Akhir Periode</th>
                    <th>Jenis Periode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                  <td>{{ $pengajuan->id_pengajuan }}</td>
                  <td>{{ $pengajuan->periode->nama_periode }}</td>
                  <td>{{ $pengajuan->periode->masa_periode_awal }}</td>
                  <td>{{ $pengajuan->periode->masa_periode_berakhir }}</td>
                  <td>{{ $pengajuan->periode->tipe_periode ? 'Bulanan' : 'Semester' }}</td>
                  <td>
                    @if ($pengajuan->periode->tipe_periode == true)
                    <a href="{{ route('oppt.pengajuanShow.dosen', $pengajuan->id_pengajuan) }}" class="btn btn-primary">Ajukan Dokumen Bulanan</a>
                    @else
                    <a href="{{ route('oppt.pengajuanSemesterShow.dosen', $pengajuan->id_pengajuan) }}" class="btn btn-success">Ajukan Dokumen Semester</a>
                    @endif

                </td>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
