@extends('layouts.home.app')
@section('title', 'FAQ')
@section('userTypeOnPage', 'SuperAdmin, Verifikator, Perencanaan, Keuangan')
@section('content')
    @include('sweetalert::alert')
    <div class="content-wrapper">
        <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab"
                            aria-controls="overview" aria-selected="true">Detail FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab"
                            aria-selected="false">Buat FAQ</a>
                    </li>
                </ul>
            </div>

            {{-- modal create FAQ --}}
            <div class="modal fade" id="createFaqModal" tabindex="-1" aria-labelledby="createFaqModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createFaqModalLabel">Buat FAQ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="createFAQ">
                                @csrf
                                <div class="form-group">
                                    <label for="pertanyaan">Pertanyaan</label>
                                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                                </div>

                                <div class="form-group">
                                    <label for="jawaban">Jawaban</label>
                                    <input type="text" class="form-control" id="jawaban" name="jawaban" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit FAQ -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Ubah FAQ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editFAQForm">
                                @csrf
                                @method('PUT')

                                <input type="hidden" id="edit_id_FAQ" name="id_FAQ">

                                <div class="form-group">
                                    <label for="edit_pertanyaan">Pertanyaan</label>
                                    <input type="text" class="form-control" id="edit_pertanyaan" name="pertanyaan"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="edit_jawaban">Jawaban</label>
                                    <input type="text" class="form-control" id="edit_jawaban" name="jawaban" required>
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


                                    <h4 class="card-title">Data FAQ</h4>
                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                        data-bs-target="#createFaqModal">
                                        Buat FAQ
                                    </button>

                                    @if ($faqs->isEmpty())
                                        <p class="card-description">
                                            Tidak ada data </p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="tableKota">
                                                <thead>
                                                    <tr>
                                                        <th>ID FAQ</th>
                                                        <th>Pertanyaan</th>
                                                        <th>Jawaban</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($faqs as $faq)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $faq->pertanyaan }}</td>
                                                            <td>{{ $faq->jawaban }}</td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-warning btn-sm edit-btn"
                                                                    data-id="{{ $faq->id_faq }}"
                                                                    data-pertanyaan="{{ $faq->pertanyaan }}"
                                                                    data-jawaban="{{ $faq->jawaban }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editModal">Edit</button>
                                                                <form
                                                                    action="{{ route('admin.faq.delete', $faq->id_faq) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger"
                                                                        type="submit">Delete</button>
                                                                </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // $(document).ready(function() {

        //     var currentStatus = '';

        //     $('#createFAQ').on('submit', function(e) {
        //         e.preventDefault();

        //         $('#success-message').hide();
        //         $('#error-message').hide();
        //         $('#error-list').empty();

        //         var formData = $(this).serialize();

        //         $.ajax({
        //             url: '{{ route('admin.faq.store') }}',
        //             method: 'POST',
        //             data: formData,
        //             success: function(response) {
        //                 if (response) {
        //                     location.reload();
        //                 }
        //             },
        //             error: function(xhr) {
        //                 var errors = xhr.responseJSON.errors;
        //                 if (errors) {
        //                     for (var error in errors) {
        //                         $('#error-list').append(`<li>${errors[error][0]}</li>`);
        //                     }
        //                     $('#error-message').show();
        //                 }
        //             }
        //         });
        //     });

        //     $(document).on('click', '.edit-btn', function() {
        //         var id = $(this).data('id');
        //         var pertanyaan = $(this).data('pertanyaan');
        //         var jawaban = $(this).data('jawaban');

        //         $('#edit_id_FAQ').val(id);
        //         $('#edit_pertanyaan').val(pertanyaan);
        //         $('#edit_jawaban').val(jawaban);

        //         $('#editModal').modal('show');
        //     });

        //     $('#editFAQForm').on('submit', function(e) {
        //         e.preventDefault();

        //         var formData = $(this).serialize();
        //         var id = $('#edit_id_FAQ').val();

        //         $.ajax({
        //             url: '{{ route('admin.faq.update', '') }}/' + id,
        //             method: 'PUT',
        //             data: formData,
        //             success: function(response) {
        //                 location.reload();
        //             },
        //             error: function(xhr) {
        //                 alert('Terjadi kesalahan: ' + xhr.responseText);
        //             }
        //         });
        //     });


        //     $(document).on('click', '.pagination a', function(e) {
        //         e.preventDefault();
        //         var page = $(this).attr('href').split('page=')[1];
        //         fetch_data(page, currentStatus);
        //     });
        // });
        $(document).ready(function() {
            var currentStatus = '';

            $('#createFAQ').on('submit', function(e) {
                e.preventDefault();

                $('#success-message').hide();
                $('#error-message').hide();
                $('#error-list').empty();

                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('admin.faq.store') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        // Gantikan location.reload dengan SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'FAQ Berhasil Dibuat!',
                            text: 'Data FAQ berhasil disimpan.',
                            showConfirmButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload setelah klik tombol OK
                            }
                        });
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
                var pertanyaan = $(this).data('pertanyaan');
                var jawaban = $(this).data('jawaban');

                $('#edit_id_FAQ').val(id);
                $('#edit_pertanyaan').val(pertanyaan);
                $('#edit_jawaban').val(jawaban);

                $('#editModal').modal('show');
            });

            $('#editFAQForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var id = $('#edit_id_FAQ').val();

                $.ajax({
                    url: '{{ route('admin.faq.update', '') }}/' + id,
                    method: 'PUT',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'FAQ Berhasil Diperbarui!',
                            text: 'Data FAQ berhasil diperbarui.',
                            showConfirmButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page, currentStatus);
            });
        });
    </script>
@endsection
