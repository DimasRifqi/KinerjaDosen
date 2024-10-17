@extends('layouts.home.app')
@section('title', 'Pengajuan Tunjangan')
@section('userTypeOnPage', 'SuperAdmin, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pengajuan Tunjangan</h4>
                        <p class="card-description">
                            Lorem, ipsum dolor sit amet </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            ID Pengajuan
                                        </th>
                                        <th>
                                            Nama Periode
                                        </th>
                                        <th>
                                            Awal Periode
                                        </th>
                                        <th>
                                            Akhir Periode
                                        </th>
                                        <th>
                                            Jenis Periode
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuan as $pengajuan)
                                        <tr>
                                            <td class="py-1">
                                                {{ $pengajuan->id_pengajuan }}
                                            </td>
                                            <td>
                                                {{ $pengajuan->periode->nama_periode }}
                                            </td>
                                            <td>
                                                {{ $pengajuan->periode->masa_periode_awal }}
                                            </td>
                                            <td>
                                                {{ $pengajuan->periode->masa_periode_berakhir }}
                                            </td>
                                            <td>
                                                {{ $pengajuan->periode->tipe_periode ? 'Bulanan' : 'Semester' }}
                                            </td>
                                            <td>
                                                {{ $pengajuan->draft ? 'Aktif' : 'Draft' }}
                                            </td>
                                            <td>
                                                <div class="py-2">
                                                    @if ($pengajuan->periode->tipe_periode == true)
                                                        <a href="{{ route('oppt.pengajuanShow.dosen', $pengajuan->id_pengajuan) }}"
                                                            class="btn btn-outline-primary btn-rounded">Ajukan Dokumen
                                                            Bulanan</a>
                                                    @else
                                                        <a href="{{ route('oppt.pengajuanSemesterShow.dosen', $pengajuan->id_pengajuan) }}"
                                                            class="btn btn-outline-info btn-rounded">Ajukan Dokumen
                                                            Semester</a>
                                                    @endif
                                                </div>

                                                <div class="py-1">
                                                    <form {{-- kasih modal peringatan apakah anda yakin --}}
                                                        action="{{ route('oppt.draftPengajuan.dosen', $pengajuan->id_pengajuan) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        @if ($pengajuan->draft == false)
                                                            <button type="submit" class="btn btn-warning">Set to
                                                                Sukses</button>
                                                        @endif
                                                    </form>
                                                </div>
                                                <div>
                                                    @if ($pengajuan->draft == false)
                                                        <a href="{{ route('oppt.editPengajuan.dosen', $pengajuan->id_pengajuan) }}"
                                                            class="btn btn-info">Edit</a>
                                                    @endif
                                                </div>

                                                <div>
                                                    <!-- <a href="{{ route('oppt.statusPengajuan.dosen', $pengajuan->id_pengajuan) }}" class="btn btn-dark">Detail Status</a> -->
                                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#detailModal">
                                                        Buka Status
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog medium-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Status Pengajuan Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Periode Pengajuan: {{ $pengajuan->id_periode }}</h4>
                        <p><strong>Tanggal Dibuat:</strong> {{ $pengajuan->created_at }}</p>
                        <p><strong>Terakhir Diubah:</strong> {{ $pengajuan->updated_at }}</p>

                        <h5>Daftar Dosen yang Diajukan:</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Dosen</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Tanggal Diajukan</th>
                                    <th>Tanggal Disetujui</th>
                                    <th>Tanggal Ditolak</th>
                                    <th>Pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan->user as $dosen)
                                    <tr>
                                        <td>{{ $dosen->name }}</td>
                                        <td>{{ $dosen->email }}</td>
                                        <td>{{ $dosen->pivot->status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($dosen->pivot->created_at)->format('d-m-Y') }}</td>
                                        <td>{{ $dosen->pivot->tanggal_disetujui ?? '-' }}</td>
                                        <td>{{ $dosen->pivot->tanggal_ditolak ?? '-' }}</td>
                                        <td>{{ $dosen->pivot->pesan ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group" id="action-buttons">
                            <button type="button" class="btn btn-info mt-4 me-auto" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<style>
.medium-modal {
    max-width: 1000px;
}
</style>

    </div>
@endsection
