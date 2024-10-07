<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gelar Belakang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Gelar Belakang</h1>

        <form action="{{ route('gelar-belakang.update', $gelarBelakang->id_gelar_belakang) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_gelar_belakang" class="form-label">Nama Gelar Belakang</label>
                <input type="text" class="form-control" id="nama_gelar_belakang" name="nama_gelar_belakang" value="{{ $gelarBelakang->nama_gelar_belakang }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" {{ $gelarBelakang->status == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $gelarBelakang->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('gelar.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
