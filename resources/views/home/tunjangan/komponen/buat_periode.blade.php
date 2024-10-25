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
                                <option value="1">Semester</option>
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
                                <option value="1">Semester</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="edit_masa_periode_awal">Masa Periode Awal</label>
                            <input type="date" class="form-control" id="edit_masa_periode_awal" name="masa_periode_awal"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="edit_masa_periode_berakhir">Masa Periode BerAkhir</label>
                            <input type="date" class="form-control" id="edit_masa_periode_berakhir"
                                name="masa_periode_berakhir" required>
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

                                    <div id="success-alert" class="alert alert-success" role="alert"
                                        style="display:none;">
                                        Data berhasil disimpan!
                                    </div>
                                    <div id="error-alert" class="alert alert-danger" role="alert"
                                        style="display:none;">
                                        Terjadi kesalahan, silakan coba lagi!
                                    </div>


                                    <h4 class="card-title">Semua Periode</h4>

                                    <form id="searchForm" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="search" id="search"
                                                placeholder="Cari berdasarkan nama periode"
                                                value="{{ request()->input('search') }}">
                                            <button class="btn btn-primary text-white" type="submit">Cari /
                                                Reset</button>
                                        </div>
                                    </form>

                                    <button type="button" class="btn btn-primary mb-3 text-white" data-bs-toggle="modal"
                                        data-bs-target="#createModal">
                                        Buat Periode
                                    </button>
                                    @if ($periodes->isEmpty())
                                        <p class="card-description">
                                            No Periode records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            @include('home.tunjangan.komponen.pagination_periode', [
                                                'periodes' => $periodes,
                                            ])
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
    {{-- <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function fetch_data(page, search = '') {
                $.ajax({
                    url: "?page=" + page + "&search=" + search,
                    type: "GET",
                    success: function(response) {
                        $('.table-responsive').html(response.html);
                    },
                    error: function(xhr) {
                        console.error("Terjadi kesalahan:", xhr.responseText);
                    }
                });
            }

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var search = $('#search').val();
                fetch_data(page, search);
            });


            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                var search = $('#search').val();
                fetch_data(1, search);
            });

            $('#createPeriodeForm').on('submit', function(e) {
                e.preventDefault();
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
                    url: '{{ route('periode.update', '') }}/' + id,
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
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Function to fetch filtered data
            function fetch_data(page, search = '', tipe_periode = '', status = '') {
                $.ajax({
                    url: "?page=" + page + "&search=" + search + "&tipe_periode=" + tipe_periode +
                        "&status=" + status,
                    type: "GET",
                    success: function(response) {
                        $('.table-responsive').html(response.html);
                    },
                    error: function(xhr) {
                        console.error("Terjadi kesalahan:", xhr.responseText);
                    }
                });
            }

            // Pagination click handler
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var search = $('#search').val();
                var tipe_periode = $('#tipePeriodeDropdown').data('selected');
                var status = $('#statusDropdown').data('selected');
                fetch_data(page, search, tipe_periode, status);
            });

            // Search form submit handler
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                var search = $('#search').val();
                var tipe_periode = $('#tipePeriodeDropdown').data('selected');
                var status = $('#statusDropdown').data('selected');
                fetch_data(1, search, tipe_periode, status);
            });

            // Filter by Tipe Periode
            $(document).on('click', '.tipe-filter-option', function(e) {
                e.preventDefault();
                var tipe_periode = $(this).data('tipe');
                $('#tipePeriodeDropdown').data('selected', tipe_periode);
                var search = $('#search').val();
                var status = $('#statusDropdown').data('selected');
                fetch_data(1, search, tipe_periode, status);
            });

            // Filter by Status
            $(document).on('click', '.status-filter-option', function(e) {
                e.preventDefault();
                var status = $(this).data('status');
                $('#statusDropdown').data('selected', status);
                var search = $('#search').val();
                var tipe_periode = $('#tipePeriodeDropdown').data('selected');
                fetch_data(1, search, tipe_periode, status);
            });
            
            $('#createPeriodeForm').on('submit', function(e) {
                e.preventDefault();
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
                    url: '{{ route('periode.update', '') }}/' + id,
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
        });
    </script>
@endsection
