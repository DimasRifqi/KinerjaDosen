@extends('layouts.home.app')
@section('title', 'Permohonan Verifikasi Dosen')
@section('userTypeOnPage', 'SuperAdmin, Verifikator')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Permohonan Verifikasi Dosen</h4>
                        <p class="card-description">
                            Lorem ipsum dolor sit </p>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($permohonan->isEmpty())
                            <div class="alert alert-warning">
                                Tidak ada permohonan yang tersedia.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Dosen</th>
                                            <th>Universitas</th>
                                            <th>Permohonan</th>
                                            <th>Status</th>
                                            <th>Tanggal Diajukan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->user->universitas->nama_universitas ?? '-' }}</td>
                                                <!-- Asumsi ada relasi universitas -->
                                                <td>{{ $item->permohonan }}</td>
                                                <td>{{ $item->status ? 'Selesai' : 'Proses' }}</td>
                                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                                <td><a href="{{ route('verifikator.permohonan.show', $item->id_permohonan) }}"
                                                        class="btn btn-warning btn-sm">
                                                        Detail</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection