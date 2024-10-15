@extends('layouts.home.app')
@section('title', 'Detail Permohonan Verifikasi Dosen')
@section('userTypeOnPage', 'SuperAdmin, Verifikator')
@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Permohonan Verifikasi Dosen</h4>
                        <div class="row">
                            <div class="form-group">
                                <label>Nama Dosen</label>
                                <input type="text" class="form-control" value="{{ $permohonan->user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Universitas</label>
                                <input type="text" class="form-control"
                                    value="{{ $permohonan->user->universitas->nama_universitas ?? '-' }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Permohonan</label>
                                <input type="text" class="form-control" value="{{ $permohonan->permohonan }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Diajukan</label>
                                <input type="text" class="form-control"
                                    value="{{ $permohonan->created_at->format('d M Y') }}" disabled>
                            </div>
                            <div class="form-group">
                                @if ($permohonan->status == false)
                                    <form action="{{ route('verifikator.permohonan.status', $permohonan->id_permohonan) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">
                                            Selesaikan
                                        </button>
                                        <a class="btn btn-info" href="{{ route('verifikator.permohonan.index') }}">
                                            Kembali</a>
                                    </form>
                                @else
                                    <button disabled type="submit" class="btn btn-inverse-success btn-fw">
                                        Terselesaikan
                                    </button>
                                    <a class="btn btn-info" href="{{ route('verifikator.permohonan.index') }}">
                                        Kembali</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
