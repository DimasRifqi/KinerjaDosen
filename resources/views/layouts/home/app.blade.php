<html>

<head>
    <title>Home - Kinerja Dosen</title>

    @include('layouts.home.common-head')
</head>

<body>
    <main>
        @include('layouts.home.sidebar')

        @include('layouts.home.header')

        @section('main-content')
        @show

        @include('layouts.home.footer')
    </main>
    @include('layouts.home.common-end')
</body>

</html>
