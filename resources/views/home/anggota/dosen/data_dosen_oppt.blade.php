@extends('layouts.home.app')
@section('title', 'Data Dosen')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan, dosen, Auditor, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Data Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Permohonan Verifikasi Dosen</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Dosen</h4>
                                    <p class="card-description">
                                        Lorem ipsum dolor sit </p>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <!-- Error Messages -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if ($dosen->isEmpty())
                                        <div class="alert alert-warning">
                                            Tidak ada dosen yang ditemukan.
                                        </div>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>NIDN</th>
                                                        <th>Universitas</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                        <th>Edit</th>
                                                        <th>Riwayat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($dosen as $key => $item)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>

                                                            <td> {{ $item->name }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ $item->nidn }}</td>
                                                            <td>{{ $item->universitas->nama_universitas }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge bg-{{ $item->status == 'aktif' ? 'success' : ($item->status == 'non-aktif' ? 'danger' : ($item->status == 'pensiun' ? 'secondary' : 'warning')) }}">
                                                                    {{ ucfirst($item->status) }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <form
                                                                    action="{{ route('oppt.updateStatus.dosen', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <!-- Dropdown untuk memilih status -->
                                                                    <div class="input-group">
                                                                        <select name="status"
                                                                            class="form-select form-select-sm">
                                                                            <option value="aktif"
                                                                                {{ $item->status == 'aktif' ? 'selected' : '' }}>
                                                                                Aktif
                                                                            </option>
                                                                            <option value="non-aktif"
                                                                                {{ $item->status == 'non-aktif' ? 'selected' : '' }}>
                                                                                Non-Aktif</option>
                                                                            <option value="pensiun"
                                                                                {{ $item->status == 'pensiun' ? 'selected' : '' }}>
                                                                                Pensiun</option>
                                                                            <option value="belajar"
                                                                                {{ $item->status == 'belajar' ? 'selected' : '' }}>
                                                                                Belajar</option>
                                                                        </select>
                                                                        <div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm">Update</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('oppt.edit.dosen', $item->id) }}"><button
                                                                        type="submit"
                                                                        class="btn btn-warning btn-sm">Edit</button></a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('oppt.history.dosen', $item->id) }}">
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-sm">Riwayat</button></a>
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
                                    <h4 class="card-title">Buat Permohonan Verifikasi Dosen</h4>
                                    <div class="row">
                                        <!-- Error Messages -->
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{ route('oppt.storePermohonan.dosen') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="permohonan">Permohonan</label>
                                                <textarea class="form-control" id="permohonan" name="permohonan" style="height: 100px"
                                                    placeholder="Tuliskan permohonan anda di sini..." required>{{ old('permohonan') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih Dosen</label>
                                                <select class="form-select" id="id" name="id" required>
                                                    <option value="">Pilih Dosen</option>
                                                    @foreach ($dosen as $d)
                                                        <option value="{{ $d->id }}">{{ $d->name }}
                                                            ({{ $d->nidn }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Buat</button>
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
