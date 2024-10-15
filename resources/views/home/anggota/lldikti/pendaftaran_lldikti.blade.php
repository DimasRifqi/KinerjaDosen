@extends('layouts.home.app')
@section('title', 'Buat LLDIKTI')
@section('userTypeOnPage', 'SuperAdmin')
@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Pendaftaran Admin LLDIKTI Wilayah 7</h4>
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                    </div>

                    <!-- masi statis yang role -->
                    <div class="form-group">
                        <label for="id_role">Role</label>
                        <select class="form-control" id="id_role" name="id_role" required>
                            <option value="">Pilih Role</option>
                            <option>Verifikator</option>
                            <option>Keuangan</option>
                            <option>Perencanaan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Foto</label>
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
                        <label for="password">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <span class="input-group-text" onclick="togglePassword('password', 'togglePasswordIcon1')">
                                <i class="mdi mdi-eye" id="togglePasswordIcon1"></i> <!-- Icon mata untuk password -->
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                            <span class="input-group-text" onclick="togglePassword('password_confirmation', 'togglePasswordIcon2')">
                                <i class="mdi mdi-eye" id="togglePasswordIcon2"></i> <!-- Icon mata untuk konfirmasi password -->
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection