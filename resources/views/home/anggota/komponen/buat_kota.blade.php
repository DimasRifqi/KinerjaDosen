@extends('layouts.home.app')
@section('title', 'Kota')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan, dosen, Auditor, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Kota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Kota</a>
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

                                    <h4 class="card-title">Data Kota</h4>
                                    @if ($kota->isEmpty())
                                        <p class="card-description">
                                            No Data Kota records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nama Kota</th>
                                                        <th>Provinsi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kota as $item)
                                                        <tr>
                                                            <td>{{ $item->id_kota }}</td>
                                                            <td>{{ $item->nama_kota }}</td>
                                                            <td>{{ $item->provinsi->nama_provinsi ?? 'N/A' }}</td>
                                                            <td>
                                                                <a href="{{ route('kota.edit', $item->id_kota) }}"
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
                                    <h4 class="card-title">Buat Kota Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('kota.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_kota">Nama Kota</label>
                                                <input type="text" name="nama_kota" id="nama_kota" class="form-control"
                                                    value="{{ old('nama_kota') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih Provinsi</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    @foreach ($provinsi as $prov)
                                                        <option value="{{ $prov->id_provinsi }}">{{ $prov->nama_provinsi }}
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
