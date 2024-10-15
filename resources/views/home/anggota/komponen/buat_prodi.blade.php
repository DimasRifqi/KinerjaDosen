@extends('layouts.home.app')
@section('title', 'Program Studi')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Program Studi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Program Studi</a>
                    </li>
                </ul>
            </div>

            {{-- modal edit --}}
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Program Studi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editProdiForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="edit_id_prodi" name="id_prodi">

                                <div class="form-group">
                                    <label for="edit_nama_prodi">Nama Program Studi</label>
                                    <input type="text" class="form-control" id="edit_nama_prodi" name="nama_prodi"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status :</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <!-- pada dropdown select value ini jika status sudah diubah menjadi inactive, saat memasuki tombol select tetap berada pada pilihan active, bagaimana cara agar nama status yang tertera sesuai dengan pilihan pada select -->
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

                                    <h4 class="card-title">Data Program Studi</h4>

                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                        data-bs-target="#createModal">
                                        Create Program Studi
                                    </button>

                                    @if ($prodi->isEmpty())
                                        <p class="card-description">
                                            No Data Program Studi records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th> ID Prodi </th>
                                                        <th> Nama Prodi </th>
                                                        <th> Status </th>
                                                        <th> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prodi as $item)
                                                        <tr>
                                                            <td>{{ $prodi->firstItem() + $loop->index }}</td>
                                                            <td>{{ $item->nama_prodi }}</td>
                                                            <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-warning btn-sm edit-btn"
                                                                    data-id="{{ $item->id_prodi }}"
                                                                    data-nama="{{ $item->nama_prodi }}"
                                                                    data-status="{{ $item->status }}"
                                                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                                                    Edit
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $prodi->links() }}
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
                                        <h5 class="modal-title" id="createModalLabel">Create Program Studi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="createProdiForm">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_univ">Nama Program Studi</label>
                                                <input type="text" class="form-control" id="nama_prodi"
                                                    name="nama_prodi" value="{{ old('nama_prodi') }}" required>
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
                                    <h4 class="card-title">Buat Program Studi Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('prodi.create') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_prodi">Nama Prodi:</label>
                                                <input type="text" name="nama_prodi" id="nama_prodi" class="form-control"
                                                    value="{{ old('nama_prodi') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="form-label">Status:</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <option value="1" selected>Active</option>
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

        $('#createProdiForm').on('submit', function(e) {
            e.preventDefault();

            $('#success-message').hide();
            $('#error-message').hide();
            $('#error-list').empty();

            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('prodi.create') }}',
                method: 'POST',
                data: formData,
                success: function(response) {

                    if (response)(
                        location.reload()
                    )
                    $('#univ-table-body').append(`
                        <tr>
                            <td>${response.id_prodi}</td>
                            <td>${response.nama_prodi}</td>
                            <td>${response.status}</td>

                            <td>
                                <a href="/prodi/edit/${response.id_prodi}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    `);

                    $('#success-message').text('Prodi created successfully!').show();

                    $('#createModal').modal('hide');

                    $('#createProdiForm')[0].reset();
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

            $('#edit_id_prodi').val(id);
            $('#edit_nama_prodi').val(nama);
            $('#status').val(status);

            $('#editModal').modal('show');
        });


        $('#editProdiForm').on('submit', function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            var id = $('#edit_id_prodi').val();

            $.ajax({
                url: '/prodi/update/' + id,
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
