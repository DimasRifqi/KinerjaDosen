@extends('layouts.home.app')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Pendaftaran Perencanaan Perguruan Tinggi</h4>
                <form class="forms-sample">
                <div class="form-group">
                    <label for="name" class="col-form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                </div>

                <div class="form-group">
                    <label for="id_role">Role</label>
                    <select class="form-control" id="id_role" name="id_role" required>
                        <option value="">Pilih Role</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">File upload</label>
                    <input type="file" class="file-upload-default" accept="image/*">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" id="image" name="image[]"  accept="image/*">
                        <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection