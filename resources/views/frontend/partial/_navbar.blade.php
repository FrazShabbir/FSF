<nav class="navbar navbar-expand-lg @yield('extra_class') {{ $extra_class ?? '' }}" id="navbar">
    <div class="container">
        <!-- Add Your Logo Here... -->
        <a href="{{ route('home') }}" class="navbar-brand">
            <img class="default-logo" src="{{ asset(fromSettings('logo') ?? 'frontend/assets/images/fsf-white-logo-update.png') }}"
                height="60px" width="auto" alt="nav-logo">
            <img class="sticky-logo"
                src="{{ asset(fromSettings('logo_dark') ?? 'frontend/assets/images/fsf-logo.png') }}" height="60px"
                width="auto" alt="sticky-logo">
        </a>
        <button class="navbar-toggler mx-3" type="button" data-toggle="collapse" data-target="#navbar-collapse"
            aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars toggle-icon-color"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link mx-2 mx-lg-0" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link mx-2 mx-lg-0">Contact Us</a></li>
                @auth
                    <li class="nav-item"><a href="{{ route('dashboard') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            role="button" class="nav-link mx-2 mx-lg-0">logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link mx-2 mx-lg-0">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>

</nav>
