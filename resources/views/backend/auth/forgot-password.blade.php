<!DOCTYPE html>
<html lang="en">

<head>

    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="bootstrap 5, premium, multipurpose, sass, scss, saas" />
    <meta name="description" content="Bootstrap 5 Landing Page Template" />
    <meta name="author" content="www.themeht.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>FSF - Forget Password</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" />

    <!-- inject css start -->

    <!--== bootstrap -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--== animate -->
    <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />

    <!--== line-awesome -->
    <link href="{{ asset('frontend/assets/css/line-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <!--== magnific-popup -->
    <link href="{{ asset('frontend/assets/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />

    <!--== owl.carousel -->
    <link href="{{ asset('frontend/assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />

    <!--== spacing -->
    <link href="{{ asset('frontend/assets/css/spacing.css') }}" rel="stylesheet" type="text/css" />

    <!--== theme.min -->
    <link href="{{ asset('frontend/assets/css/theme.min.css') }}" rel="stylesheet" />

    <!-- inject css end -->

</head>

<body>

    <!-- page wrapper start -->

    <div class="page-wrapper">

        <!-- preloader start -->

        @include('frontend.partial._preloader')


        <!-- preloader end -->


        <!--header start-->

        @include('frontend.partial._navbar')


        <!--hero section start-->

        <section class="hero-banner position-relative custom-pt-1 custom-pb-2 bg-dark"
            data-bg-img="{{ asset('frontend/assets/images/bg/02.png') }}')}}">
            <div class="container">
                <div class="row text-white text-center z-index-1">
                    <div class="col">
                        <h1 class="text-white">Login</h1>
                        <nav aria-label="breadcrumb">

                        </nav>
                    </div>
                </div>
                <!-- / .row -->
            </div>
            <!-- / .container -->
            <div class="shape-1 bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#fff" fill-opacity="1"
                        d="M0,288L48,288C96,288,192,288,288,266.7C384,245,480,203,576,208C672,213,768,267,864,245.3C960,224,1056,128,1152,96C1248,64,1344,96,1392,112L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>

        <!--hero section end-->


        <!--body content start-->

        <div class="page-content">
          <section>
            <div class="container">
              <div class="row justify-content-center text-center">
                <div class="col-lg-5">
                  <div>
                    <div class="mb-5">
                      <h2>Forgot your password?</h2>
                      <p>Enter your email to reset your password.</p>
                    </div>
                    @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    @if (Session::has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('status') }}
                    </div>
                    @endif
                    <form id="" method="post" action="{{ route('password.email') }}">
                      @csrf
                      <div class="messages"></div>
                      <div class="form-group">
                        <input id="form_email" type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email" required="required" data-error="Valid email is required.">
                        <div class="help-block with-errors"></div>
                      </div> <button type="submit" class="btn btn-primary btn-block">Forgot Now</button>
                    </form>
                    <div class="mt-4"> <a class="link-title" href="{{route('login')}}">Back to sign in</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


            <!--newsletter start-->

            @include('frontend.partial.newsletter')


            <!--newsletter end-->

        </div>

        <!--body content end-->


        <!--footer start-->

        @include('frontend.partial._footer')

        <!--footer end-->

    </div>

    <!-- page wrapper end -->


    <!--back-to-top start-->

    <div class="scroll-top"><a class="smoothscroll" href="#top">Scroll Top</a></div>

    <!--back-to-top end-->

    <!-- inject js start -->

    <!--== jquery -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>

    <!--== bootstrap -->
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!--== owl-carousel -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>

    <!--== magnific-popup -->
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!--== counter -->
    <script src="{{ asset('frontend/assets/js/counter.js') }}"></script>

    <!--== countdown -->
    <script src="{{ asset('frontend/assets/js/jquery.countdown.min.js') }}"></script>

    <!--== particles -->
    <script src="{{ asset('frontend/assets/js/particles.js') }}"></script>

    <!--== typer -->
    <script src="{{ asset('frontend/assets/js/typer.js') }}"></script>

    <!--== wow -->
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>

    <!--== theme-script -->
    <script src="{{ asset('frontend/assets/js/theme-script.js') }}"></script>

    <!-- inject js end -->

</body>


</html>
