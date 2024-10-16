@extends('layouts.home.app')
@section('title', 'Periode')
@section('userTypeOnPage', 'SuperAdmin, Perencanaan')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="home-tab">

                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview"
                                    role="tab" aria-controls="overview" aria-selected="true">Detail Periode</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                                    aria-selected="false">Buat Periode</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">

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

                                    <h4 class="card-title">Semua Periode</h4>
                                    @if ($periode->isEmpty())
                                        <p class="card-description">
                                            No Periode records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th> ID </th>
                                                        <th> Nama Periode </th>
                                                        <th> Tipe Periode </th>
                                                        <th> Masa Periode Awal </th>
                                                        <th> Masa Periode Berakhir </th>
                                                        <th> Status </th>
                                                        <th> Edit </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($periode as $item)
                                                        <tr>
                                                            <td>{{ $item->id_periode }}</td>
                                                            <td>{{ $item->nama_periode }}</td>
                                                            <td>{{ $item->tipe_periode ? 'Semester' : 'Bulanan' }}</td>
                                                            <td>{{ $item->masa_periode_awal }}</td>
                                                            <td>{{ $item->masa_periode_berakhir }}</td>
                                                            <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                                                            <td>
                                                                <a href="{{ route('periode.edit', $item->id_periode) }}"
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

        <div class="row justify-content-center">
            <div class="col-md-6 grid-margin">
                <div class="home-tab">

                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show" id="audiences" role="tabpanel" aria-labelledby="audiences">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Buat Periode Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('periode.create') }}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label for="nama_periode">Nama Periode</label>
                                                <input type="text" name="nama_periode" id="nama_periode"
                                                    class="form-control" placeholder="" value="{{ old('nama_periode') }}"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tipe_periode">Tipe Periode</label>
                                                <select class="form-control" name="tipe_periode" id="tipe_periode" required>
                                                    <option>Mohon Pilih Satu</option>
                                                    <option value="1"
                                                        {{ old('tipe_periode') == 1 ? 'selected' : '' }}>
                                                        Semester
                                                    </option>
                                                    <option value="0"
                                                        {{ old('tipe_periode') == 0 ? 'selected' : '' }}>Bulanan
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="masa_periode_awal">Masa Periode Awal</label>
                                                <input type="date" name="masa_periode_awal" id="masa_periode_awal"
                                                    class="form-control" placeholder="dd/mm/yyyy"
                                                    value="{{ old('masa_periode_awal') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Masa Periode Akhir</label>
                                                <input type="date" name="masa_periode_akhir" id="masa_periode_akhir"
                                                    class="form-control" placeholder="dd/mm/yyyy"
                                                    value="{{ old('masa_periode_akhir') }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2">Buat Periode</button>
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
