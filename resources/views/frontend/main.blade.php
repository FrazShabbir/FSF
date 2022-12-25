<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partial._header')
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="0">
    <!-- Main Body -->
    <div class="main">
        <!-- Preloader -->
        <div class="loader_bg">
            <div class="loader"></div>
        </div>
        <!-- Header Section -->
        <header>
            @include('frontend.partial._navbar')
            @yield('banner')
        </header>
        <!-- Header Ends -->
        @yield('content')

        <!-- Footer Section -->
        @include('frontend.partial._footer')
        <!-- Footer Ends -->
    </div>
    <!-- End Main Body -->
    <!-- JavaScript -->
    @include('frontend.partial._scripts')
</body>

</html>
