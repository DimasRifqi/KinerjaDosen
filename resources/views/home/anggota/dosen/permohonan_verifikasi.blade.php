@extends('layouts.home.app')
@section('title', 'Data Dosen')
@section('userTypeOnPage', 'SuperAdmin, OPPT')
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
                            aria-selected="false">Buat Permohonan Edit Data Dosen</a>
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
                                    @if ($permohonan->isEmpty())
                                        <div class="alert alert-warning">
                                            Tidak ada permohonan yang ditemukan.
                                        </div>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Dosen</th>
                                                        <th>Universitas</th>
                                                        <th>Permohonan</th>
                                                        <th>Status</th>
                                                        <th>Tanggal Diajukan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($permohonan as $index => $item)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $item->user->name }}</td>
                                                            <td>{{ $item->user->universitas->nama_universitas ?? '-' }}</td>
                                                            <!-- Asumsi ada relasi universitas -->
                                                            <td>{{ $item->permohonan }}</td>
                                                            <td>{{ $item->status ? 'Selesai' : 'Proses' }}</td>
                                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                                            <td><a
                                                                    href="{{ route('oppt.showPermohonan.dosen', $item->id_permohonan) }}">
                                                                    Detail</a></td>
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
