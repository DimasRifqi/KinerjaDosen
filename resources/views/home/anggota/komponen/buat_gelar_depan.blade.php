@extends('layouts.home.app')
@section('title', 'Gelar Depan')
@section('userTypeOnPage', 'SuperAdmin, Perencanaan')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Gelar Depan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Gelar Depan</a>
                    </li>
                </ul>
            </div>

            {{-- modal edit --}}
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Gelar Depan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editGelarDForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="edit_id_gelar_depan" name="id_gelar_depan">

                                <div class="form-group">
                                    <label for="edit_nama_gelar_depan">Nama Gelar Depan</label>
                                    <input type="text" class="form-control" id="edit_nama_gelar_depan" name="nama_gelar_depan"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status :</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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

                                    <h4 class="card-title">Data Gelar Depan</h4>

                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                        data-bs-target="#createModal">
                                        Create Gelar Depan
                                    </button>

                                    @if ($gelarD->isEmpty())
                                        <p class="card-description">
                                            No Data Gelar Depan records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Gelar Depan</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($gelarD as $key => $gelar)
                                                        <tr>
                                                            <td>{{ $gelarD->firstItem() + $loop->index }}</td>
                                                            <td>{{ $gelar->nama_gelar_depan }}</td>
                                                            <td>
                                                                @if ($gelar->status == 1)
                                                                    Aktif
                                                                @else
                                                                    Tidak Aktif
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-warning btn-sm edit-btn"
                                                                    data-id="{{ $gelar->id_gelar_depan }}"
                                                                    data-nama="{{ $gelar->nama_gelar_depan }}"
                                                                    data-status="{{ $gelar->status }}"
                                                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                                                    Edit
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $gelarD->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createModalLabel">Create Gelar Depan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="createGelarDForm">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_gelar_depan">Nama Gelar Depan</label>
                                                <input type="text" class="form-control" id="nama_gelar_depan"
                                                    name="nama_gelar_depan" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status:</label>
                                                <select name="status" id="status" class="form-select" required>
                                                    <option value="1">Active</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-success">Save</button>
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
                                    <h4 class="card-title">Buat Gelar Depan Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('gelar-depan.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_gelar_depan">Nama Gelar Depan</label>
                                                <input type="text" id="nama_gelar_depan" name="nama_gelar_depan"
                                                    class="form-control" placeholder="Silahkan Masukkan Gelar"
                                                    value="{{ old('nama_gelar_depan') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" id="status" class="form-select" required>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Tidak Aktif</option>
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

            $('#createGelarDForm').on('submit', function(e) {
                e.preventDefault();

                $('#success-message').hide();
                $('#error-message').hide();
                $('#error-list').empty();

                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('gelar-depan.store') }}',
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        if (response)(
                            location.reload()
                        )
                        $('#GelarD-table-body').append(`
                            <tr>
                                <td>${response.id_gelar_depan}</td>
                                <td>${response.nama_gelar_depan}</td>
                                <td>${response.status}</td>

                                <td>
                                    <a href="/gelar_depan/edit/${response.id_gelar_depan}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        `);

                        $('#success-message').text('Gelar Depan created successfully!').show();

                        $('#createModal').modal('hide');

                        $('#createGelarDForm')[0].reset();
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
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var status = $(this).data('status');

                $('#edit_id_gelar_depan').val(id);
                $('#edit_nama_gelar_depan').val(nama);
                $('#status').val(status);

                $('#editModal').modal('show');
            });


            $('#editGelarDForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var id = $('#edit_id_gelar_depan').val();

                $.ajax({
                    url: '{{ route('gelar-depan.update', '') }}/' + id,
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
