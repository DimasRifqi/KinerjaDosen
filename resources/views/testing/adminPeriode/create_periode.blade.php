<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Periode</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create New Periode</h1>

        <!-- Display Existing Periode Records in a Table -->
        <h2>All Periode</h2>

        @if($periode->isEmpty())
            <p>No Periode records found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Periode</th>
                        <th>Tipe Periode</th>
                        <th>Masa Periode Awal</th>
                        <th>Masa Periode Akhir</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periode as $item)
                        <tr>
                            <td>{{ $item->id_periode }}</td>
                            <td>{{ $item->nama_periode }}</td>
                            <td>{{ $item->tipe_periode ? 'Semester' : 'Bulanan' }}</td>
                            <td>{{ $item->masa_periode_awal }}</td>
                            <td>{{ $item->masa_periode_berakhir }}</td>
                            <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('periode.edit', $item->id_periode) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

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

        <!-- Form to Create Periode -->
        <h2>Add New Periode</h2>
        <form action="{{ route('periode.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_periode">Nama Periode:</label>
                <input type="text" name="nama_periode" id="nama_periode" class="form-control" value="{{ old('nama_periode') }}" required>
            </div>

            <div class="form-group">
                <label for="tipe_periode">Tipe Periode:</label>
                <select name="tipe_periode" id="tipe_periode" class="form-control" required>
                    <option value="1" {{ old('tipe_periode') == 1 ? 'selected' : '' }}>Semester</option>
                    <option value="0" {{ old('tipe_periode') == 0 ? 'selected' : '' }}>Bulanan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="masa_periode_awal">Masa Periode Awal:</label>
                <input type="date" name="masa_periode_awal" id="masa_periode_awal" class="form-control" value="{{ old('masa_periode_awal') }}" required>
            </div>

            <div class="form-group">
                <label for="masa_periode_akhir">Masa Periode Akhir:</label>
                <input type="date" name="masa_periode_akhir" id="masa_periode_akhir" class="form-control" value="{{ old('masa_periode_akhir') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Periode</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
