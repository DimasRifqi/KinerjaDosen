@extends('layouts.home.app')
@section('title', 'Sunting Pengajuan Tunjangan')
@section('userTypeOnPage', 'SuperAdmin, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sunting Pengajuan</h4>
                        <form action="{{ route('oppt.updatePengajuan.dosen', $pengajuan->id_pengajuan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_periode" class="form-label">Periode</label>
                                <select class="form-control" name="id_periode" id="id_periode" required>
                                    @foreach ($periode as $periode)
                                        <option value="{{ $periode->id_periode }}"
                                            {{ $periode->id_periode == $pengajuan->id_periode ? 'selected' : '' }}>
                                            {{ $periode->nama_periode }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Pilih Dosen</label>
                                <select class="js-example-basic-multiple w-100" multiple="multiple" name="dosen_ids[]">
                                    @foreach ($dosen as $dosen)
                                        <option value="{{ $dosen->id }}"
                                            {{ $pengajuan->user->contains($dosen->id) ? 'selected' : '' }}>
                                            {{ $dosen->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Sunting Pengajuan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
