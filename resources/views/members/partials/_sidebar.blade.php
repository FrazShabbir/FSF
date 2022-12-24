<div class="sidebar" data-color="orange">
    <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
    <div class="logo">
      <a href="{{route('dashboard')}}" class="simple-text logo-mini">
        FSF
      </a>
      <a href="{{route('dashboard')}}" class="simple-text logo-normal">
        Funreal Services
      </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li class="active ">
          <a href="{{route('dashboard')}}">
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
        <li class="">
          <a href="{{route('enrollment.renewableIndex')}}">
            <i class="now-ui-icons design_app"></i>
            <p>Renewable Applications</p>
          </a>
        </li>
        <li>
          <a href="{{route('member.donation.index')}}">
            <i class="now-ui-icons education_atom"></i>
            <p>My Donations</p>
          </a>
        </li>

        <li>
          <a href="{{route('member.profile',auth()->user()->username)}}">
            <i class="now-ui-icons users_single-02"></i>
            <p>My Profile</p>
          </a>
        </li>

        <li>
          <a href="{{route('member.notifications')}}">
            <i class="now-ui-icons users_single-02"></i>
            <p>Notifications</p>
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