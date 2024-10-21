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
                            @include('home.anggota.dosen.pagination_dosen_opt')
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
            var currentStatus = '';

            // Submit form create bank
            $('#createBankForm').on('submit', function(e) {
                e.preventDefault();

                $('#success-message').hide();
                $('#error-message').hide();
                $('#error-list').empty();

                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('bank.create') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response) {
                            location.reload(); // Reload halaman jika berhasil
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (var error in errors) {
                                $('#error-list').append(`<li>${errors[error][0]}</li>`);
                            }
                            $('#error-message').show(); // Tampilkan error
                        }
                    }
                });
            });

            // Tampilkan modal edit dan isi form dengan data yang diklik
            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var status = $(this).data('status');

                $('#edit_id_bank').val(id);
                $('#edit_nama_bank').val(nama);
                $('#edit_status').val(status);

                $('#editModal').modal('show'); // Tampilkan modal edit
            });

            // Submit form edit bank
            $('#editBankForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var id = $('#edit_id_bank').val();

                $.ajax({
                    url: '{{ route('bank.update', '') }}/' + id,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        location.reload(); // Reload halaman jika berhasil
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan');
                    }
                });
            });

            // Filter status dosen
            $(document).on('click', '.status-filter-option', function(e) {
                e.preventDefault();
                currentStatus = $(this).data('aksi'); // Ambil status dari filter yang dipilih
                fetch_data(1, currentStatus); // Panggil fungsi fetch_data dengan status yang dipilih
            });

            // Fungsi untuk fetch data dengan filter dan pagination
            function fetch_data(page, status = '') {
                var search = $('#search').val(); // Ambil nilai search jika ada

                $.ajax({
                    url: "{{ route('oppt.index.dosen') }}?page=" + page + "&search=" + search + "&status=" +
                        status,
                    success: function(data) {
                        $('#pagination-data').html(data.html); // Update HTML dengan data yang diterima
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: " + xhr.responseText);
                    }
                });
            }
        });
    </script>
@endsection
