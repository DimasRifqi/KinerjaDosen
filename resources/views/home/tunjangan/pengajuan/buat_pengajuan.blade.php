@extends('layouts.home.app')
@section('title', 'Buat Pengajuan Tunjangan')
@section('userTypeOnPage', 'SuperAdmin, OPPT')

@section('content')
    <div class="content-wrapper" style="height: 100vh; overflow-y: auto;"> <!-- Set height to full viewport and allow vertical scroll -->
        <div class="row justify-content-center"> <!-- Removed h-100 to allow scrolling -->
            <div class="col-md-12 grid-margin stretch-card"> <!-- Change column to full width -->

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body d-flex flex-column"> <!-- Use flexbox for column layout -->
                        <h4 class="card-title mb-4">Buat Pengajuan Tunjangan : {{ $periode->nama_periode }} Id : {{ $periode->id_periode }}</h4>

                        <form action="{{ route('search.nama.dosen') }}" method="POST" class="mb-4"> <!-- Change to GET method -->
                            @csrf
                            <!-- Search input -->
                            <div class="form-group">
                                <label for="search" class="form-label">Cari Dosen</label>
                                <input type="text" class="form-control " name="search" id="search" placeholder="Masukkan Nama Dosen / NIDN" value="{{ request('search') }}">
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>

                        <form action="{{ route('oppt.ajukan.dosen', $periode->id_periode) }}" method="POST">
                            @csrf

                            <input type="hidden" name="id_periode" value="{{ $periode->id_periode }}">

                            <!-- Dosen selection with table -->
                            <div class="form-group mb-4">
                                <label class="form-label">Pilih Dosen</label>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th><input type="checkbox" id="select-all"> Pilih Semua</th>
                                                <th>Nama Dosen</th>
                                                <th>NIDN</th>
                                                <th>Status Dosen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($dosen->isEmpty())
                                                <tr>
                                                    <td colspan="5" class="text-center">Tidak ada dosen yang ditemukan.</td>
                                                </tr>
                                            @else
                                                @foreach ($dosen as $index => $dosenItem)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>
                                                            <input type="checkbox" name="dosen_ids[]" value="{{ $dosenItem->id }}" class="dosen-checkbox">
                                                        </td>
                                                        <td>{{ $dosenItem->name }}</td>
                                                        <td>{{ $dosenItem->nidn }}</td>
                                                        <td>{{ $dosenItem->status }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Ajukan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle select all functionality -->
    <script>
        document.getElementById('select-all').addEventListener('change', function(e) {
            const checkboxes = document.querySelectorAll('.dosen-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = e.target.checked;
            });
        });
    </script>
@endsection
