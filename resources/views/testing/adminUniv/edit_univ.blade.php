<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Universitas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Edit Universitas</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form to Edit Universitas -->
    <form action="{{ route('univ.update', $univ->id_universitas) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Universitas -->
        <div class="mb-3">
            <label for="nama_universitas" class="form-label">Nama Universitas</label>
            <input type="text" class="form-control" id="nama_universitas" name="nama_universitas" value="{{ old('nama_universitas', $univ->nama_universitas) }}" required>
        </div>

        <!-- Kota -->
        <div class="mb-3">
            <label for="id_kota" class="form-label">Kota</label>
            <select class="form-select" id="id_kota" name="id_kota" required>
                <option value="">Pilih Kota</option>
                @foreach($kota as $city)
                    <option value="{{ $city->id_kota }}" {{ $univ->id_kota == $city->id_kota ? 'selected' : '' }}>
                        {{ $city->nama_kota }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="1" {{ $univ->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $univ->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Universitas</button>
        <a href="{{ route('univ.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
