<html>

<head>
    <title>@yield('title') - Kinerja Dosen</title>

    @include('layouts.home.common-head')
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            @include('layouts.home.header')
            {{-- @include('layouts.home.theme-setting') --}}
            @include('layouts.home.sidebar')

            <div class="main-panel">

                @section('content')
                @show

                @include('layouts.home.footer')
            </div>

            @include('layouts.home.common-end')
        </div>
    </div>
    <!-- container-scroller -->

</body>

</html>
