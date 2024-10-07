<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Universitas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create New Universitas</h1>

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

        <!-- Table to Display All Universitas -->
        <h2>List of Universitas</h2>
        @if($univ->isEmpty())
            <p>No Universitas records found.</p>
        @else
            <table class="table table-bordered text-center ">
                <thead>
                    <tr>
                        <th>ID Universitas</th>
                        <th>Nama Universitas</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($univ as $uni)
                        <tr>
                            <td>{{ $uni->id_universitas }}</td>
                            <td>{{ $uni->nama_universitas }}</td>
                            <td>{{ $uni->kota ? $uni->kota->nama_kota : 'N/A' }}</td>
                            <td>{{ $uni->status ? 'Active' : 'Inactive' }}</td>
                            <td class="text-center">
                                <a href="{{ route('univ.edit', $uni->id_universitas) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Form to Create Universitas -->
        <h2>Add New Universitas</h2>
        <form action="{{ route('univ.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_univ">Nama Universitas:</label>
                <input type="text" name="nama_univ" id="nama_univ" class="form-control" value="{{ old('nama_universitas') }}" required>
            </div>

            <div class="form-group">
                <label for="id_kota">Kota:</label>
                <select name="id_kota" id="id_kota" class="form-control" required>
                    <option value="">Pilih Kota</option>
                    @foreach($kota as $city)
                        <option value="{{ $city->id_kota }}">{{ $city->nama_kota }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Universitas</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
