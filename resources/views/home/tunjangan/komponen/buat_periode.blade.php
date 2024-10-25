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
                                <option value="0">Semester</option>
                                <option value="1">Bulanan</option>
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

                        <div class="form-group">
                        <label for="masa_periode_akhir">Pilih Periode BKD</label>
                        <select name="id_child" id="id_child">
                            <option value="">Pilih BKD</option>
                                <option class="text text-danger" value=''>BKD baru</option>
                        @foreach ($bkd as $bkd)


                                <option value="{{$bkd->id_periode }}">{{ $bkd->nama_periode }}</option>

                        @endforeach
                    </select>
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
                                <option value="0">Semester</option>
                                <option value="1">Bulanan</option>
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

            function fetch_data(page) {
                $.ajax({
                    url: "?page=" + page,
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
                fetch_data(page);
            });


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

        });
    </script> --}}
    <script>
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

            // Event klik pada pagination link
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1]; // Ambil nomor halaman
                var search = $('#search').val(); // Ambil nilai pencarian
                fetch_data(page, search); // Panggil fungsi fetch data dengan halaman dan pencarian
            });

            // Event submit pada form pencarian
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                var search = $('#search').val(); // Ambil nilai pencarian
                fetch_data(1, search); // Fetch data dari halaman 1 berdasarkan pencarian
            });

            // Logika untuk create dan edit periode tetap sama seperti sebelumnya
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
