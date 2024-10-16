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
                $user = Auth::User();
            @endphp
            {{-- tolong backend benerin kalo bisa jangan pakek if --}}
            @if ($user->hasRole(1))
                @include('layouts.home.sidebars.sidebar_if_1_superadmin')
            @elseif ($user->hasRole(2))
                @include('layouts.home.sidebars.sidebar_if_2_verifikator')
            @elseif ($user->hasRole(3))
                @include('layouts.home.sidebars.sidebar_if_3_perencanaan')
            @elseif ($user->hasRole(4))
                @include('layouts.home.sidebars.sidebar_if_4_keuangan')
            @elseif ($user->hasRole(5))
                @include('layouts.home.sidebars.sidebar_if_5_dosen')
            @elseif ($user->hasRole(6))
                @include('layouts.home.sidebars.sidebar_if_6_auditor')
            @elseif ($user->hasRole(7))
                @include('layouts.home.sidebars.sidebar_if_7_oppt')
            @endif
            {{-- tolong backend benerin kalo bisa jangan pakek if --}}

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
