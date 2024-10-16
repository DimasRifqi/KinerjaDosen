@extends('layouts.home.app')
@section('title', 'Periode')
@section('userTypeOnPage', 'SuperAdmin, Perencanaan')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Periode</h4>
                        <p class="card-description">
                            Lorem, ipsum dolor sit amet </p>
                        <div class="table-responsive">
                            {{-- @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif --}}
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            ID Periode
                                        </th>
                                        <th>
                                            Nama Periode
                                        </th>
                                        <th>
                                            Tipe Periode
                                        </th>
                                        <th>
                                            Masa Periode Awal
                                        </th>
                                        <th>
                                            Masa Periode Berakhir
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        {{-- <th>
                                            Aksi
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periode as $p)
                                        <tr>
                                            <td class="py-1">
                                                {{ $p->id_periode }}
                                            </td>
                                            <td>{{ $p->nama_periode }}</td>
                                            <td>{{ $p->tipe_periode ? 'Bulanan' : 'Semester' }}</td>
                                            <td>{{ $p->masa_periode_awal }}</td>
                                            <td>{{ $p->masa_periode_berakhir }}</td>
                                            <td>{{ $p->status ? 'Aktif' : 'Non-Aktif' }}</td>
                                            {{-- <td><a href="{{ route('oppt.pengajuan.dosen', $p->id_periode) }}">Ajukan</a>
                                            </td> --}}
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
