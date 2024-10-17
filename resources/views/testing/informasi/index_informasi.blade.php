<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form untuk menambah informasi -->
    <div class="card mb-4">
        <div class="card-header">
            <h3>Tambah Informasi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" required>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image_informasi" class="form-label">Image (Optional)</label>
                    <input type="file" class="form-control @error('image_informasi') is-invalid @enderror" id="image_informasi" name="image_informasi">
                    @error('image_informasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Informasi</button>
            </form>
        </div>
    </div>

    <!-- Daftar Informasi yang sudah ada -->
    <div class="card">
        <div class="card-header">
            <h3>Daftar Informasi</h3>
        </div>
        <div class="card-body">
            @if($informasi->isEmpty())
                <p class="text-center">Belum ada informasi yang ditambahkan.</p>
            @else
                <ul class="list-group">
                    @foreach($informasi as $info)
                        <li class="list-group-item">
                            <strong>Deskripsi:</strong> {{ $info->judul }} <br>
                            <strong>Deskripsi:</strong> {{ $info->deskripsi }} <br>
                            @if($info->image_informasi)
                                <img src="{{ asset('storage/' . $info->image_informasi) }}" alt="Image Informasi" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                            <a href="{{ route('admin.informasi.edit', $info->id_informasi) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.informasi.delete', $info->id_informasi) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
