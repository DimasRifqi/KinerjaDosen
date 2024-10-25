HTML login Blade
@extends('layouts.auth.app')
@section('title', 'Masuk')
@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <!--<div class="brand-logo">
                            <img src="../../images/logo.svg" alt="logo">
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="fw-light">Sign in to continue.</h6>!-->
                        
                        <h3 class="mb-4">{{ __('Masuk') }}</h3>
                        <form class="pt-3" method="POST" action="{{ route('login') }}"> 
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group d-flex align-items-stretch">
                                <!-- Input password -->
                                <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Kata Sandi"
                                required autocomplete="current-password">
                                
                                <button type="button" class="btn btn-light toggle-password-btn" onclick="togglePassword()">
                                    <i class="mdi mdi-eye" id="togglePasswordIcon"></i>
                                </button>
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            


                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted" for="remember" style="margin-left: 5px;">Ingat Saya</label> <!-- Atur jarak secara manual -->
                                </div>
                                                    
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lupa Kata Sandi?') }}
                                    </a>
                                @endif
                            </div>
                            
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Masuk') }}
                                </button>
                            </div>
                            <!-- <div class="text-center mt-4 fw-light">
                                Register sebagai? <a  href="{{ route('register') }}" class="text-primary">{{ __('Daftar Akun') }}</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@endsection
