<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeht.com/template/FSF/ltr/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Jan 2023 17:25:34 GMT -->
<head>
@include('frontend.partial._header')
</head>

<body>

<!-- page wrapper start -->

<div class="page-wrapper">
  
<!-- preloader start -->

<div id="ht-preloader">
  <div class="loader clear-loader"> <span>F</span>
    <span>S</span>
    <span>F</span>
    <span>E</span>
    <span>U</span>
    <span>.</span>
    <span>O</span>
    <span>R</span>
    <span>G</span>
  </div>
</div>

<!-- preloader end -->

<!--header start-->
@yield('banner')


<!--body content start-->

<div class="page-content">

<!--feature start-->
@yield('content')



</div>

<!--body content end--> 


<!--footer start-->

@include('frontend.partial._footer')

<!--footer end-->

</div>

<!-- page wrapper end -->

@include('frontend.partial._scripts')
</body>


<!-- Mirrored from themeht.com/template/FSF/ltr/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Jan 2023 17:30:09 GMT -->
</html>
