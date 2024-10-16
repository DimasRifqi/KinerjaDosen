@extends('layouts.home.app')
@section('title', 'Edit Periode')
@section('userTypeOnPage', 'SuperAdmin, Perencanaan')
@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sunting Periode</h4>
                        <div class="row">
                            <!-- Display validation errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Display success message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('periode.update', $periode->id_periode) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="nama_periode">Nama Periode</label>
                                    <input type="text" name="nama_periode" id="nama_periode" class="form-control"
                                        placeholder="" value="{{ old('nama_periode', $periode->nama_periode) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tipe_periode">Tipe Periode</label>
                                    <select class="form-control" name="tipe_periode" id="tipe_periode" required>
                                        <option value="1" {{ $periode->tipe_periode ? 'selected' : '' }}>Semester
                                        </option>
                                        <option value="0" {{ !$periode->tipe_periode ? 'selected' : '' }}>Bulanan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="masa_periode_awal">Masa Periode Awal</label>
                                    <input type="date" name="masa_periode_awal" id="masa_periode_awal"
                                        class="form-control" placeholder="dd/mm/yyyy"
                                        value="{{ old('masa_periode_awal', $periode->masa_periode_awal) }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Masa Periode Akhir</label>
                                    <input type="date" name="masa_periode_akhir" id="masa_periode_akhir"
                                        class="form-control" placeholder="dd/mm/yyyy"
                                        value="{{ old('masa_periode_berakhir', $periode->masa_periode_berakhir) }}"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Perbarui Periode</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
