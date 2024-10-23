<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengajuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Pengajuan</h2>
        <form action="{{ route('oppt.updatePengajuan.dosen', $pengajuan->id_pengajuan) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Select Periode -->
            <div class="mb-3">
                <label for="id_periode" class="form-label">Periode</label>
                <select name="id_periode" id="id_periode" class="form-control" required>
                    @foreach ($periode as $periode)
                        <option value="{{ $periode->id_periode }}"
                            {{ $periode->id_periode == $pengajuan->id_periode ? 'selected' : '' }}>
                            {{ $periode->nama_periode }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Checkbox untuk dosen -->
            <div class="mb-3">
                <label class="form-label">Pilih Dosen</label>
                @foreach ($dosen as $dosen)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dosen_ids[]" value="{{ $dosen->id }}"
                        {{ $pengajuan->user->contains($dosen->id) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $dosen->name }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update Pengajuan</button>
        </form>
    </div>
</body>
</html>
