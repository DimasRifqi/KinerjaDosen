<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- start LaravelUI -->
{{-- <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> --}}

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<!-- end LaravelUI -->

<!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('staradmin/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/typicons/typicons.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/simple-line-icons/css/simple-line-icons.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('staradmin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/js/select.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/select2/select2.min.css') }}"> {{-- css pendaftaran --}}
<link rel="stylesheet" href="{{ asset('staradmin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}"> {{-- css pendaftaran --}}
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('staradmin/css/vertical-layout-light/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/register-password.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('staradmin/images/favicon.png') }}" />


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
