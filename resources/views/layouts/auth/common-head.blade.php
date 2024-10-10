<!-- start LaravelUI -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<!-- end LaravelUI -->

<link rel="stylesheet" href="{{ asset('staradmin/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/typicons/typicons.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/simple-line-icons/css/simple-line-icons.css') }}">
<link rel="stylesheet" href="{{ asset('staradmin/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('staradmin/css/vertical-layout-light/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/login-password.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('staradmin/images/favicon.png') }}"/>
