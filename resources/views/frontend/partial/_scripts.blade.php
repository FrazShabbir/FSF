


 
<!--back-to-top start-->

<div class="scroll-top"><a class="smoothscroll" href="#top">Scroll Top</a></div>

<!--back-to-top end-->
<script>
  document.getElementById("year").innerHTML = new Date().getFullYear();
</script>
<!-- inject js start -->

<!--== jquery -->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script> 

<!--== bootstrap -->
<script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>

<!--== owl-carousel -->
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 

<!--== magnific-popup --> 
<script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>

<!--== counter -->
<script src="{{asset('frontend/assets/js/counter.js')}}"></script> 

<!--== countdown -->
<script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>

<!--== particles -->
<script src="{{asset('frontend/assets/js/particles.js')}}"></script>

<!--== typer -->
<script src="{{asset('frontend/assets/js/typer.js')}}"></script> 

<!--== wow -->
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>

<!--== theme-script -->
<script src="{{asset('frontend/assets/js/theme-script.js')}}"></script>

<!-- inject js end -->


@yield('scripts')
@stack('js')