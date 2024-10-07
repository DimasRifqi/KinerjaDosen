<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pangkat Dosen</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Manage Pangkat Dosen</h1>

    <!-- Display any validation errors -->
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

    <!-- Table to Display All Pangkat Dosen -->
    <h2>List of Pangkat Dosen</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama Pangkat</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pangkat_dosen as $pangkat)
            <tr>
                <td>{{ $pangkat->id_pangkat_dosen }}</td>
                <td>{{ $pangkat->nama_pangkat }}</td>
                <td>
                    <!-- Edit button (Redirect to Edit Page) -->
                    <a href="{{ route('pangkat.edit', $pangkat->id_pangkat_dosen) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Form to Create Pangkat Dosen -->
    <h2 class="mt-4">Add New Pangkat Dosen</h2>
    <form action="{{ route('pangkat.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_pangkat" class="form-label">Nama Pangkat:</label>
            <input type="text" name="nama_pangkat" id="nama_pangkat" class="form-control" value="{{ old('nama_pangkat') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Add Pangkat</button>
    </form>
</div>

<!-- Add Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
