<html>

<head>
    <title></title>

    @include('layouts.auth.common-head')
</head>

<body>
    <main>
        @include('layouts.auth.header')

        @section('main-content')
        @show

    </main>
    @include('layouts.auth.common-end')
</body>

</html>
