@extends('layouts.home.app')
@section('title', 'Buat LLDIKTI Verifikator')
@section('userTypeOnPage', 'SuperAdmin, Verifikator')
@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Pendaftaran Verifikator LLDIKTI Wilayah 7</h4>
                <form class="forms-sample">
                <div class="form-group">
                    <label for="name" class="col-form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
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