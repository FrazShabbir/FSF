<!DOCTYPE html>
<html lang="en">

<head>
    @include('members.partials._header')
</head>

<body class="">
    <div class="wrapper ">

        @include('members.partials._sidebar')
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            @include('members.partials._navbar')
            <!-- End Navbar -->
            @yield('content')

            @include('members.partials._footer')
        </div>
    </div>
    <!--   Core JS Files   -->
    @include('members.partials._scripts')
</body>

</html>
