@extends('layouts.home.app')
@section('title', 'Data Permohonan')
@section('userTypeOnPage', 'SuperAdmin, Verifikator')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Detail Permohonan Dosen</h4>
                <p class="card-description">
                    <div class="row">
                        <!-- Data Dosen Lama Section -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-header bg-warning text-white">
                                    <h5 class="mb-0 text-center">Data Dosen Lama</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Nama Dosen</th>
                                                    <td>{{ $permohonan->user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jabatan Fungsional</th>
                                                    <td>{{ $permohonan->user->jabatan_fungsional->nama_jabatan ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Universitas</th>
                                                    <td>{{ $permohonan->user->universitas->nama_universitas ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Pangkat Dosen</th>
                                                    <td>{{ $permohonan->user->pangkat_dosen->nama_pangkat ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gelar Depan</th>
                                                    <td>{{ $permohonan->user->gelar_depan ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gelar Belakang</th>
                                                    <td>{{ $permohonan->user->gelar_belakang ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bank</th>
                                                    <td>{{ $permohonan->user->bank->nama_bank ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>{{ $permohonan->user->name ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Awal Kerja</th>
                                                    <td>{{ $permohonan->user->awal_kerja ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Rekening</th>
                                                    <td>{{ $permohonan->user->nama_rekening ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>No Rekening</th>
                                                    <td>{{ $permohonan->user->no_rek ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>NPWP</th>
                                                    <td>{{ $permohonan->user->npwp ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>NIDN</th>
                                                    <td>{{ $permohonan->user->nidn ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>File Serdos</th>
                                                    <td>
                                                        @if ($permohonan->user->file_serdos)
                                                            <a href="{{ Storage::url('/' . $permohonan->user->file_serdos) }}" download>
                                                                Download Serdos
                                                            </a>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lahir</th>
                                                    <td>{{ $permohonan->user->tanggal_lahir ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat Lahir</th>
                                                    <td>{{ $permohonan->user->tempat_lahir ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Image</th>
                                                    <td>
                                                        @if ($permohonan->user->image)
                                                            <img src="{{ asset('storage/' . $permohonan->user->image) }}" alt="Image Lama" class="img-fluid" width="150">
                                                        @else
                                                            Tidak ada gambar.
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $permohonan->user->email ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Password</th>
                                                    <td>{{ Str::limit($permohonan->user->password, 10, '...') ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>{{ ucfirst($permohonan->user->status) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Dosen Baru Section -->
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0 text-center">Data Dosen Baru</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Nama Dosen</th>
                                                    <td>{{ $permohonan->user->name ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jabatan Fungsional Baru</th>
                                                    <td>{{ $permohonan->jabatan_fungsional->nama_jabatan ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Universitas Baru</th>
                                                    <td>{{ $permohonan->universitas->nama_universitas ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Pangkat Dosen Baru</th>
                                                    <td>{{ $permohonan->pangkat_dosen->nama_pangkat ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gelar Depan Baru</th>
                                                    <td>{{ $permohonan->gelar_depan_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gelar Belakang Baru</th>
                                                    <td>{{ $permohonan->gelar_belakang_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bank Baru</th>
                                                    <td>{{ $permohonan->bank->nama_bank ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Baru</th>
                                                    <td>{{ $permohonan->name_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Awal Kerja Baru</th>
                                                    <td>{{ $permohonan->awal_kerja_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Rekening Baru</th>
                                                    <td>{{ $permohonan->nama_rekening_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>No Rekening Baru</th>
                                                    <td>{{ $permohonan->no_rek_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>NPWP Baru</th>
                                                    <td>{{ $permohonan->npwp_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>NIDN Baru</th>
                                                    <td>{{ $permohonan->nidn_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>File Serdos</th>
                                                    <td>
                                                        @if ($permohonan->file_serdos_baru)
                                                            <a href="{{ Storage::url('/' . $permohonan->file_serdos_baru) }}" download>
                                                                Download Serdos
                                                            </a>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lahir Baru</th>
                                                    <td>{{ $permohonan->tanggal_lahir_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat Lahir Baru</th>
                                                    <td>{{ $permohonan->tempat_lahir_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Image Baru</th>
                                                    <td>
                                                        @if ($permohonan->image_baru)
                                                            <img src="{{ asset('storage/' . $permohonan->image_baru) }}" alt="Image Baru" class="img-fluid" width="150">
                                                        @else
                                                            Tidak ada gambar.
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Email Baru</th>
                                                    <td>{{ $permohonan->email_baru ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Password Baru</th>
                                                    <td>{{ Str::limit($permohonan->password_baru, 10, '...') ?? 'Tidak ada perubahan' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status Dosen Baru</th>
                                                    <td>{{ ucfirst($permohonan->status_baru) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal Dibuat, Tanggal Diupdate, Lampiran Permohonan Section -->
                        <div class="col-lg-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-primary">Informasi Tambahan</h2>
                                    <p><strong>Deskripsi Permohonan:</strong> {{ $permohonan->permohonan }}</p>
                                    <p><strong>Tanggal Dibuat:</strong> {{ $permohonan->created_at->format('d-m-Y H:i') }}</p>
                                    <p><strong>Tanggal Diupdate:</strong> {{ $permohonan->updated_at->format('d-m-Y H:i') }}</p>
                                    <p><strong>Lampiran Permohonan:</strong>
                                        @if ($permohonan->lampiran_permohonan)
                                            <a href="{{ Storage::url('/' . $permohonan->lampiran_permohonan) }}" download>
                                                Download Lampiran
                                            </a>
                                        @else
                                            Tidak ada lampiran.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action buttons and admin forms -->
                    <div class="mt-4">
                        <div class="row">
                            <!-- Form for updating the request -->
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="mb-0">Update Data Terbaru</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('admin.permohonan.update', $permohonan->id_permohonan) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="pesan_admin">Pesan Admin</label>
                                                <input type="text" class="form-control rounded-3 p-3" id="pesan_admin" name="pesan_admin"
                                                    placeholder="Masukkan pesan admin yang jelas dan spesifik" value="{{ old('pesan_admin') }}">
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block mt-2">Update Data Terbaru</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Form for rejecting the request -->
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-danger text-white">
                                        <h5 class="mb-0">Tolak Permohonan</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('admin.permohonan.tolak', $permohonan->id_permohonan) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="pesan_admin">Alasan Penolakan</label>
                                                <input type="text" class="form-control rounded-3 p-3" id="pesan_admin" name="pesan_admin"
                                                    placeholder="Masukkan alasan penolakan yang jelas" value="{{ old('pesan_admin') }}">
                                            </div>
                                            <button type="submit" class="btn btn-danger btn-block mt-2">Tolak Permohonan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Button to go back to the list -->
                            <div class="col-lg-6 col-md-12 mb-3">
                                <a href="{{ route('admin.permohonan.index') }}" class="btn btn-primary btn-block">Kembali ke Daftar Permohonan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
