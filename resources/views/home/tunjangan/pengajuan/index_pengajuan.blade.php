@extends('layouts.home.app')

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
                                                @if ($pengajuan->periode->tipe_periode == true)
                                                    <a href="{{ route('oppt.pengajuanShow.dosen', $pengajuan->id_pengajuan) }}"
                                                        class="btn btn-primary">Ajukan Dokumen Bulanan</a>
                                                @else
                                                    <a href="{{ route('oppt.pengajuanSemesterShow.dosen', $pengajuan->id_pengajuan) }}"
                                                        class="btn btn-success">Ajukan Dokumen Semester</a>
                                                @endif

                                                <form
                                                    action="{{ route('oppt.draftPengajuan.dosen', $pengajuan->id_pengajuan) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    @if ($pengajuan->draft == false)
                                                        <button type="submit" class="btn btn-success">Set to
                                                            Sukses</button>
                                                    @endif
                                                </form>
                                                @if ($pengajuan->draft == false)
                                                    <a href="{{ route('oppt.editPengajuan.dosen', $pengajuan->id_pengajuan) }}"
                                                        class="btn btn-info">Edit</a>
                                                @endif
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
    </div>
@endsection
