<script src="{{asset('members/assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('members/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('members/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('members/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{asset('members/assets/js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('members/assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('members/assets/js/now-ui-dashboard.min.js?v=1.5.0')}}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('members/assets/demo/demo.js')}}"></script>
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

  });
</script>
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