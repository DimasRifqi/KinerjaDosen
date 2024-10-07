<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kota</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS untuk mempercantik tampilan */
        .container {
            margin-top: 40px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4">Daftar Kota</h1>

    <!-- Tombol Tambah Kota -->
    <a href="{{ route('kota.create') }}" class="btn btn-primary mb-3">Tambah Kota</a>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data Kota -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Kota</th>
                <th>Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kota as $item)
                <tr>
                    <td>{{ $item->id_kota }}</td>
                    <td>{{ $item->nama_kota }}</td>
                    <td>{{ $item->provinsi->nama_provinsi ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('kota.edit', $item->id_kota) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS & Popper.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
