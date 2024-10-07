<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Gelar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Daftar Gelar Depan</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('gelar-depan.create') }}" class="btn btn-primary">Create Gelar Depan</a>
            </div>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Gelar Depan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gelarD as $key => $gelar)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $gelar->nama_gelar_depan }}</td>
                        <td>
                            @if($gelar->status == 1)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('gelar-depan.edit', $gelar->id_gelar_depan) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row mt-5">
            <div class="col-md-6">
                <h2>Daftar Gelar Belakang</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('gelar-belakang.create') }}" class="btn btn-primary">Create Gelar Belakang</a>
            </div>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Gelar Belakang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gelarB as $key => $gelar)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $gelar->nama_gelar_belakang }}</td>
                        <td>
                            @if($gelar->status == 1)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('gelar-belakang.edit', $gelar->id_gelar_belakang) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
