@extends('layouts.home.app')
@section('title', 'Pangkat')
@section('userTypeOnPage', 'SuperAdmin, Perencanaan')
@section('content')
    <div class="content-wrapper">
        <div class="home-tab">

            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail Pangkat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat Pangkat</a>
                    </li>
                </ul>
            </div>

            {{-- modal edit --}}
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Pangkat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editJabatanForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="edit_id_pangkat_dosen" name="edit_id_pangkat_dosen">

                                <div class="form-group">
                                    <label for="edit_nama_pangkat">Nama Jabatan Fungsional</label>
                                    <input type="text" class="form-control" id="edit_nama_pangkat" name="nama_pangkat"
                                        required>
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

                                    <h4 class="card-title">Data Pangkat</h4>

                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                        data-bs-target="#createModal">
                                        Create Pangkat
                                    </button>

                                    @if ($pangkat_dosen->isEmpty())
                                        <p class="card-description">
                                            No Data Pangkat Dosen records found. </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th> ID </th>
                                                        <th> Nama Pangkat </th>
                                                        <th> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pangkat_dosen as $pangkat)
                                                        <tr>
                                                            <td>{{ $pangkat_dosen->firstItem() + $loop->index }}</td>
                                                            <td>{{ $pangkat->nama_pangkat }}</td>
                                                            <td>
                                                                <!-- Edit button (Redirect to Edit Page) -->
                                                                    <button type="button"
                                                                        class="btn btn-warning btn-sm edit-btn"
                                                                        data-id="{{ $pangkat->id_pangkat_dosen }}"
                                                                        data-nama="{{ $pangkat->nama_pangkat }}"
                                                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                                                        Edit
                                                                    </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $pangkat_dosen->links() }}
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
                                        <h5 class="modal-title" id="createModalLabel">Create Pangkat</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="createPangkatForm">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_pangkat">Nama Jabatan Fungsional</label>
                                                <input type="text" class="form-control" id="nama_pangkat"
                                                    name="nama_pangkat" required>
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
                                    <h4 class="card-title">Buat Pangkat Dosen Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('pangkat.create') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_pangkat">Nama Pangkat</label>
                                                <input type="text" name="nama_pangkat" id="nama_pangkat"
                                                    class="form-control" placeholder="" value="{{ old('nama_pangkat') }}"
                                                    required>
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2">Buat Pangkat</button>
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

            $('#createPangkatForm').on('submit', function(e) {
                e.preventDefault();

                $('#success-message').hide();
                $('#error-message').hide();
                $('#error-list').empty();

                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('pangkat.create') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {

                        if (response)(
                            location.reload()
                        )
                        $('#pangkat-table-body').append(`
                            <tr>
                                <td>${response.id_pangkat_dosen}</td>
                                <td>${response.nama_pangkat}</td>

                                <td>
                                    <a href="{{ route('pangkat.edit', '') }}/${response.id_pangkat_dosen}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        `);

                        $('#success-message').text('Pangkat created successfully!').show();

                        $('#createModal').modal('hide');

                        $('#createPangkatForm')[0].reset();
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

                $('#edit_id_pangkat_dosen').val(id);
                $('#edit_nama_pangkat').val(nama);

                $('#editModal').modal('show');
            });


            $('#editJabatanForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var id = $('#edit_id_pangkat_dosen').val();

                $.ajax({
                    url: '{{ route('pangkat.update', '') }}/' + id,
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
