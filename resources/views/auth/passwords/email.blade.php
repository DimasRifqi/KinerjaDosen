@extends('layouts.auth.app')

@section('content')
    <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!--<div class="brand-logo">
                            <img src="../../images/logo.svg" alt="logo">
                        </div>!-->
                        
                        <h3 class="mb-4">{{ __('Perbarui Kata Sandi') }}</h3>
                        <form class="pt-3" method="POST" action="{{ route('password.email') }}"> 
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

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Kirim Tautan Ubah Kata Sandi') }}
                                </button>
                            </div>
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
