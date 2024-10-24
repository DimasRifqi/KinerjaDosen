@extends('layouts.home.app')
@section('title', 'Data Dosen')
@section('userTypeOnPage', 'SuperAdmin, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Dosen</h4>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($dosen->isEmpty())
                            <div class="alert alert-warning">
                                Tidak ada dosen yang ditemukan.
                            </div>
                        @else
                            @include('home.anggota.dosen.pagination_dosen_oppt')
                            {{-- <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>NIDN</th>
                                            <th>Universitas</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            <th>Edit</th>
                                            <th>Riwayat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dosen as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->nidn }}</td>
                                                <td>{{ $item->universitas->nama_universitas ? $item->universitas->nama_universitas : '-' }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $item->status == 'aktif' ? 'success' : ($item->status == 'non-aktif' ? 'danger' : ($item->status == 'pensiun' ? 'secondary' : 'warning')) }}">
                                                        {{ ucfirst($item->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('oppt.updateStatus.dosen', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <!-- Dropdown untuk memilih status -->
                                                        <div class="input-group">
                                                            <select name="status" class="form-select form-select-sm">
                                                                <option value="aktif"
                                                                    {{ $item->status == 'aktif' ? 'selected' : '' }}>Aktif
                                                                </option>
                                                                <option value="non-aktif"
                                                                    {{ $item->status == 'non-aktif' ? 'selected' : '' }}>
                                                                    Non-Aktif</option>
                                                                <option value="pensiun"
                                                                    {{ $item->status == 'pensiun' ? 'selected' : '' }}>
                                                                    Pensiun</option>
                                                                <option value="belajar"
                                                                    {{ $item->status == 'belajar' ? 'selected' : '' }}>
                                                                    Belajar</option>
                                                            </select>
                                                            <div>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{ route('oppt.edit.dosen', $item->id) }}"><button
                                                            type="submit" class="btn btn-warning btn-sm">Edit</button></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('oppt.history.dosen', $item->id) }}">
                                                        <button type="submit"
                                                            class="btn btn-primary btn-sm">Riwayat</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> --}}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Setup token CSRF untuk request POST
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Fungsi untuk mengambil data dari halaman yang diklik
            function fetch_data(page) {
                $.ajax({
                    url: "?page=" + page, // Mengambil halaman yang diklik
                    type: "GET", // Metode GET untuk pagination
                    success: function(response) {
                        // Mengupdate table dan pagination di HTML
                        $('.table-responsive').html(response.html);
                        $('.pagination-links').html(response.pagination);
                    },
                    error: function(xhr) {
                        console.error("Terjadi kesalahan:", xhr.responseText);
                    }
                });
            }

            // Saat link pagination diklik
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault(); // Mencegah reload halaman
                var page = $(this).attr('href').split('page=')[1]; // Mendapatkan nomor halaman
                fetch_data(page); // Panggil fungsi fetch_data untuk memuat data
            });
        });
    </script>

@endsection
