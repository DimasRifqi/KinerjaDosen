<html>

<head>
    <title>Home - Kinerja Dosen</title>

    @include('layouts.template.common-head')
</head>

<body>
    <main>
        @include('layouts.template.header')

        @include('layouts.template.sidebar')

        @section('main-content')
        @show

        @include('layouts.template.footer')
    </main>
    @include('layouts.template.common-end')
</body>

</html>
