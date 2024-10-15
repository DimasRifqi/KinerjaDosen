<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar FAQ & Tambah FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Daftar FAQ</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel FAQ -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($faqs as $faq)
                <tr>
                    <td>{{ $faq->id }}</td>
                    <td>{{ $faq->pertanyaan }}</td>
                    <td>{{ $faq->jawaban }}</td>
                    <td>
                        <a href="{{ route('admin.faq.edit', $faq->id_faq) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('admin.faq.delete', $faq->id_faq) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada FAQ</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <hr>

    <h2>Tambah FAQ</h2>

    <!-- Form Tambah FAQ -->
    <form action="{{ route('admin.faq.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="pertanyaan" class="form-label">Pertanyaan</label>
            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan" value="{{ old('pertanyaan') }}" required>
            @error('pertanyaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jawaban" class="form-label">Jawaban</label>
            <input type="text" class="form-control @error('jawaban') is-invalid @enderror" id="jawaban" name="jawaban" value="{{ old('jawaban') }}" required>
            @error('jawaban')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
