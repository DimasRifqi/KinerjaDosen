@extends('layouts.home.app')
@section('title', 'Informasi')
@section('userTypeOnPage', 'SuperAdmin, Perencanaan')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Informasi</a>
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

                                    <div class="d-flex" style="justify-content: space-between; padding: 10px 20px;">
                                        <h4>
                                            Data Informasi
                                        </h4>
                                        {{-- <div class="search-container">
                                        <div class="input-group">
                                            <input class="form-control"
                                                style="background: none; border: none; display: flex; align-items: center;"
                                                id="searchInput" type="text" placeholder="Search" autocomplete="on">
                                            <div class="input-group-append">
                                                <span class="input-group-text"
                                                    style="background: none; border: none; padding-left: 0; display: flex; align-items: center;">
                                                    <i class="mdi mdi-magnify"
                                                            style="background: none;"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div> --}}
                                    </div>
                                    @if ($informasi->isEmpty())
                                        <p class="card-description">
                                            No Data Informasi records found. </p>
                                    @else
                                        <ul class="list-group">
                                            @foreach ($informasi as $info)
                                                <li class="list-group-item">
                                                    <strong>Deskripsi:</strong> {{ $info->deskripsi }} <br>
                                                    @if ($info->image_informasi)
                                                        <img src="{{ asset('storage/' . $info->image_informasi) }}"
                                                            alt="Image Informasi" class="img-thumbnail mt-2"
                                                            style="max-width: 200px;">
                                                    @endif
                                                    <a href="{{ route('admin.informasi.edit', $info->id_informasi) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <form
                                                        action="{{ route('admin.informasi.delete', $info->id_informasi) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
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
                                    <h4 class="card-title">Buat Informasi Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('admin.faq.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <input type="text"
                                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                                    id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" required>
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="image_informasi">Image (Optional)</label>
                                                <input type="file"
                                                    class="form-control form-control-sm @error('image_informasi') is-invalid @enderror"
                                                    id="image_informasi" name="image_informasi">
                                                @error('image_informasi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
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
