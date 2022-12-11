<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li @if (in_array(request()->route()->getName(),
            ['admin.dashboard'])) class="active" @endif>
            <a href="{{ route('admin.dashboard') }}" class="iq-waves-effect"><i
                    class="las la-home iq-arrow-left"></i><span>Dashboard</span></a>
        </li>


        <li @if (in_array(request()->route()->getName(),
            [
                'roles.create',
                'roles.edit',
                'roles.index',
                'roles.show',
                'users.create',
                'users.edit',
                'users.index',
                'users.show',
            ])) class="active" @endif>
            <a href="#usermanagement" class="iq-waves-effect" data-toggle="collapse">
                <i class="las la-th-list  iq-arrow-left"></i><span>User Management</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="usermanagement" class="iq-submenu collapse " data-parent="#iq-sidebar-toggle" style="">

                <li>
                    <ul>
                        <li class="usermanagement">
                            <a href="#users" class="iq-waves-effect collapse" data-toggle="collapse"
                                aria-expanded="false">
                                <span class="ripple rippleEffect"
                                    style="width: 204px; height: 204px; top: -80px; left: 59px;"></span><i
                                    class="las la-th-list "></i><span>User</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                            <ul id="users" class="iq-submenu iq-submenu-data collapse" style="">
                                @can('Create Users')
                                    <li>
                                        <a href="{{ route('users.create') }}"> <i class="las la-plus-circle"></i>Add
                                            User</a>
                                    </li>
                                @endcan
                                @can('Read Users')
                                    <li>
                                        <a href="{{ route('users.index') }}"> <i class="las la-th-list"></i>All Users</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('users.closed.accounts') }}"> <i class="las la-th-list"></i>Closed Accounts</a>
                                    </li>
                                @endcan
                            </ul>
                            <a href="#roles" class="iq-waves-effect collapsed" data-toggle="collapse"
                                aria-expanded="false"><span class="ripple rippleEffect"
                                    style="width: 204px; height: 204px; top: -80px; left: 59px;"></span><i
                                    class="ri-play-circle-line"></i><span>Roles</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                            <ul id="roles" class="iq-submenu iq-submenu-data collapse" style="">
                                @can('Create Roles')
                                    <li>
                                        <a href="{{ route('roles.create') }}"> <i class="las la-plus-circle"></i>Add
                                            Role</a>
                                    </li>
                                @endcan
                                @can('Read Roles')
                                    <li>
                                        <a href="{{ route('roles.index') }}"> <i class="las la-th-list"></i>All Roles</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>

                    </ul>

                </li>



            </ul>
        </li>


        <li @if (in_array(request()->route()->getName(),
            ['application.create', 'application.edit', 'application.index', 'application.show'])) class="active" @endif>
            <a href="#application" class="iq-waves-effect" data-toggle="collapse"
                @if (in_array(request()->route()->getName(),
                    ['application.create', 'application.edit', 'application.index', 'application.show'])) aria-expanded="true" @else aria-expanded="false" @endif><span
                    class="ripple rippleEffect"></span><i
                    class="las la-money-check-alt iq-arrow-left"></i><span>Applications</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="application" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                @can('Create Applications')
                    <li class="{{ request()->route()->getName() == 'application.create'? 'active': '' }}"><a
                            href="{{ route('application.create') }}"><i class="las la-plus"></i>New Application</a>
                    </li>
                @endcan
                @can('Read Applications')
                    <li class="{{ request()->route()->getName() == 'application.index'? 'active': '' }}"><a
                            href="{{ route('application.index') }}"><i class="las la-money-check-all"></i>All
                            Applications</a>
                    </li>
                @endcan
            </ul>
        </li>


        <li @if (in_array(request()->route()->getName(),
            ['donation.create', 'donation.edit', 'donation.index', 'donation.show'])) class="active" @endif>
            <a href="#donation" class="iq-waves-effect" data-toggle="collapse"
                @if (in_array(request()->route()->getName(),
                    ['donation.create', 'donation.edit', 'donation.index', 'donation.show'])) aria-expanded="true" @else aria-expanded="false" @endif><span
                    class="ripple rippleEffect"></span><i
                    class="las la-money-check-alt iq-arrow-left"></i><span>Donations</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="donation" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                @can('Create Donations')
                    <li class="{{ request()->route()->getName() == 'donation.create'? 'active': '' }}"><a
                            href="{{ route('donation.create') }}"><i class="las la-plus"></i>New Donation</a>
                    </li>
                @endcan
                @can('Read Donations')
                    <li class="{{ request()->route()->getName() == 'donation.index'? 'active': '' }}"><a
                            href="{{ route('donation.index') }}"><i class="las la-money-check-all"></i>All
                            Donations</a>
                    </li>
                @endcan
            </ul>
        </li>


        {{-- SETTINGS ONLY FOR ADMIN AND SUPERADMIN --}}
        @can('Update Settings')
            <li class="{{ request()->route()->getName() == 'site.siteSettings'? 'active': '' }}">
                <a href="{{ route('site.siteSettings') }}" class="iq-waves-effect"><i
                        class="las la-tools iq-arrow-left"></i><span>General Settings</span></a>
            </li>
        @endcan
        {{-- SETTING END --}}
        @if (getuser()->hasRole('Super Admin'))
            {{-- Heirarchy ONLY FOR SUPER ADMIN --}}
            <li>
                <a href="#hierarchy" class="iq-waves-effect collapsed" data-toggle="collapse"><i
                        class="las la-sitemap iq-arrow-left"></i><span>Hierarchy</span><i
                        class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="hierarchy" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li class=""><a href="{{route('country.index')}}"><i class="las la-city"></i>Country</a></li>
                    <li class=""><a href="{{route('community.index')}}"><i class="ri-database-line"></i>Community</a></li>
                    <li class=""><a href="{{route('province.index')}}"><i class="las la-building"></i>Province</a></li>
                    <li class=""><a href="{{route('city.index')}}"><i class="las la-map-marker-alt"></i>City</a></li>
                </ul>
            </li>
            {{-- Heirarchy END --}}
        @endif

        @if (getuser()->hasRole('Super Admin'))
        {{-- Heirarchy ONLY FOR SUPER ADMIN --}}
        <li>
            <a href="#reports" class="iq-waves-effect collapsed" data-toggle="collapse"><i
                    class="las la-chart-bar iq-arrow-left"></i><span>Reports</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li class=""><a href="{{route('report.countries')}}"><i class="las la-city"></i>Countries</a></li>
                <li class=""><a href="{{route('report.communities')}}"><i class="ri-database-line"></i>Communities</a></li>
                <li class=""><a href="{{route('report.provinces')}}"><i class="las la-building"></i>Provinces</a></li>
                <li class=""><a href="{{route('report.cities')}}"><i class="las la-map-marker-alt"></i>Cities</a></li>

            </ul>
        </li>
        {{-- Heirarchy END --}}
    @endif

        @can('Update Settings')
        <li class="bg-primary  {{ request()->route()->getName() == 'notification.create'? 'active': '' }}">
            <a href="{{ route('notification.create') }}" class="iq-waves-effect text-light"><i
                    class="las la-bell iq-arrow-left"></i><span>Send Notificatons</span></a>
        </li>
    @endcan
    </ul>
</nav>
<div class="p-3"></div>
