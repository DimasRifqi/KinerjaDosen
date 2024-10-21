@extends('layouts.home.app')
@section('title', 'Data Permohonan')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Permohonan</h4>
                        <p class="card-description">
                            Menampilkan data permohonan yang diajukan oleh pengguna. </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Dosen</th>
                                        <th>Universitas</th>
                                        <th>Permintaan Permohonan</th>
                                        <th>Status Permohonan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($permohonan as $index => $item)
                                        <tr>
                                            <td class="py-1">{{ $index + 1 }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->universitas->nama_universitas ??  'tidak ada' }}</td>
                                            <td>{{ $item->permohonan }}</td>
                                            <td>{{ $item->status_permohonan }}</td>
                                            <td>
                                                <!-- Tombol Lihat Detail -->
                                                <a href="{{ route('admin.permohonan.detail', $item->id_permohonan) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada permohonan ditemukan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
