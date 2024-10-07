<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Dosen</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($dosen->isEmpty())
            <div class="alert alert-warning">
                Tidak ada dosen yang ditemukan.
            </div>
        @else
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NIDN</th>
                        <th>Universitas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosen as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>

                        <td> {{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nidn }}</td>
                        <td>{{ $item->universitas->nama_universitas }}</td>
                        <td>
                            <span class="badge bg-{{ $item->status == 'aktif' ? 'success' : ($item->status == 'non-aktif' ? 'danger' : ($item->status == 'pensiun' ? 'secondary' : 'warning')) }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('oppt.updateStatus.dosen', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Dropdown untuk memilih status -->
                                <div class="input-group">
                                    <select name="status" class="form-select">
                                        <option value="aktif" {{ $item->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="non-aktif" {{ $item->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                                        <option value="pensiun" {{ $item->status == 'pensiun' ? 'selected' : '' }}>Pensiun</option>
                                        <option value="belajar" {{ $item->status == 'belajar' ? 'selected' : '' }}>Belajar</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('oppt.edit.dosen', $item->id)  }}"> Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
