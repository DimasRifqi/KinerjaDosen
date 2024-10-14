@extends('layouts.home.app')
@section('title', 'Pengajuan Verifikasi Tunjangan')
@section('userTypeOnPage', 'SuperAdmin, Verifikator')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pengajuan Verifikasi Tunjangan</h4>
                        <p class="card-description">
                            Lorem ipsum dolor sit </p>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($pengajuan->isEmpty())
                            <div class="alert alert-warning">
                                Tidak ada Pengajuan yang tersedia.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Pengajuan</th>
                                            <th>Periode</th>
                                            <th>Draft</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Tanggal Diperbarui</th>
                                            <th>Daftar Pengguna</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengajuan as $item)
                                            <tr>
                                                <td>{{ $item->id_pengajuan }}</td>
                                                <td>{{ $item->periode->nama_periode }}</td>
                                                <td>{{ $item->draft }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($item->user as $user)
                                                            <li>
                                                                <strong>Nama:</strong> {{ $user->name }} <br>
                                                                <strong>Email:</strong> {{ $user->email }} <br>
                                                                <strong>Status:</strong> {{ $user->pivot->status }} <br>
                                                                <strong>Tanggal Diajukan:</strong>
                                                                {{ $user->pivot->tanggal_diajukan ?? '-' }} <br>
                                                                <strong>Tanggal Disetujui:</strong>
                                                                {{ $user->pivot->tanggal_disetujui ?? '-' }} <br>
                                                                <hr>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="{{ route('verifikator.pengajuan.show', $item->id_pengajuan) }}"
                                                        class="btn btn-warning btn-sm">Detail</a> {{-- popup --}}
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
