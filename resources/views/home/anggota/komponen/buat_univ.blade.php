@extends('layouts.home.app')

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

                                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
                                        Create Universitas
                                    </button>

                                    @if ($univ->isEmpty())
                                        <p class="card-description">No Data Universitas records found.</p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID Universitas</th>
                                                        <th>Nama Universitas</th>
                                                        <th>Kota</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="univ-table-body">
                                                    @foreach ($univ as $uni)
                                                        <tr>
                                                            <td>{{ $uni->id_universitas }}</td>
                                                            <td>{{ $uni->nama_universitas }}</td>
                                                            <td>{{ $uni->kota ? $uni->kota->nama_kota : 'N/A' }}</td>
                                                            <td>{{ $uni->status ? 'Active' : 'Inactive' }}</td>
                                                            <td>
                                                                <a href="{{ route('univ.edit', $uni->id_universitas) }}" class="btn btn-warning btn-sm">Edit</a>
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

                        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createModalLabel">Create Universitas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="createUnivForm">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_univ">Nama Universitas</label>
                                                <input type="text" class="form-control" id="nama_univ" name="nama_univ" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_kota">Kota</label>
                                                <select class="form-control" id="id_kota" name="id_kota" required>
                                                    @foreach ($kota as $kt)
                                                        <option value="{{ $kt->id_kota }}">{{ $kt->nama_kota }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script>
                            $(document).ready(function() {

                                $('#createUnivForm').on('submit', function(e) {
                                    e.preventDefault();

                                    $('#success-message').hide();
                                    $('#error-message').hide();
                                    $('#error-list').empty();

                                    var formData = $(this).serialize();

                                    $.ajax({
                                        url: '{{ route("univ.create") }}',
                                        method: 'POST',
                                        data: formData,
                                        success: function(response) {

                                            if(response)(
                                                location.reload()
                                            )
                                            $('#univ-table-body').append(`
                                                <tr>
                                                    <td>${response.id_universitas}</td>
                                                    <td>${response.nama_univ}</td>
                                                    <td>${response.kota_nama}</td>

                                                    <td>
                                                        <a href="/univ/edit/${response.id_universitas}" class="btn btn-warning btn-sm">Edit</a>
                                                    </td>
                                                </tr>
                                            `);

                                            $('#success-message').text('Universitas created successfully!').show();

                                            $('#createModal').modal('hide');

                                            $('#createUnivForm')[0].reset();
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
                            });
                        </script>

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
                                    <h4 class="card-title">Buat Universitas Baru</h4>
                                    <div class="row">
                                        <form action="{{ route('univ.create') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_univ">Nama Universitas:</label>
                                                <input type="text" name="nama_univ" id="nama_univ" class="form-control"
                                                    value="{{ old('nama_universitas') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label name="id_kota" id="id_kota" class="form-label" required>Pilih
                                                    Kota</label>
                                                <select class="js-example-basic-multiple w-100" multiple="multiple">
                                                    @foreach ($kota as $city)
                                                        <option value="{{ $city->id_kota }}">{{ $city->nama_kota }}
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
@endsection
