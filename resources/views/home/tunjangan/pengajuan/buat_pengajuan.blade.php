@extends('layouts.home.app')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Buat Pengajuan</h4>
                        <form action="{{ route('oppt.ajukan.dosen') }}" method="POST">
                            <div class="form-group">
                                <label for="id_periode" class="form-label">Periode</label>
                                <select class="js-example-basic-single w-100" name="id_periode" id="id_periode" required>
                                    <option value="AL">Mohon Pilih Satu</option>
                                    @foreach ($periodes as $periode)
                                        <option value="{{ $periode->id_periode }}">{{ $periode->nama_periode }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Pilih Dosen</label>
                                <select class="js-example-basic-multiple w-100" multiple="multiple">
                                    <option value="AL">Mohon Pilih</option>
                                    @foreach ($dosen as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajukan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
