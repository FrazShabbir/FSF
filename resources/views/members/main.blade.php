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
            @if (count($errors) > 0)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <strong>Error: </strong>{{ $error }}
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            @include('members.partials._navbar')

            <!-- End Navbar -->
            @yield('content')

            @include('members.partials._footer')
        </div>
    </div>
    <!--   Core JS Files   -->
    @include('members.partials._scripts')
    @include('sweetalert::alert')

</body>

</html>
