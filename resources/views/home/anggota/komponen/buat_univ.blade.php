@extends('layouts.home.app')
@section('title', 'Universitas')
@section('userTypeOnPage', 'SuperAdmin, Perencanaan')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Universitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Universitas</a>
                    </li>
                </ul>
            </div>

            <!-- Modal Edit Universitas -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Ubah Universitas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editUnivForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="edit_id_universitas" name="id_universitas">

                                <div class="form-group">
                                    <label for="edit_nama_univ">Nama Universitas</label>
                                    <input type="text" class="form-control" id="edit_nama_univ" name="nama_universitas"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="edit_id_kota">Kota</label>
                                    <select class="form-control" id="edit_id_kota" name="id_kota" required>
                                        <option value="">Pilih Kota</option>
                                        @foreach ($kota as $kt)
                                            <option value="{{ $kt->id_kota }}">{{ $kt->nama_kota }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="edit_tipe">Tipe</label>
                                    <select class="form-control" id="edit_tipe" name="tipe" required>
                                        <option value="pemerintahan">Pemerintahan</option>
                                        <option value="lldikti">LLDIKTI</option>
                                        <option value="universitas">Universitas</option>
                                    </select>
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


            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <div id="success-message" class="alert alert-success" style="display:none;"></div>

                                    <div id="error-message" class="alert alert-danger" style="display:none;">
                                        <ul id="error-list"></ul>
                                    </div>

                                    <h4 class="card-title">Data Universitas</h4>

                                    <!-- Form Pencarian (terpisah dari filter status) -->
                                    <form id="searchForm" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="search" id="search"
                                                placeholder="Cari berdasarkan nama universitas, kota, tipe"
                                                value="{{ request()->input('search') }}">
                                            <button class="btn btn-primary text-white" type="submit">Cari / Reset</button>
                                        </div>
                                    </form>

                                    <button type="button" class="btn btn-primary mb-3 text-white" data-bs-toggle="modal"
                                        data-bs-target="#createModal">
                                        Buat Universitas
                                    </button>

                                    <div class="table-responsive" id="pagination-data">
                                        @if ($univ->isEmpty())
                                            <div class="alert alert-warning text-center">
                                                <strong>Tidak Ada Data yang ditemukan</strong>
                                            </div>
                                        @else
                                            @include('home.anggota.komponen.pagination_univ')
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createModalLabel">Buat Universitas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="createUnivForm">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_universitas">Nama Universitas</label>
                                                <input type="text" class="form-control" id="nama_universitas"
                                                    name="nama_universitas" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_kota">Kota</label>
                                                <select class="form-control" id="id_kota" name="id_kota" required>
                                                    <option value="">Pilih Kota</option>
                                                    @foreach ($kota as $kt)
                                                        <option value="{{ $kt->id_kota }}">{{ $kt->nama_kota }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="tipe">Tipe</label>
                                                <select class="form-control" id="tipe" name="tipe" required>
                                                    <option value="">Pilih Tipe</option>
                                                    <option value="pemerintahan">Pemerintahan</option>
                                                    <option value="lldikti">LLDIKTI</option>
                                                    <option value="universitas">Universitas</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary text-white">Simpan</button>
                                        </form>
                                    </div>
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

            $('#createUnivForm').on('submit', function(e) {
                e.preventDefault();

                $('#success-message').hide();
                $('#error-message').hide();
                $('#error-list').empty();

                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('univ.create') }}',
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
                var nama = $(this).data('nama');
                var kota = $(this).data('kota');
                var tipe = $(this).data('tipe');
                var status = $(this).data('status');

                $('#edit_id_universitas').val(id);
                $('#edit_nama_univ').val(nama);
                $('#edit_id_kota').val(kota);
                $('#edit_tipe').val(tipe);
                $('#edit_status').val(status);

                $('#editModal').modal('show');
            });

            $('#editUnivForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var id = $('#edit_id_universitas').val();

                $.ajax({
                    url: '{{ route('univ.update', '') }}/' + id,
                    method: 'PUT',
                    data: formData,
                    success: function(response) {
                        location.reload();
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
