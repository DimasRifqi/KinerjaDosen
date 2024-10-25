@extends('layouts.home.app')
@section('title', 'Data Permohonan')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
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
                                <table class="table table-striped permohonan-table">
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
                                                <td> <span class="badge bg-{{ $item->status ? 'success' : 'warning' }}">
                                                        {{ $item->status ? 'Selesai' : 'Proses' }} </span>
                                                </td>
                                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('verifikator.permohonan.show', $item->id_permohonan) }}"
                                                        class="btn btn-info btn-sm">
                                                        Lanjutkan</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal" 
                                                            data-id="{{ $item->id_permohonan }}"
                                                            data-name="{{ $item->user->name }}"
                                                            data-universitas="{{ $item->user->universitas->nama_universitas }}"
                                                            data-permohonan="{{ $item->permohonan }}"
                                                            data-tanggal="{{ $item->timestamps }}">
                                                        Lihat Detail
                                                    </button>
                                                </td>
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
