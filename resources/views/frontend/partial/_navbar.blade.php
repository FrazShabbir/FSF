<header class="site-header">
    <div id="header-wrap" class="@yield('extra_class_2')">
        <div class="container">
            <div class="row">
                <!--menu start-->
                <div class="col">
                    <nav class="navbar navbar-expand-lg navbar-light  @yield('extra_class') {{ $extra_class ?? '' }}">
                        <a class="navbar-brand logo text-primary mb-0 font-w-7 me-6" href="{{ route('home') }}">
                            W<span class="text-dark font-w-4">FSF.</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span
                                class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#testimonials">Testimonials</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                                </li>

                            </ul>
                        </div>
                        @auth
                            <div class="d-sm-flex align-items-center justify-content-end ms-auto"> <a
                                    class="btn btn-light btn-sm" href="{{ route('dashboard') }}">{{auth()->user()->full_name}}</a> 
                            </div>
                        @else
                            <div class="d-sm-flex align-items-center justify-content-end ms-auto"> <a
                                    class="btn btn-light btn-sm" href="{{ route('login') }}">Login</a> <a
                                    class="btn btn-light btn-sm ms-3 d-sm-inline-block d-none"
                                    href="{{ route('register') }}">Sign
                                    Up</a>
                            </div>
                        @endauth

                    </nav>

                </div>
                <!--menu end-->
            </div>
        </div>
    </div>
</header>
