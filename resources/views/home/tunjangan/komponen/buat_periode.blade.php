@extends('layouts.home.app')
@section('title', 'Periode')
@section('userTypeOnPage', 'SuperAdmin, Perencanaan')
@section('content')

    {{-- modal create --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Buat Periode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="createPeriodeForm">
                        @csrf
                        <div class="form-group">
                            <label for="nama_periode">Nama Periode</label>
                            <input type="text" class="form-control" id="nama_periode" name="nama_periode" required>
                        </div>

                        <div class="form-group">
                            <label for="tipe_periode">Tipe Periode</label>
                            <select class="form-control" id="tipe_periode" name="tipe_periode" required>
                                <option value="">Pilih Tipe</option>
                                <option value="0">Bulanan</option>
                                <option value="1">Perioder</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="masa_periode_awal">Masa Periode Awal</label>
                            <input type="date" class="form-control" id="masa_periode_awal" name="masa_periode_awal"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="masa_periode_akhir">Masa Periode Akhir</label>
                            <input type="date" class="form-control" id="masa_periode_akhir" name="masa_periode_akhir"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary text-white">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Periode -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Ubah Periode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPeriodeForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id_periode" name="id_periode">

                        <div class="form-group">
                            <label for="edit_nama_periode">Nama Periode</label>
                            <input type="text" class="form-control" id="edit_nama_periode" name="nama_periode" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_tipe_periode">Tipe Periode</label>
                            <select class="form-control" id="edit_tipe_periode" name="tipe_periode" required>
                                <option value="0">Bulanan</option>
                                <option value="1">Periode</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="edit_masa_periode_awal">Masa Periode Awal</label>
                            <input type="date" class="form-control" id="edit_masa_periode_awal" name="masa_periode_awal" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_masa_periode_berakhir">Masa Periode BerAkhir</label>
                            <input type="date" class="form-control" id="edit_masa_periode_berakhir" name="masa_periode_berakhir" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_status">Status</label>
                            <select class="form-control" id="edit_status" name="status" required>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-warning">Ubah</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview">

                            <div class="card">
                                <div class="card-body">
                                    <!-- Display Success Message -->
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <!-- Display Validation Errors -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <h4 class="card-title">Semua Periode</h4>
                                    <button type="button" class="btn btn-primary mb-3 text-white" data-bs-toggle="modal"
                                        data-bs-target="#createModal">
                                        Buat Periode
                                    </button>
                                    @if ($periode->isEmpty())
                                        <p class="card-description">
                                            No Periode records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th> ID </th>
                                                        <th> Nama Periode </th>
                                                        <th> Tipe Periode </th>
                                                        <th> Masa Periode Awal </th>
                                                        <th> Masa Periode Berakhir </th>
                                                        <th> Status </th>
                                                        <th> Edit </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($periode as $item)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $item->nama_periode }}</td>
                                                            <td>{{ $item->tipe_periode ? 'Semester' : 'Bulanan' }}</td>
                                                            <td>{{ $item->masa_periode_awal }}</td>
                                                            <td>{{ $item->masa_periode_berakhir }}</td>
                                                            <td>
                                                                @if ($item->status == 1)
                                                                    <span class="badge bg-success">Aktif</span>
                                                                @else
                                                                    <span class="badge bg-danger">Tidak Aktif</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-warning btn-sm edit-btn"
                                                                    data-id="{{ $item->id_periode }}"
                                                                    data-nama_periode="{{ $item->nama_periode }}"
                                                                    data-tipe_periode="{{ $item->tipe_periode }}"
                                                                    data-masa_periode_awal="{{ $item->masa_periode_awal }}"
                                                                    data-masa_periode_berakhir="{{ $item->masa_periode_berakhir }}"
                                                                    data-status="{{ $item->status }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editModal">Edit</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var currentStatus = '';

            $('#createPeriodeForm').on('submit', function(e) {
                e.preventDefault();

                $('#success-message').hide();
                $('#error-message').hide();
                $('#error-list').empty();

                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('periode.create') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response) {
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (var error in errors) {
                                $('#error-list').append(`<li>${errors[error][0]}</li>`);
                            }
                            $('#error-message').show();
                        }
                    }
                });
            });

            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                var nama_periode = $(this).data('nama_periode');
                var tipe_periode = $(this).data('tipe_periode');
                var masa_periode_awal = $(this).data('masa_periode_awal');
                var masa_periode_berakhir = $(this).data('masa_periode_berakhir');
                var status = $(this).data('status');

                $('#edit_id_periode').val(id);
                $('#edit_nama_periode').val(nama_periode);
                $('#edit_tipe_periode').val(tipe_periode);
                $('#edit_masa_periode_awal').val(masa_periode_awal);
                $('#edit_masa_periode_berakhir').val(masa_periode_berakhir);
                $('#edit_status').val(status);

                $('#editModal').modal('show');
            });


            $('#editPeriodeForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var id = $('#edit_id_periode').val();

                $.ajax({
                    url: '{{ route('periode.update', '') }}/' +
                    id,
                    method: 'PUT',
                    data: formData,
                    success: function(response) {
                        if (response.success) {

                            location.reload();
                        } else {
                            alert('Gagal mengubah data.');
                        }
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });


            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                fetch_data(1, currentStatus);
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page, currentStatus);
            });

            $(document).on('click', '.status-filter-option', function(e) {
                e.preventDefault();
                currentStatus = $(this).data('status');
                fetch_data(1, currentStatus);
            });

            function fetch_data(page, status = '') {
                var search = $('#search').val();

                $.ajax({
                    url: "{{ route('univ.index') }}?page=" + page + "&search=" + search + "&status=" +
                        status,
                    success: function(data) {
                        $('#pagination-data').html(data.html);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: " + xhr.responseText);
                    }
                });
            }
        });
    </script>
@endsection
