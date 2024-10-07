    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Prodi</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Display Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table to Display All Prodi -->
        <h2 class="mb-4">List of Prodi</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID Prodi</th>
                    <th>Nama Prodi</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prodi as $item)
                    <tr>
                        <td>{{ $item->id_prodi }}</td>
                        <td>{{ $item->nama_prodi }}</td>
                        <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <!-- Edit and Delete actions -->
                            <a href="{{ route('prodi.edit', $item->id_prodi) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Form to Create New Prodi -->
        <h2 class="mt-5 mb-4">Add New Prodi</h2>
        <form action="{{ route('prodi.create') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_prodi" class="form-label">Nama Prodi:</label>
                <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="{{ old('nama_prodi') }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="1" selected>Active</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Prodi</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
