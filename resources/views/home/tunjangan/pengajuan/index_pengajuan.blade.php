@extends('layouts.home.app')
@section('title', 'Pengajuan Tunjangan')
@section('userTypeOnPage', 'SuperAdmin, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pengajuan Tunjangan</h4>
                        <p class="card-description">
                            Lorem, ipsum dolor sit amet
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Pengajuan</th>
                                        <th>Nama Periode</th>
                                        <th>Awal Periode</th>
                                        <th>Akhir Periode</th>
                                        <th>Jenis Periode</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuan as $pengajuan)
                                        <tr>
                                            <td class="py-1">{{ $pengajuan->id_pengajuan }}</td>
                                            <td>{{ $pengajuan->periode->nama_periode }}</td>
                                            <td>{{ $pengajuan->periode->masa_periode_awal }}</td>
                                            <td>{{ $pengajuan->periode->masa_periode_berakhir }}</td>
                                            <td>{{ $pengajuan->periode->tipe_periode ? 'Bulanan' : 'Semester' }}</td>
                                            <td>{{ $pengajuan->draft ? 'Aktif' : 'Draft' }}</td>
                                            <td>
                                                <!-- Dropdown for actions -->
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $pengajuan->id_pengajuan }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Aksi
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $pengajuan->id_pengajuan }}">
                                                        <!-- Ajukan Dokumen -->
                                                        @if ($pengajuan->periode->tipe_periode == true)
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('oppt.pengajuanShow.dosen', $pengajuan->id_pengajuan) }}">
                                                                    <i class="mdi mdi-file-document-box text-primary"></i> Ajukan Dokumen Bulanan
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('oppt.pengajuanSemesterShow.dosen', $pengajuan->id_pengajuan) }}">
                                                                    <i class="mdi mdi-calendar text-info"></i> Ajukan Dokumen Semester
                                                                </a>
                                                            </li>
                                                        @endif
                                                        <!-- Set to Sukses -->
                                                        @if ($pengajuan->draft == false)
                                                            <li>
                                                                <form action="{{ route('oppt.draftPengajuan.dosen', $pengajuan->id_pengajuan) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="mdi mdi-check-circle text-success"></i> Set to Sukses
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        @endif
                                                        <!-- Edit Pengajuan -->
                                                        @if ($pengajuan->draft == false)
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('oppt.editPengajuan.dosen', $pengajuan->id_pengajuan) }}">
                                                                    <i class="mdi mdi-pencil text-warning"></i> Edit
                                                                </a>
                                                            </li>
                                                        @endif
                                                        <!-- Detail Status (Modal Trigger) -->
                                                        <li>
                                                            <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#detailModal">
                                                                <i class="mdi mdi-eye text-dark"></i> Buka Status
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Modal -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog medium-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Status Pengajuan Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Periode Pengajuan: {{ $pengajuan->id_periode }}</h4>
                        <p><strong>Tanggal Dibuat:</strong> {{ $pengajuan->created_at }}</p>
                        <p><strong>Terakhir Diubah:</strong> {{ $pengajuan->updated_at }}</p>

                        <h5>Daftar Dosen yang Diajukan:</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Dosen</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Tanggal Diajukan</th>
                                    <th>Tanggal Disetujui</th>
                                    <th>Tanggal Ditolak</th>
                                    <th>Pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan->user as $dosen)
                                    <tr>
                                        <td>{{ $dosen->name }}</td>
                                        <td>{{ $dosen->email }}</td>
                                        <td>{{ $dosen->pivot->status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($dosen->pivot->created_at)->format('d-m-Y') }}</td>
                                        <td>{{ $dosen->pivot->tanggal_disetujui ?? '-' }}</td>
                                        <td>{{ $dosen->pivot->tanggal_ditolak ?? '-' }}</td>
                                        <td>{{ $dosen->pivot->pesan ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group" id="action-buttons">
                            <button type="button" class="btn btn-info mt-4 me-auto" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .medium-modal {
                max-width: 1000px;
            }
        </style>

    </div>
@endsection
