@extends('layouts.home.app')
@section('title', 'Universitas')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Universitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Universitas</a>
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

                                    <h4 class="card-title">Data Universitas</h4>
                                    @if ($univ->isEmpty())
                                        <p class="card-description">
                                            No Data Universitas records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID Universitas</th>
                                                        <th>Nama Universitas</th>
                                                        <th>Kota</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($univ as $uni)
                                                        <tr>
                                                            <td>{{ $uni->id_universitas }}</td>
                                                            <td>{{ $uni->nama_universitas }}</td>
                                                            <td>{{ $uni->kota ? $uni->kota->nama_kota : 'N/A' }}</td>
                                                            <td>{{ $uni->status ? 'Active' : 'Inactive' }}</td>
                                                            <td>
                                                            <td>
                                                                <a href="{{ route('univ.edit', $uni->id_universitas) }}"
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
                                    <h4 class="card-title">Buat Universitas Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('univ.create') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_univ">Nama Universitas:</label>
                                                <input type="text" name="nama_univ" id="nama_univ" class="form-control"
                                                    value="{{ old('nama_universitas') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label name="id_kota" id="id_kota" class="form-label" required>Pilih
                                                    Kota</label>
                                                <select class="js-example-basic-multiple w-100" multiple="multiple">
                                                    @foreach ($kota as $city)
                                                        <option value="{{ $city->id_kota }}">{{ $city->nama_kota }}
                                                        </option>
                                                    @endforeach
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
