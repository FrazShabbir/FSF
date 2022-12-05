<div class="sidebar" data-color="orange">
    <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-mini">
        FSF
      </a>
      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Funreal Services
      </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li class="active ">
          <a href="./dashboard.html">
            <i class="now-ui-icons design_app"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="">
          <a href="{{route('enrollment.index')}}">
            <i class="now-ui-icons design_app"></i>
            <p>My Application</p>
          </a>
        </li>
        <li>
          <a href="{{route('donation.create')}}">
            <i class="now-ui-icons education_atom"></i>
            <p>My Donations</p>
          </a>
        </li>

        <li>
          <a href="./map.html">
            <i class="now-ui-icons users_single-02"></i>
            <p>My Profile</p>
          </a>
        </li>

        <li>
          <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"role="button">
            <i class="now-ui-icons media-1_button-power"></i>
            <p>Logout</p>
          </a>
        </li>
       
    
        <li class="active-pro">
          <a href="">
            <i class="now-ui-icons business_globe"></i>
            <p>Essentialsofts</p>
          </a>
        </li>
      </ul>


                           
   
    </div>
  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>