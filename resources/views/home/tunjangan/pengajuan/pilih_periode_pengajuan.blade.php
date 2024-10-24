@extends('layouts.home.app')
@section('title', 'Pilih Periode Pengajuan Tunjangan')
@section('userTypeOnPage', 'SuperAdmin, OPPT')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pilih Periode Pengajuan</h4>

                        @foreach ($periode as $p)
                            <p>{{ $p->nama_periode }}</p>
                            <a href="{{ route('oppt.pengajuan.dosen', $p->id_periode) }}"> pilih</a>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
