    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Pengajuan Dokumen</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-4">
            <h2>Form Pengajuan Dokumen Semester</h2>

            <form action="{{ route('oppt.pengajuanSemesterStore.dosen') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name='id_pengajuan' value="{{ $pengajuan->id_pengajuan }}">
                <h4>Dokumen untuk Setiap Dosen:</h4>
                @foreach ($pengajuan->user as $dosen)
                    <div class="mb-4">
                        <h5>{{ $dosen->name }}</h5>

                        @php
                            $documents = $dosenDocuments[$dosen->id] ?? null;
                        @endphp

                        {{-- SPTJM Dosen --}}
                        @if ($documents && $documents->where('nama_dokumen', 'sptjm_dosen')->first())
                            <p>SPTJM Dosen: 
                                <a href="{{ asset('storage/' . $documents->where('nama_dokumen', 'sptjm_dosen')->first()->file_dokumen) }}" target="_blank">View File</a>
                                <input type="file" class="form-control" name="sptjm[{{ $dosen->id }}]" placeholder="Upload SPTJM Dosen (PDF)">
                            </p>
                        @else
                            <div class="mb-3">
                                <label for="sptjm_{{ $dosen->id }}" class="form-label">SPTJM Dosen (PDF)</label>
                                <input type="file" class="form-control" name="sptjm[{{ $dosen->id }}]">
                            </div>
                        @endif

                        {{-- SPTJM Pemenuhan Kewajiban Khusus (SPKK) --}}
                        @if ($documents && $documents->where('nama_dokumen', 'spkk')->first())
                            <p>SPTJM Pemenuhan Kewajiban Khusus (SPKK): 
                                <a href="{{ asset('storage/' . $documents->where('nama_dokumen', 'spkk')->first()->file_dokumen) }}" target="_blank">View File</a>
                            </p>
                        @else
                            <div class="mb-3">
                                <label for="spkk_{{ $dosen->id }}" class="form-label">SPTJM Pemenuhan Kewajiban Khusus (PDF)</label>
                                <input type="file" class="form-control" name="spkk[{{ $dosen->id }}]">
                            </div>
                        @endif
                        <input type="hidden" name="dosen_ids[]" value="{{ $dosen->id }}">
                    </div>
                @endforeach


                <h4>Dokumen untuk Semua Dosen:</h4>

                @php
                    $sp_pts = $sharedDocuments->where('nama_dokumen', 'SP PTS')->first();
                    $spkd = $sharedDocuments->where('nama_dokumen', 'SPKD')->first();
                @endphp

                {{-- Surat Pernyataan Pimpinan PTS (SP PTS) --}}
                @if ($sp_pts)
                    <p>Surat Pernyataan Pimpinan PTS (PDF): 
                        <a href="{{ asset('storage/' . $sp_pts->file_dokumen) }}" target="_blank">View File</a>
                    </p>
                @else
                    <div class="mb-3">
                        <label for="sp_pts" class="form-label">Surat Pernyataan Pimpinan PTS (PDF)</label>
                        <input type="file" class="form-control" name="sp_pts">
                    </div>
                @endif

                {{-- Surat Pernyataan Kesediaan Dokumen --}}
                @if ($spkd)
                    <p>Surat Pernyataan Kesediaan Dokumen (PDF): 
                        <a href="{{ asset('storage/' . $spkd->file_dokumen) }}" target="_blank">View File</a>
                    </p>
                @else
                    <div class="mb-3">
                        <label for="spkd" class="form-label">Surat Pernyataan Kesediaan Dokumen (PDF)</label>
                        <input type="file" class="form-control" name="spkd">
                    </div>
                @endif


                <button type="submit" class="btn btn-primary">Ajukan Dokumen</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
