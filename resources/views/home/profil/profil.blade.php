@extends('layouts.home.app')
@section('title', 'Profil')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan, dosen, Auditor, OPPT')
@section('content')
<div class="row mt-5">
    <div class="col-md-12 text-center">
        <img src="path-to-your-photo.jpg" alt="Foto Profil" class="img-fluid mb-5" style="width: 150px; height: 150px; object-fit: cover;">
        <button type="button" class="btn btn-primary btn-sm">Edit Photo</button>
    </div>
    <div class="col-md-12 mt-6">

        <div class="card">
            <div class="card-body">
                <p><strong>Nama Lengkap:</strong> squidword</p>
                <p><strong>Email:</strong> kasir@example.com</p>
                <p><strong>Jabatan:</strong> Dosen</p>
                <p><strong>Pangkat:</strong> newbie</p>
                <p><strong>Program Studi:</strong> Studi Klarinet</p>
                <p><strong>Universitas:</strong> Bikini Bottom</p>
            </div>
        </div>
    </div>
</div>

@endsection
