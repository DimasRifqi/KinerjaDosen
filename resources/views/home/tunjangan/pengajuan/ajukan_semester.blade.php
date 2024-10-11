@extends('layouts.home.app')

@section('content')
    <div class="content-wrapper">

        <form action="{{ route('oppt.pengajuanSemesterStore.dosen') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name='id_pengajuan' value="{{ $pengajuan->id_pengajuan }}">

            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview"
                                role="tab" aria-controls="overview" aria-selected="true">Untuk Semua Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                                aria-selected="false">Untuk Tiap Dosen</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row justify-content-center">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Dokumen Untuk Semua Dosen</h4>
                                        <div class="row">
                                            <div>
                                                @php
                                                    $sp_pts = $sharedDocuments
                                                        ->where('nama_dokumen', 'SP PTS')
                                                        ->first();
                                                    $spkd = $sharedDocuments->where('nama_dokumen', 'SPKD')->first();
                                                @endphp

                                                {{-- Surat Pernyataan Pimpinan PTS (SP PTS) --}}
                                                @if ($sp_pts)
                                                    <div class="form-group">
                                                        <label for="sp_pts">Surat Pernyataan Pimpinan PTS (PDF)</label>
                                                        <a href="{{ asset('storage/' . $sp_pts->file_dokumen) }}"
                                                            target="_blank"> <i class="mdi mdi-eye"></i></a>
                                                        <input type="file" class="form-control form-control-sm"
                                                            name="shared_sppts">
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label for="sp_pts">Surat Pernyataan Pimpinan PTS
                                                            (PDF)</label>
                                                        <input type="file" class="form-control form-control-sm"
                                                            name="shared_sppts">
                                                    </div>
                                                @endif

                                                {{-- Surat Pernyataan Kesediaan Dokumen --}}
                                                @if ($spkd)
                                                    <div class="form-group">
                                                        <label for="sp_pts">Surat Pernyataan Kesediaan Dokumen
                                                            (PDF)</label>
                                                        <a href="{{ asset('storage/' . $spkd->file_dokumen) }}"
                                                            target="_blank"><i class="mdi mdi-eye"></i></a>
                                                        <input type="file" class="form-control form-control-sm"
                                                            name="shared_spkd">
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label for="spkd" class="form-label">Surat Pernyataan Kesediaan
                                                            Dokumen (PDF)</label>
                                                        <input type="file" class="form-control form-control-sm"
                                                            name="shared_spkd">
                                                    </div>
                                                @endif

                                                <button type="submit" class="btn btn-primary mb-2">Ajukan </button>

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

                    </div>
                </div>
            </div>

            <div class="home-tab">
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show" id="audiences" role="tabpanel" aria-labelledby="audiences">
                        <div class="row justify-content-center">
                            @foreach ($pengajuan->user as $dosen)
                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Dokumen {{ $dosen->name }}</h4>
                                            <div class="row">
                                                <div>

                                                    @php
                                                        $documents = $dosenDocuments[$dosen->id] ?? null;
                                                    @endphp

                                                    {{-- SPTJM Dosen --}}
                                                    @if ($documents && $documents->where('nama_dokumen', 'sptjm_dosen')->first())
                                                        <p>Surat Pernyataan Pimpinan PTS (PDF):
                                                            <a href="{{ asset('storage/' . $documents->where('nama_dokumen', 'sptjm_dosen')->first()->file_dokumen) }}"
                                                                target="_blank">View File</a>
                                                            <input type="file" class="form-control form-control-sm"
                                                                name="sptjm[{{ $dosen->id }}]"
                                                                placeholder="Upload SPTJM Dosen (PDF)">

                                                        </p>
                                                    @else
                                                        <div class="form-group">
                                                            <label for="sptjm_{{ $dosen->id }}">SPTJM Dosen (PDF)
                                                            </label>
                                                            <input type="file" class="form-control form-control-sm"
                                                                name="sptjm[{{ $dosen->id }}]">
                                                        </div>
                                                    @endif

                                                    {{-- Surat Pernyataan Kesediaan Dokumen --}}
                                                    @if ($documents && $documents->where('nama_dokumen', 'spkk')->first())
                                                        <p>SPTJM Pemenuhan Kewajiban Khusus (SPKK)
                                                            <a href="{{ asset('storage/' . $documents->where('nama_dokumen', 'spkk')->first()->file_dokumen) }}"
                                                                target="_blank">View File</a>
                                                                <input type="file" class="form-control form-control-sm"
                                                                name="spkk[{{ $dosen->id }}]">
                                                        </p>
                                                    @else
                                                        <div class="form-group">
                                                            <label for="spkk_{{ $dosen->id }}" class="form-label">SPTJM
                                                                Pemenuhan Kewajiban Khusus (PDF)</label>
                                                            <input type="file" class="form-control form-control-sm"
                                                                name="spkk[{{ $dosen->id }}]">
                                                        </div>
                                                    @endif
                                                    <input type="hidden" name="dosen_ids[]" value="{{ $dosen->id }}">

                                                    <button type="submit" class="btn btn-primary mb-2">Ajukan </button>

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
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>

        </form>


    </div>
@endsection
