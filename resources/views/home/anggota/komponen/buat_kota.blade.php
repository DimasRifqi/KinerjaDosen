@extends('layouts.home.app')
@section('title', 'Kota')
@section('userTypeOnPage', 'SuperAdmin, Perencanaan')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Kota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Kota</a>
                    </li>
                </ul>
            </div>

            {{-- modal edit --}} <!--belum bisa edit prov tidak tampil  -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Kota</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editKotaForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="nama_kota" name="nama_kota">

                                <div class="form-group">
                                    <label for="edit_nama_kota">Nama Kota</label>
                                    <input type="text" class="form-control" id="edit_nama_kota" name="nama_kota"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="edit_id_provinsi">Provinsi</label>
                                    <select class="form-control" id="edit_id_provinsi" name="id_provinsi" required>
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
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

                                    <div class="d-flex" style="justify-content: space-between; padding: 10px 20px;">
                                        <h4>
                                            Data Kota
                                        </h4>

                                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                            data-bs-target="#createModal">
                                            Create Kota
                                        </button>

                                        {{-- <div class="search-container">
                                            <div class="input-group">
                                                <input class="form-control"
                                                    style="background: none; border: none; display: flex; align-items: center;"
                                                    id="searchInput" type="text" placeholder="Search" autocomplete="on">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        style="background: none; border: none; padding-left: 0; display: flex; align-items: center;">
                                                        <i class="mdi mdi-magnify"
                                                                style="background: none;"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    @if ($kota->isEmpty())
                                        <p class="card-description">
                                            No Data Kota records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="tableKota">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Kota</th>
                                                        <th>Provinsi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kota as $item)
                                                        <tr>
                                                            <td>{{ $kota->firstItem() + $loop->index }}</td>
                                                            <td>{{ $item->nama_kota }}</td>
                                                            <td>Jawa Timur</td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-warning btn-sm edit-btn"
                                                                    data-nama="{{ $item->nama_kota }}"
                                                                    data-prov="{{ $item->id_provinsi }}"
                                                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                                                    Edit
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $kota->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!--create belum bisa tersimpan  -->
                        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createModalLabel">Create Universitas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="createKotaForm">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_kota">Nama Kota</label>
                                                <input type="text" class="form-control" id="nama_kota"
                                                    name="nama_kota" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="id_provinsi">Provinsi</label>
                                                <select class="form-control" id="id_provinsi" name="id_provinsi" required>
                                                <option value="">Pilih Provinsi</option>
                                                @foreach($provinsi as $prov)
                                                    <option value="{{ $prov->id_provinsi }}">{{ $prov->nama_provinsi }}</option>
                                                @endforeach
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="home-tab">

            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show" id="audiences" role="tabpanel" aria-labelledby="audiences">

                    <div class="row justify-content-center">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Buat Kota Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('kota.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_kota">Nama Kota</label>
                                                <input type="text" name="nama_kota" id="nama_kota" class="form-control"
                                                    value="{{ old('nama_kota') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih Provinsi</label>
                                                <select name="status" id="status" class="form-select" required>
                                                    @foreach ($provinsi as $prov)
                                                        <option value="{{ $prov->id_provinsi }}">{{ $prov->nama_provinsi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2">Buat</button>
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

            $('#createKotaForm').on('submit', function(e) {
                e.preventDefault();

                $('#success-message').hide();
                $('#error-message').hide();
                $('#error-list').empty();

                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('kota.create') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {

                        if (response)(
                            location.reload()
                        )
                        $('#univ-table-body').append(`
                            <tr>
                                <td>${response.nama_kota}</td>
                                <td>${response.id_provinsi}</td>

                                <td>
                                    <a href="/kota/edit/${response.nama_kota}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        `);

                        $('#success-message').text('Kota created successfully!').show();

                        $('#createModal').modal('hide');

                        $('#createKotaForm')[0].reset();
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

            $('.edit-btn').on('click', function() {
                var nama = $(this).data('kota');
                var prov = $(this).data('provinsi');

                $('kota').val(kota);
                $('#provinsi').val(provinsi);

                $('#editModal').modal('show');
            });

            $('#editKotaForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var id = $('#edit_id_universitas').val();

                $.ajax({
                    url: '/univ/update/' + id,
                    method: 'POST',
                    data: formData,
                    success: function(response) {

                        location.reload();
                    },
                    error: function(xhr) {

                        alert('Terjadi kesalahan');
                    }
                });
            });
        });
    </script>
@endsection
