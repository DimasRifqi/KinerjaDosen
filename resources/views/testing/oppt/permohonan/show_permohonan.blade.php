<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Permohonan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Detail Permohonan</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Nama Dosen:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $permohonan->user->name }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Universitas:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $permohonan->user->universitas->nama_universitas ?? '-' }} <!-- Asumsi relasi ke universitas -->
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Permohonan:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $permohonan->permohonan }}
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Tanggal Diajukan:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $permohonan->created_at->format('d M Y') }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Status Permohonan:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $permohonan->status ? 'Selesai' : 'Proses' }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                           <a href="{{ route('oppt.indexPermohonan.dosen') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
