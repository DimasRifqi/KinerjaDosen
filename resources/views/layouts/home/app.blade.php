<html>

<head>
    <title>Home - Kinerja Dosen</title>

    @include('layouts.home.common-head')
</head>

<body>
    <main>
        @include('layouts.home.header')

        @include('layouts.home.sidebar')

        @section('main-content')
        @show

        @include('layouts.home.footer')
    </main>
    @include('layouts.home.common-end')
</body>

</html>
