@extends('layouts.home.app')
@section('title', 'Riwayat Pengajuan Dosen')
@section('userTypeOnPage', 'SuperAdmin, Verifikator')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Riwayat Pengajuan Dosen</h4>

                        <h6>Informasi Dosen</h6>
                        <ul class="list-group mb-4">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Nama: </strong>{{ $dosen->name }}</li>
                                <li class="list-group-item"><strong>Email: </strong>{{ $dosen->email }}</li>
                                <li class="list-group-item"><strong>NIDN: </strong>{{ $dosen->nidn }}</li>
                                <li class="list-group-item"><strong>Status: </strong>{{ ucfirst($dosen->status) }}</li>
                            </ul>
                        </ul>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h6>Riwayat Pengajuan</h6>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Pengajuan</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        <th>Tanggal Diajukan</th>
                                        <th>Tanggal Disetujui</th>
                                        <th>Tanggal Ditolak</th>
                                        <th>Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dosen->pengajuan as $pengajuan)
                                        <tr>
                                            <td>{{ $pengajuan->id_pengajuan }}</td>
                                            <td>{{ $pengajuan->periode->nama_periode }}</td>
                                            <td>{{ ucfirst($pengajuan->pivot->status) }}</td>
                                            <td>{{ $pengajuan->pivot->tanggal_diajukan ? \Carbon\Carbon::parse($pengajuan->pivot->tanggal_diajukan)->format('d-m-Y') : '-' }}
                                            </td>
                                            <td>{{ $pengajuan->pivot->tanggal_disetujui ? \Carbon\Carbon::parse($pengajuan->pivot->tanggal_disetujui)->format('d-m-Y') : '-' }}
                                            </td>
                                            <td>{{ $pengajuan->pivot->tanggal_ditolak ? \Carbon\Carbon::parse($pengajuan->pivot->tanggal_ditolak)->format('d-m-Y') : '-' }}
                                            </td>
                                            <td>{{ $pengajuan->pivot->pesan ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
