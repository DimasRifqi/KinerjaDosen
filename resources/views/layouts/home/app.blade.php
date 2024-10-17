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
            {{-- @include('layouts.home.sidebar') --}}

            @php
                $user = Auth::user();
            @endphp

            @switch(true)
                @case($user->hasRole(1))
                    @include('layouts.home.sidebars.sidebar_if_1_superadmin')
                @break

                @case($user->hasRole(2))
                    @include('layouts.home.sidebars.sidebar_if_2_verifikator')
                @break

                @case($user->hasRole(3))
                    @include('layouts.home.sidebars.sidebar_if_3_perencanaan')
                @break

                @case($user->hasRole(4))
                    @include('layouts.home.sidebars.sidebar_if_4_keuangan')
                @break

                @case($user->hasRole(5))
                    @include('layouts.home.sidebars.sidebar_if_5_dosen')
                @break

                @case($user->hasRole(6))
                    @include('layouts.home.sidebars.sidebar_if_6_auditor')
                @break

                @case($user->hasRole(7))
                    @include('layouts.home.sidebars.sidebar_if_7_oppt')
                @break

                @default
                    {{-- You can include a default sidebar or leave it empty --}}
            @endswitch


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
