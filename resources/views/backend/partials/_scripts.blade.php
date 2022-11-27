      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{asset('backend/js/jquery.min.js')}}"></script>
      <script src="{{asset('backend/js/popper.min.js')}}"></script>
      <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>


      <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
      

      <!-- Appear JavaScript -->
      <script src="{{asset('backend/js/jquery.appear.js')}}"></script>
      <!-- Countdown JavaScript -->
      <script src="{{asset('backend/js/countdown.min.js')}}"></script>
      <!-- Counterup JavaScript -->
      <script src="{{asset('backend/js/waypoints.min.js')}}"></script>
      <script src="{{asset('backend/js/jquery.counterup.min.js')}}"></script>
      <!-- Wow JavaScript -->
      <script src="{{asset('backend/js/wow.min.js')}}"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{asset('backend/js/apexcharts.js')}}"></script>
      <!-- Slick JavaScript -->
      <script src="{{asset('backend/js/slick.min.js')}}"></script>
      <!-- Select2 JavaScript -->
      <script src="{{asset('backend/js/select2.min.js')}}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{asset('backend/js/owl.carousel.min.js')}}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{asset('backend/js/jquery.magnific-popup.min.js')}}"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{asset('backend/js/smooth-scrollbar.js')}}"></script>
      <!-- lottie JavaScript -->
      <script src="{{asset('backend/js/lottie.js')}}"></script>
      <!-- am core JavaScript -->
      <script src="{{asset('backend/js/core.js')}}"></script>
      <!-- am charts JavaScript -->
      <script src="{{asset('backend/js/charts.js')}}"></script>
      <!-- am animated JavaScript -->
      <script src="{{asset('backend/js/animated.js')}}"></script>
      <!-- am kelly JavaScript -->
      <script src="{{asset('backend/js/kelly.js')}}"></script>
      <!-- am maps JavaScript -->
      <script src="{{asset('backend/js/maps.js')}}"></script>
      <!-- am worldLow JavaScript -->
      <script src="{{asset('backend/js/worldLow.js')}}"></script>
      <!-- Raphael-min JavaScript -->
      <script src="{{asset('backend/js/raphael-min.js')}}"></script>
      <!-- Morris JavaScript -->
      <script src="{{asset('backend/js/morris.js')}}"></script>
      <!-- Morris min JavaScript -->
      <script src="{{asset('backend/js/morris.min.js')}}"></script>
      <!-- Flatpicker Js -->
      <script src="{{asset('backend/js/flatpickr.js')}}"></script>
      <!-- Style Customizer -->
      <script src="{{asset('backend/js/style-customizer.js')}}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{asset('backend/js/chart-custom.js')}}"></script>
      <!-- Custom JavaScript -->
      <script src="{{asset('backend/js/custom.js')}}"></script>

      <script type="module">
            // Import the functions you need from the SDKs you need
            import { initializeApp } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-app.js";
            import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-analytics.js";
            // TODO: Add SDKs for Firebase products that you want to use
            // https://firebase.google.com/docs/web/setup#available-libraries
          
            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            const firebaseConfig = {
              apiKey: "AIzaSyC3kLU8900f8m0qPfzWwEAd8oLQyoUfeAk",
              authDomain: "funeral-service-funds.firebaseapp.com",
              projectId: "funeral-service-funds",
              storageBucket: "funeral-service-funds.appspot.com",
              messagingSenderId: "899220675121",
              appId: "1:899220675121:web:d870e9b8229dec5f039310",
              measurementId: "G-M26T1XPFJ9"
            };
          
            // Initialize Firebase
            const app = initializeApp(firebaseConfig);
            const analytics = getAnalytics(app);
          </script>
      @yield('scripts')
      @stack('js')
