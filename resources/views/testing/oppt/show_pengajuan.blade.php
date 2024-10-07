<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Detail Pengajuan</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pengajuan</th>
                    <th>ID Periode</th>
                    <th>Awal Periode</th>
                    <th>Akhir Periode</th>
                    <th colspan="2" class="text-center">Dosen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td>{{ $pengajuan->id_pengajuan }}</td>
                  <td>{{ $pengajuan->periode->nama_periode }}</td>
                  <td>{{ $pengajuan->periode->masa_periode_awal }}</td>
                  <td>{{ $pengajuan->periode->masa_periode_berakhir }}</td>
                  <td colspan="2">
                      @foreach ($pengajuan->user as $item)
                        {{ $item->name  }}, <br>
                      @endforeach
                  </td>
                </tr>
            </tbody>
        </table>

        @php
            // Hitung jumlah dokumen yang sudah diupload
            $jumlahDokumen = $pengajuan->pengajuan_dokumen->count();
        @endphp

        <!-- Form untuk mengupdate dokumen -->
        <form action="{{ route('oppt.updateDokumen.dosen', $pengajuan->id_pengajuan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk update -->

            <div class="mb-3">
                <label for="SPTJM" class="form-label">SPTJM (Surat Pertanggung Jawaban Mutlak) (PDF)</label>
                <input type="file" class="form-control" name="SPTJM">
                @if($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPTJM')->first())
                    <small class="form-text">Dokumen yang ada: <a href="{{ Storage::url($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPTJM')->first()->file_dokumen) }}" target="_blank">Lihat Dokumen</a></small>
                @endif
            </div>

            <div class="mb-3">
                <label for="SPPPTS" class="form-label">SPPPTS (Surat Pernyataan Pimpinan PTS) (PDF)</label>
                <input type="file" class="form-control" name="SPPPTS">
                @if($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPPPTS')->first())
                    <small class="form-text">Dokumen yang ada: <a href="{{ Storage::url($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPPPTS')->first()->file_dokumen) }}" target="_blank">Lihat Dokumen</a></small>
                @endif
            </div>

            <div class="mb-3">
                <label for="SPKD" class="form-label">SPKD (Surat Pernyataan Keaslian Dokumen) (PDF)</label>
                <input type="file" class="form-control" name="SPKD">
                @if($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPKD')->first())
                    <small class="form-text">Dokumen yang ada: <a href="{{ Storage::url($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPKD')->first()->file_dokumen) }}" target="_blank">Lihat Dokumen</a></small>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Dokumen</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
