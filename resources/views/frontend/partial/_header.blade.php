<!-- meta tags -->
<meta charset="utf-8">
<meta name="keywords" content="Funeral Services and Funds" />
<meta name="description" content="Funeral Services and Funds" />
<meta name="author" content="www.fsfeu.org" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Title -->

<title>@yield('title','FSF - Funeral Services and Funds') | {{fromSettings('site_title')}}</title>

<!-- Favicon Icon -->
<link rel="shortcut icon" href="{{asset('frontend/assets/images/favicon.ico')}}" />

<!-- inject css start -->
<!--== bootstrap -->
<link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

<!--== animate -->
<link href="{{asset('frontend/assets/css/animate.css')}}" rel="stylesheet" type="text/css" />

<!--== line-awesome -->
<link href="{{asset('frontend/assets/css/line-awesome.min.css')}}" rel="stylesheet" type="text/css" />

<!--== magnific-popup -->
<link href="{{asset('frontend/assets/css/magnific-popup.css')}}" rel="stylesheet" type="text/css" />

<!--== owl.carousel -->
<link href="{{asset('frontend/assets/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" />

<!--== spacing -->
<link href="{{asset('frontend/assets/css/spacing.css')}}" rel="stylesheet" type="text/css" />

<!--== theme.min -->
<link href="{{asset('frontend/assets/css/theme.min.css')}}" rel="stylesheet" />

@stack('css')
@yield('styles')

