@extends('layouts.home.app')
@section('title', 'Edit Profil')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan, dosen, auditor, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h4 class="card-title">Sunting Profil</h4>
                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_rek">Nomor Rekening</label>
                            <input type="text" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek"
                                name="no_rek" value="{{ old('no_rek', $user->no_rek) }}">
                            @error('no_rek')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="npwp">NPWP</label>
                            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp"
                                name="npwp" value="{{ old('npwp', $user->npwp) }}">
                            @error('npwp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                name="nidn" value="{{ old('nidn', $user->nidn) }}">
                            @error('nidn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                id="tempat_lahir" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="aktif" {{ old('status', $user->status) == 'aktif' ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="non-aktif"
                                    {{ old('status', $user->status) == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
                                <option value="pensiun" {{ old('status', $user->status) == 'pensiun' ? 'selected' : '' }}>
                                    Pensiun</option>
                                <option value="belajar" {{ old('status', $user->status) == 'belajar' ? 'selected' : '' }}>
                                    Belajar</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Profile Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if ($user->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/img/foto_users/' . $user->image) }}" alt="Profile Image"
                                        width="100">
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="file_serdos">File Serdos (PDF)</label>
                            <input type="file" class="form-control @error('file_serdos') is-invalid @enderror"
                                id="file_serdos" name="file_serdos">
                            @error('file_serdos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if ($user->file_serdos)
                                <div class="mt-2">
                                    <a href="{{ asset('storage/file/file_serdos/' . $user->file_serdos) }}"
                                        target="_blank">View Serdos</a>
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection