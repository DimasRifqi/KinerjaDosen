@extends('layouts.home.app')
@section('title', 'FAQ')
@section('userTypeOnPage', 'SuperAdmin, Dosen, Auditor, OPPT')
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
                                Data FAQ
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
                        {{-- @if ($faqs->isEmpty()) --}}
                        <p class="card-description">
                            No Data FAQ records found. </p>
                        {{-- @else --}}
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableKota">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus molestias
                                            optio alias dolorum </td>
                                        <td>neque dolore sit hic sequi assumenda </td>
                                        <td>
                                            <a href="#" class="btn btn-info">Edit</a>
                                            <button class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>

                                    {{-- @foreach ($faqs as $faq)
                                            <tr>
                                                <td>{{ $faq->id }}</td>
                                                <td>{{ $faq->pertanyaan }}</td>
                                                <td>{{ $faq->jawaban }}</td>
                                                <td>
                                                    <a href="{{ route('admin.faq.edit', $faq->id_faq) }}"
                                                        class="btn btn-info">Edit</a>
                                                    <form action="{{ route('admin.faq.delete', $faq->id_faq) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
