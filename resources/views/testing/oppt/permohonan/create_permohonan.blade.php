<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Permohonan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Buat Permohonan</h2>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Permohonan -->
        <form action="{{ route('oppt.storePermohonan.dosen') }}" method="POST">
            @csrf

            <!-- Select Dosen -->
            <div class="mb-3">
                <label for="id" class="form-label">Pilih Dosen</label>
                <select class="form-select" id="id" name="id" required>
                    <option value="">Pilih Dosen</option>
                    @foreach($dosen as $d)
                        <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->nidn }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Permohonan -->
            <div class="mb-3">
                <label for="permohonan" class="form-label">Permohonan</label>
                <textarea class="form-control" id="permohonan" name="permohonan" rows="4" placeholder="Tuliskan permohonan anda di sini..." required>{{ old('permohonan') }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit Permohonan</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
