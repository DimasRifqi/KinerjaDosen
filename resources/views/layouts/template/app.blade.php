<html>

<head>
    <title>jajal - Kinerja Dosen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('layouts.template.common-head')
</head>

<body>
    <main>
        @include('layouts.template.header')
        @include('layouts.template.sidebar')

        @section('content')
        @show

        @include('layouts.template.footer')
    </main>

    @include('layouts.template.common-end')

</body>

</html>
