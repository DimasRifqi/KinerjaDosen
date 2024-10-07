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

        @if($jumlahDokumen < 4)
            <!-- Form untuk mengajukan dokumen, jika belum mencapai 3 dokumen -->
            <form action="{{ route('oppt.pengajuanDokumenStore.dosen', $pengajuan->id_pengajuan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="SPTJM" class="form-label">SPTJM (Surat Pertanggung Jawaban Mutlak) (PDF)</label>
                    <input type="file" class="form-control" name="SPTJM" required>
                </div>

                <div class="mb-3">
                    <label for="SPPPTS" class="form-label">SPPPTS (Surat Pernyataan Pimpinan PTS) (PDF)</label>
                    <input type="file" class="form-control" name="SPPPTS" required>
                </div>

                <div class="mb-3">
                    <label for="SPKD" class="form-label">SPKD (Surat Pernyataan Keaslian Dokumen) (PDF)</label>
                    <input type="file" class="form-control" name="SPKD" required>
                </div>

                <div class="mb-3">
                    <label for="SPKD" class="form-label">SPKD (Surat Pernyataan Keaslian Dokumen) (PDF)</label>
                    <input type="file" class="form-control" name="SPKD" required>
                </div>

                <button type="submit" class="btn btn-primary">Ajukan Dokumen</button>
            </form>
        @else
            <!-- Tampilkan link download untuk dokumen yang sudah diupload -->
            <div class="alert alert-info mt-3">
                Anda telah mengupload 4 dokumen. Silakan download dokumen berikut:
            </div>
            <ul class="list-group">
                @foreach ($pengajuan->pengajuan_dokumen as $dokumen)
                    <li class="list-group-item">
                        <a href="{{ Storage::url($dokumen->file_dokumen) }}" target="_blank">
                            {{ $dokumen->nama_dokumen }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
