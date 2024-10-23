<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <h1>Form import excel</h1>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('bkd.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
    <div class="mb-3">
        <label for="id_periode" class="form-label">Pilih Periode</label>
        <select class="form-control" id="id_periode" name="id_periode" required>
            @foreach($periode as $periode)
                <option value="{{ $periode->id_periode }}">{{ $periode->nama_periode }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">File Excel</label>
        <input class="form-control" type="file" id="file" name="file" required>
    </div>
    <button type="submit" class="btn btn-primary">Import</button>
            </form>

            <form action="{{ route('dosen.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">File Data Dosen Excel</label>
                    <input class="form-control" type="file" id="file" name="file" required>
                </div>

                <button type="submit" class="btn btn-primary">Import Dosen</button>
            </form>

            <form action="{{ route('gapok.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">File Data Gapok Excel</label>
                    <input class="form-control" type="file" id="file" name="file" required>
                </div>

                <button type="submit" class="btn btn-primary">Import Gapok</button>
            </form>

            <form action="{{ route('span.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">File Data Span Excel</label>
                    <input class="form-control" type="file" id="file" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Import Span</button>
            </form>

            <form action="{{ route('univ.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">File Univ Span Excel</label>
                    <input class="form-control" type="file" id="file" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Import Univ</button>
            </form>


        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
