@extends('layouts.auth.app')
@section('title', 'Daftarkan')
@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <!-- Title -->
                            <h3 class="mb-4">{{ __('Daftar') }}</h3>

                            <!-- Start Form -->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name Field -->
                                <div class="form-group">
                                    <input type="text" id="name" name="name" placeholder="{{ __('Nama') }}"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" required autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <input type="email" id="email" name="email"
                                        placeholder="{{ __('Alamat Email') }}"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password Field -->
                                <div class="form-group">
                                    <input type="password" id="password" name="password" placeholder="{{ __('Password') }}"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        required>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="form-group">
                                    <input type="password" id="password-confirm" name="password_confirmation"
                                        placeholder="{{ __('Konfirmasi Password') }}" class="form-control form-control-lg"
                                        required>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Daftar') }}
                                    </button>
                                </div>

                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
