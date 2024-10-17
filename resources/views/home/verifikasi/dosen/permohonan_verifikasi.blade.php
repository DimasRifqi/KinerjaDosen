@extends('layouts.home.app')
@section('title', 'Permohonan Edit Data Dosen')
@section('userTypeOnPage', 'SuperAdmin, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Permohonan Edit Data Dosen</a>
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
                                    <h4 class="card-title">Permohonan Edit Data Dosen</h4>
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
                                                            <td>
                                                                <!-- <a href="{{ route('oppt.showPermohonan.dosen', $item->id_permohonan) }}"
                                                                    class="btn btn-warning btn-sm">
                                                                    Detail</a> -->
                                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal">
                                                                    Buka Detail
                                                                </button>
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

        <!-- Modal -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog medium-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Permohonan Verifikasi Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label>Nama Dosen</label>
                                        <input type="text" class="form-control" value="{{ $item->user->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Universitas</label>
                                        <input type="text" class="form-control" value="{{ $item->user->universitas->nama_universitas ?? '-' }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Permohonan</label>
                                        <input type="text" class="form-control" value="{{ $item->permohonan }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Diajukan</label>
                                        <input type="text" class="form-control" value="{{ $item->created_at->format('d M Y') }}" disabled>
                                    </div>
                                    <div class="form-group" id="action-buttons">
                                        <form action="{{ route('verifikator.permohonan.status', $item->id_permohonan) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">
                                                Kembali
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
        .medium-modal {
            max-width: 600px;
        }
        </style>

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
