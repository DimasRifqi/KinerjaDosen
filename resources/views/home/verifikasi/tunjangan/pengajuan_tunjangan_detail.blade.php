@extends('layouts.home.app')
@section('title', 'Detail Pengajuan Verifikasi Tunjangan')
@section('userTypeOnPage', 'SuperAdmin, Verifikator')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Pengajuan untuk Universitas:
                            {{ $pengajuan->user[0]->universitas->nama_universitas ?? 'Tidak Ditemukan' }}</h4>

                        <h6>Informasi Pengajuan</h6>
                        <ul class="list-group mb-4">
                            <li class="list-group-item"><strong>ID Periode:</strong> {{ $pengajuan['id_periode'] }}</li>
                            <li class="list-group-item"><strong>Dibuat Pada:</strong>
                                {{ \Carbon\Carbon::parse($pengajuan['created_at'])->format('d-m-Y H:i:s') }}</li>
                        </ul>

                        <h6>Dokumen Pengajuan</h6>
                        <ul class="list-group mb-4">
                            @foreach ($pengajuan->pengajuan_dokumen as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $item->nama_dokumen }}</span>
                                    <a href="{{ Storage::url($item->file_dokumen) }}" class="btn btn-sm btn-primary"
                                        download="{{ $item->nama_dokumen }}">
                                        Download
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <h6>Dosen Terkait</h6>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        {{-- <th>Status Pengajuan</th> --}}
                                        <th>Status Pengajuan</th>{{-- awalnya aksi --}}
                                        <th>Tanggal Diajukan</th>
                                        <th>Email</th>
                                        {{-- <th>Pesan</th> --}}
                                        <th>pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuan->user as $user)
                                        <tr>
                                            <td>{{ $user['pivot']['id'] }}</td>
                                            <td>{{ $user->name }}</td>
                                            {{-- <td>{{ ucfirst($user->pivot->status) }}</td> --}}
                                            <td>
                                                <!-- Form untuk memperbarui status pengajuan -->
                                                <form action="{{ route('verifikator.pengajuanStatus.update', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Dropdown untuk memilih status baru -->
                                                    <div class="input-group">
                                                        <select name="status" class="form-control">
                                                            <option value="diajukan"
                                                                {{ $user['pivot']['status'] == 'diajukan' ? 'selected' : '' }}>
                                                                Diajukan</option>
                                                            <option value="disetujui"
                                                                {{ $user['pivot']['status'] == 'disetujui' ? 'selected' : '' }}>
                                                                Disetujui</option>
                                                            <option value="ditolak"
                                                                {{ $user['pivot']['status'] == 'ditolak' ? 'selected' : '' }}>
                                                                Ditolak</option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-sm">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($user['pivot']['tanggal_diajukan'])->format('d-m-Y') }}
                                            </td>
                                            <td>{{ $user['email'] }}</td>
                                            {{-- <td>{{ $user['pivot']['pesan'] }}</td> --}}
                                            <td>
                                                <!-- Form for updating the pesan field -->
                                                <form action="{{ route('verifikator.pesanPengajuan.store', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="input-group">
                                                        <textarea name="pesan" class="form-control">{{ $user->pivot->pesan }}</textarea>
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-primary btn-sm">Update
                                                                Pesan</button>
                                                        </div>
                                                    </div>
                                                </form>
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
    </div>
@endsection
