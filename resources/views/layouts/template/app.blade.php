<html>

<head>
    <title>Jajal - Kinerja Dosen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('layouts.template.common-head')
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">

            @include('layouts.template.header')
            {{-- @include('layouts.template.theme-setting') --}}
            @include('layouts.template.sidebar')

            <div class="main-panel">
                @section('content')
                @show

                @include('layouts.template.footer')
            </div>


            @include('layouts.template.common-end')
        </div>

    </div>
    <!-- container-scroller -->
</body>

</html>
