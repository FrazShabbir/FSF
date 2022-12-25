<meta charset="UTF-8">
<meta name="description" content="CyberTag - A Unique App Landing Page Template">
<meta name="author" content="WiseVision">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title','vCard') | {{fromSettings('site_title')}}</title>
<link rel="icon" href="assets/favicon/favicon.ico">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/all.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/font.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

@stack('css')
@yield('styles')
