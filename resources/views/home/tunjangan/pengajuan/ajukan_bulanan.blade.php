@extends('layouts.home.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Pengajuan Bulanan</h4>
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
                            <form action="{{ route('oppt.updateDokumen.dosen', $pengajuan->id_pengajuan) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Menggunakan metode PUT untuk update -->

                                <div class="form-group">
                                    <label for="SPTJM">SPTJM (Surat Pertanggung Jawaban Mutlak) (PDF)</label>
                                    <input type="file" name="SPTJM" class="form-control">
                                    @if ($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPTJM')->first())
                                        <small class="form-text">Dokumen yang ada: <a
                                                href="{{ Storage::url($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPTJM')->first()->file_dokumen) }}"
                                                target="_blank">Lihat Dokumen</a></small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="SPPPTS">SPPPTS (Surat Pernyataan Pimpinan PTS) (PDF)</label>
                                    <input type="file" name="SPPPTS" class="form-control">
                                    @if ($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPPPTS')->first())
                                        <small class="form-text">Dokumen yang ada: <a
                                                href="{{ Storage::url($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPPPTS')->first()->file_dokumen) }}"
                                                target="_blank">Lihat Dokumen</a></small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="SPKD">SPKD (Surat Pernyataan Keaslian Dokumen) (PDF)</label>
                                    <input type="file" name="SPKD" class="form-control">
                                    @if ($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPKD')->first())
                                        <small class="form-text">Dokumen yang ada: <a
                                                href="{{ Storage::url($pengajuan->pengajuan_dokumen->where('nama_dokumen', 'SPKD')->first()->file_dokumen) }}"
                                                target="_blank">Lihat Dokumen</a></small>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Ajukan Periode</button>
                            </form>
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
