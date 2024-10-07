<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jabatan Fungsional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Daftar Jabatan Fungsional</h1>
        <a href="{{ route('jabatan-fungsional.create') }}" class="btn btn-primary mb-3">Tambah Jabatan</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jabatanFungsional as $jabatan)
                    <tr>
                        <td>{{ $jabatan->id_jabatan_fungsional }}</td>
                        <td>{{ $jabatan->nama_jabatan }}</td>
                        <td>
                            <a href="{{ route('jabatan-fungsional.edit', $jabatan->id_jabatan_fungsional) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
