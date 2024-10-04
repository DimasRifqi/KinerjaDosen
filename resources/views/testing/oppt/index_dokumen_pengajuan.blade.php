<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengajuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Buat Pengajuan</h2>
        <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="id_periode" class="form-label">Periode</label>
                <select name="id_periode" id="id_periode" class="form-control" required>
                    @foreach ($periodes as $periode)
                        <option value="{{ $periode->id_periode }}">{{ $periode->nama_periode }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="dokumen1" class="form-label">Dokumen 1 (PDF/JPG/JPEG/PNG)</label>
                <input type="file" class="form-control" name="dokumen1" required>
            </div>

            <div class="mb-3">
                <label for="dokumen2" class="form-label">Dokumen 2 (PDF/JPG/JPEG/PNG)</label>
                <input type="file" class="form-control" name="dokumen2" required>
            </div>

            <div class="mb-3">
                <label for="dokumen3" class="form-label">Dokumen 3 (PDF/JPG/JPEG/PNG)</label>
                <input type="file" class="form-control" name="dokumen3" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajukan</button>
        </form>
    </div>
</body>
</html>
