@extends('layouts.home.app')
@section('title', 'Pangkat')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Pangkat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Pangkat</a>
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

                                    <h4 class="card-title">Data Pangkat</h4>
                                    @if ($pangkat_dosen->isEmpty())
                                        <p class="card-description">
                                            No Data Pangkat Dosen records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th> ID </th>
                                                        <th> Nama Pangkat </th>
                                                        <th> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pangkat_dosen as $pangkat)
                                                        <tr>
                                                            <td>{{ $pangkat_dosen->firstItem() + $loop->index }}</td>
                                                            <td>{{ $pangkat->nama_pangkat }}</td>
                                                            <td>
                                                                <!-- Edit button (Redirect to Edit Page) -->
                                                                <a href="{{ route('pangkat.edit', $pangkat->id_pangkat_dosen) }}"
                                                                    class="btn btn-warning btn-sm">Edit</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $pangkat_dosen->links() }}
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
                                    <h4 class="card-title">Buat Pangkat Dosen Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('pangkat.create') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_pangkat">Nama Pangkat</label>
                                                <input type="text" name="nama_pangkat" id="nama_pangkat"
                                                    class="form-control" placeholder="" value="{{ old('nama_pangkat') }}"
                                                    required>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2">Buat Pangkat</button>
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
