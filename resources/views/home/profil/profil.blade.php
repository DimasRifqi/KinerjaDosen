@extends('layouts.home.app')
@section('title', 'Profil')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan, dosen, auditor, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profil Anda <a href="{{ route('profile.edit') }}"><i class="mdi mdi-pencil"></i>
                        </a></h4>
                    <div class="form-group">
                        <h4 class="col-form-label">Foto</h4>
                        <div>
                            @if (auth()->user()->image)
                                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Foto Profil"
                                    class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/orang.png') }}" alt="Foto Profil" class="img-thumbnail"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama Lengkap</label>
                        <input readonly type="text" class="form-control" id="name" name="name"
                            value="{{ auth()->user()->gelarDepan->nama_gelar_depan ?? '' }} {{ auth()->user()->name }} {{ auth()->user()->gelarBelakang->nama_gelar_belakang ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input readonly type="email" class="form-control" id="email" name="email"
                            value="{{ auth()->user()->email }}" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input readonly type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ auth()->user()->tanggal_lahir }}">
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input readonly type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{ auth()->user()->tempat_lahir }}">
                    </div>

                    <div class="form-group">
                        <label for="id_role">Role</label>
                        <input readonly class="form-control" id="id_role" name="id_role"
                            value="{{ auth()->user()->role->nama_role }}">
                    </div>

                    <div class="form-group">
                        <label for="id_universitas">Universitas</label>
                        <input readonly type="text" class="form-control" id="id_universitas" name="id_universitas"
                            value="{{ auth()->user()->universitas->nama_universitas ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input readonly type="text" class="form-control" id="nidn" name="nidn"
                            value="{{ auth()->user()->nidn }}">
                    </div>

                    <div class="form-group">
                        <label for="no_rek">No Rekening</label>
                        <input readonly type="text" class="form-control" id="no_rek" name="no_rek"
                            value="{{ auth()->user()->no_rek }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input readonly class="form-control" id="status" name="status"
                            value="{{ ucfirst(auth()->user()->status) }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
