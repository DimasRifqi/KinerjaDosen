<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kota</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS untuk memperindah tampilan */
        .container {
            margin-top: 40px;
            max-width: 600px;
        }
        .form-label {
            font-weight: bold;
        }
        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Kota</h1>

    <form action="{{ route('kota.update', $kota->id_kota) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Input Nama Kota -->
        <div class="mb-3">
            <label for="nama_kota" class="form-label">Nama Kota</label>
            <input type="text" name="nama_kota" class="form-control" id="nama_kota" value="{{ $kota->nama_kota }}" required>
        </div>

        <!-- Dropdown Provinsi -->
        <div class="mb-3">
            <label for="id_provinsi" class="form-label">Provinsi</label>
            <select name="id_provinsi" class="form-control" id="id_provinsi">
                <option value="">Pilih Provinsi</option>
                @foreach($provinsi as $prov)
                    <option value="{{ $prov->id_provinsi }}" {{ $kota->id_provinsi == $prov->id_provinsi ? 'selected' : '' }}>
                        {{ $prov->nama_provinsi }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tombol Update & Batal -->
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('kota.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<!-- Bootstrap JS & Popper.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
