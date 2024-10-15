@extends('layouts.home.app')
@section('title', 'Gelar Depan')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Gelar Depan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Gelar Depan</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Display Success Message -->
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <!-- Display Validation Errors -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <h4 class="card-title">Data Gelar Depan</h4>
                                    @if ($gelarD->isEmpty())
                                        <p class="card-description">
                                            No Data Gelar Depan records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Gelar Depan</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($gelarD as $key => $gelar)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $gelar->nama_gelar_depan }}</td>
                                                            <td>
                                                                @if ($gelar->status == 1)
                                                                    Aktif
                                                                @else
                                                                    Tidak Aktif
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('gelar-depan.edit', $gelar->id_gelar_depan) }}"
                                                                    class="btn btn-warning btn-sm">Edit</a>
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
            </div>

        </div>

        <div class="home-tab">

            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show" id="audiences" role="tabpanel" aria-labelledby="audiences">

                    <div class="row justify-content-center">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Buat Gelar Depan Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('gelar-depan.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_gelar_depan">Nama Gelar Depan</label>
                                                <input type="text" id="nama_gelar_depan" name="nama_gelar_depan"
                                                    class="form-control" placeholder="Silahkan Masukkan Gelar"
                                                    value="{{ old('nama_gelar_depan') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" id="status" class="form-select" required>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Tidak Aktif</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary mb-2">Buat</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
