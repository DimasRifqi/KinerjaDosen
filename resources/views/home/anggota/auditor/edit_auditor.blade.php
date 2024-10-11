@extends('layouts.home.app')

@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Edit Data Auditor</h4>

                <form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name" class="col-form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="instansi" class="col-form-label">Instansi</label>
                    <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Nama Lengkap" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <span class="input-group-text" onclick="togglePassword('password', 'togglePasswordIcon1')">
                            <i class="mdi mdi-eye" id="togglePasswordIcon1"></i> <!-- Icon mata untuk password -->
                        </span>
                    </div>
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                        <span class="input-group-text" onclick="togglePassword('password_confirmation', 'togglePasswordIcon2')">
                            <i class="mdi mdi-eye" id="togglePasswordIcon2"></i> <!-- Icon mata untuk konfirmasi password -->
                        </span>
                    </div>
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection