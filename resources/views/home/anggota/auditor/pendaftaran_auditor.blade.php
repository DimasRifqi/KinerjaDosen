@extends('layouts.home.app')
@section('title', 'Pendaftaran Auditor Instansi')
@section('userTypeOnPage', 'SuperAdmin, OPPT')
@section('content')
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pendaftaran Auditor Instansi</h4>

                {{-- Menampilkan notifikasi sukses --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Form untuk pendaftaran --}}
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="id_universitas">Instansi</label>
                        <select class="form-control" id="id_universitas" name="id_universitas" required>
                            <option value="">Pilih Instansi</option>
                            @foreach ($univer as $univ)
                                <option value="{{ $univ->id_universitas }}">{{ $univ->nama_universitas }}</option>
                            @endforeach
                        </select>
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

                    {{-- Input hidden untuk id_role --}}
                    <input type="hidden" name="id_role" value="6">

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk toggle visibility password
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("mdi-eye");
            icon.classList.add("mdi-eye-off");
        } else {
            input.type = "password";
            icon.classList.remove("mdi-eye-off");
            icon.classList.add("mdi-eye");
        }
    }
</script>
@endsection
