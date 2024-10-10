@extends('layouts.home.app')

@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Program Studi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Program Studi</a>
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

                                    <h4 class="card-title">Data Program Studi</h4>
                                    @if ($prodi->isEmpty())
                                        <p class="card-description">
                                            No Data Program Studi records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th> ID Prodi </th>
                                                        <th> Nama Prodi </th>
                                                        <th> Status </th>
                                                        <th> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prodi as $item)
                                                        <tr>
                                                            <td>{{ $item->id_prodi }}</td>
                                                            <td>{{ $item->nama_prodi }}</td>
                                                            <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                                                            <td>
                                                                <!-- Edit and Delete actions -->
                                                                <a href="{{ route('prodi.edit', $item->id_prodi) }}"
                                                                    class="btn btn-sm btn-warning">Edit</a>
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
                                    <h4 class="card-title">Buat Program Studi Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('prodi.create') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_prodi">Nama Prodi:</label>
                                                <input type="text" name="nama_prodi" id="nama_prodi" class="form-control"
                                                    value="{{ old('nama_prodi') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih Status</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <option value="1" selected>Active</option>
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
