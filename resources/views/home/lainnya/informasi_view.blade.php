@extends('layouts.home.app')
@section('title', 'Informasi')
@section('userTypeOnPage', 'SuperAdmin, dosen, auditor, OPPT')
@section('content')
    <div class="content-wrapper">
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
                        {{-- @if ($informasi->isEmpty()) --}}
                        <p class="card-description">
                            No Data Informasi records found. </p>
                        {{-- @else --}}
                        <ul class="list-group">
                            {{-- @foreach ($informasi as $info) --}}
                            <li class="list-group-item">
                                <strong>Deskripsi:</strong> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque
                                consequuntur unde, mollitia deserunt quaerat iure voluptatum error, fugiat, vitae hic velit
                                numquam assumenda? Dolor nemo non nulla iusto, cupiditate tempore.<br>
                                {{-- @if ($info->image_informasi) --}}
                                <img src="{{-- {{ asset('storage/' . $info->image_informasi) }} --}} {{ asset('images/orang.png') }}" alt="Image Informasi"
                                    class="img-thumbnail mt-2" style="max-width: 200px;">
                                {{-- @endif --}}
                                <a href="#" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </li>
                            {{-- @endforeach --}}
                        </ul>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
