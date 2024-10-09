@extends('layouts.home.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Pengajuan Semester</h4>
                        <p class="card-description">
                            Tidak ada pengajuan yang tercatat. </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> ID Pengajuan </th>
                                    <th> ID Periode </th>
                                    <th> Awal Periode </th>
                                    <th> Akhir Periode </th>
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
                                            {{ $item->name }}, <br>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @php
                            // Hitung jumlah dokumen yang sudah diupload
                            $jumlahDokumen = $pengajuan->pengajuan_dokumen->count();
                        @endphp
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Perbarui Dokumen</h4>
                        <div class="row">
                            @if ($jumlahDokumen < 4)
                                <form action="{{ route('oppt.pengajuanDokumenStore.dosen', $pengajuan->id_pengajuan) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- Menggunakan metode PUT untuk update -->

                                    <div class="form-group">
                                        <label for="SPTJM">SPTJM (Surat Pertanggung Jawaban Mutlak) (PDF)</label>
                                        <input type="file" class="form-control" name="SPTJM" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="SPPPTS" class="form-label">SPPPTS (Surat Pernyataan Pimpinan PTS)
                                            (PDF)</label>
                                        <input type="file" class="form-control" name="SPPPTS" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="SPKD" class="form-label">SPKD (Surat Pernyataan Keaslian Dokumen)
                                            (PDF)</label>
                                        <input type="file" class="form-control" name="SPKD" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="SPKD" class="form-label">SPKD (Surat Pernyataan Keaslian Dokumen)
                                            (PDF)</label>
                                        <input type="file" class="form-control" name="SPKD" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary mb-2">Ajukan Periode</button>
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
                            @if (session('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
