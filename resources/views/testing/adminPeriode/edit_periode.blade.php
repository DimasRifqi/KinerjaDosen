<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Periode</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Periode</h2>

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

        <!-- Edit form -->
        <form action="{{ route('periode.update', $periode->id_periode) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama Periode -->
            <div class="form-group">
                <label for="nama_periode">Nama Periode:</label>
                <input type="text" name="nama_periode" class="form-control" value="{{ old('nama_periode', $periode->nama_periode) }}" required>
            </div>

            <!-- Tipe Periode -->
            <div class="form-group">
                <label for="tipe_periode">Tipe Periode:</label>
                <select name="tipe_periode" id="tipe_periode" class="form-control" required>
                    <option value="1" {{ $periode->tipe_periode ? 'selected' : '' }}>Semester</option>
                    <option value="0" {{ !$periode->tipe_periode ? 'selected' : '' }}>Bulanan</option>
                </select>
            </div>

            <!-- Masa Periode Awal -->
            <div class="form-group">
                <label for="masa_periode_awal">Masa Periode Awal:</label>
                <input type="date" name="masa_periode_awal" class="form-control" value="{{ old('masa_periode_awal', $periode->masa_periode_awal) }}" required>
            </div>

            <!-- Masa Periode Berakhir -->
            <div class="form-group">
                <label for="masa_periode_berakhir">Masa Periode Berakhir:</label>
                <input type="date" name="masa_periode_berakhir" class="form-control" value="{{ old('masa_periode_berakhir', $periode->masa_periode_berakhir) }}" required>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1" {{ $periode->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$periode->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Periode</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
