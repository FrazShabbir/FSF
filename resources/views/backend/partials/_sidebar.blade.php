<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li @if (in_array(request()->route()->getName(),
            ['admin.dashboard'])) class="active" @endif>
            <a href="{{ route('admin.dashboard') }}" class="iq-waves-effect"><i
                    class="las la-home iq-arrow-left"></i><span>Dashboard</span></a>
        </li>
        @if (getuser()->hasRole('Super Admin'))
            {{-- Heirarchy ONLY FOR SUPER ADMIN --}}
            <li>
                <a href="#accounts" class="iq-waves-effect collapsed" data-toggle="collapse"><i
                        class="las la-cash-register iq-arrow-left"></i><span>Accounts</span><i
                        class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="accounts" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li class=""><a href="{{ route('account.index') }}"><i class="las la-money-bill-wave"></i>All
                            Accounts</a></li>
                    <li class=""><a href="{{ route('account.create') }}"><i class="las la-money-bill-wave"></i>Add
                            New Account</a></li>

                </ul>
            </li>

            <li>
                <a href="#offices" class="iq-waves-effect collapsed" data-toggle="collapse"><i
                        class="las la-cash-register iq-arrow-left"></i><span>Offices</span><i
                        class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="offices" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li class=""><a href="{{ route('office.index') }}"><i class="las la-money-bill-wave"></i>All
                            Offices</a></li>
                    <li class=""><a href="{{ route('office.create') }}"><i class="las la-money-bill-wave"></i>Add
                            New Office</a></li>

                </ul>
            </li>
            {{-- Heirarchy END --}}
        @endif


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
                    @can('Approve Applications')
                    <li class="{{ request()->route()->getName() == 'application.index'? 'active': '' }}"><a
                        href="{{ route('application.index') }}"><i class="las la-money-check-all"></i>Pending
                        Approvals</a>
                </li> 
                    @endcan


                    <li>
                        <a href="{{ route('applications.closed') }}"> <i class="las la-th-list"></i>Closed Applications</a>
                    </li>

                    <li>
                        <a href="{{ route('applications.pending') }}"> <i class="las la-th-list"></i>New
                            Applications</a>
                    </li>

                    <li>
                        <a href="{{ route('applications.requested.renewal') }}"> <i class="las la-th-list"></i>Renewal
                            Requested
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('applications.renewal') }}"> <i class="las la-th-list"></i>Renewable
                            Applications
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('applications.approved') }}"> <i class="las la-th-list"></i>Approved
                            Applications</a>
                    </li>
                    <li>
                        <a href="{{ route('applications.rejected') }}"> <i class="las la-th-list"></i>Rejected
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
            @can('Read Hierarchy')
                <li>
                    <a href="#hierarchy" class="iq-waves-effect collapsed" data-toggle="collapse"><i
                            class="las la-sitemap iq-arrow-left"></i><span>Hierarchy</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="hierarchy" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class=""><a href="{{ route('country.index') }}"><i class="las la-city"></i>Country</a>
                        </li>

                        <li class=""><a href="{{ route('community.index') }}"><i
                                    class="ri-database-line"></i>Community</a></li>
                        <li class=""><a href="{{ route('province.index') }}"><i
                                    class="las la-building"></i>Province</a></li>
                        <li class=""><a href="{{ route('city.index') }}"><i
                                    class="las la-map-marker-alt"></i>City</a></li>


                    </ul>
                </li>
                {{-- Heirarchy END --}}
            @endcan
        @endif


        @if (getuser()->hasRole('Super Admin'))
            {{-- Heirarchy ONLY FOR SUPER ADMIN --}}
            <li>
                <a href="#reports" class="iq-waves-effect collapsed" data-toggle="collapse"><i
                        class="las la-chart-bar iq-arrow-left"></i><span>Reports</span><i
                        class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li class=""><a href="{{ route('report.countries') }}"><i
                                class="las la-city"></i>Countries</a></li>
                    <li class=""><a href="{{ route('report.communities') }}"><i
                                class="ri-database-line"></i>Communities</a></li>
                    <li class=""><a href="{{ route('report.provinces') }}"><i
                                class="las la-building"></i>Provinces</a></li>
                    <li class=""><a href="{{ route('report.cities') }}"><i
                                class="las la-map-marker-alt"></i>Cities</a></li>

                </ul>
            </li>
            {{-- Heirarchy END --}}
        @endif

        @can('Send Notifications')
            <li class="bg-primary  {{ request()->route()->getName() == 'notification.create'? 'active': '' }}">
                <a href="{{ route('notification.create') }}" class="iq-waves-effect text-light"><i
                        class="las la-bell iq-arrow-left"></i><span>Send Notificatons</span></a>
            </li>
        @endcan


        @if (officeHOD()->count() > 0 or
            countryHOD()->count() > 0 or
            communityHOD()->count() > 0 or
            provinceHOD()->count() > 0 or
            cityHOD()->count() > 0)

            <li>
                <a href="#mysupervision" class="iq-waves-effect" data-toggle="collapse">
                    <i class="las la-th-list  iq-arrow-left"></i><span>My Supervision</span><i
                        class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="mysupervision" class="iq-submenu collapse " data-parent="#iq-sidebar-toggle" style="">

                    <li>
                        <ul>
                            <li class="mysupervision">

                                @if (countryHOD()->count() > 0)
                                    <a href="#countries_" class="iq-waves-effect collapse" data-toggle="collapse"
                                        aria-expanded="false">
                                        <span class="ripple rippleEffect"
                                            style="width: 204px; height: 204px; top: -80px; left: 59px;"></span><i
                                            class="las la-th-list "></i><span>Country(s)</span><i
                                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                                    <ul id="countries_" class="iq-submenu iq-submenu-data collapse" style="">

                                        @foreach (countryHOD() as $country)
                                            <li>
                                                <a href="{{ route('country.show', $country->id) }}">
                                                    <i class="las la-plus-circle"></i>{{ $country->name }}</a>
                                            </li>
                                        @endforeach

                                    </ul>

                                @endif
                                @if (communityHOD()->count() > 0)
                                    <a href="#commnuties_" class="iq-waves-effect collapse" data-toggle="collapse"
                                        aria-expanded="false">
                                        <span class="ripple rippleEffect"
                                            style="width: 204px; height: 204px; top: -80px; left: 59px;"></span><i
                                            class="las la-th-list "></i><span>Community(s)</span><i
                                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                                    <ul id="commnuties_" class="iq-submenu iq-submenu-data collapse" style="">

                                        @foreach (communityHOD() as $community)
                                            <li>
                                                <a href="{{ route('community.show', $community->id) }}">
                                                    <i class="las la-plus-circle"></i>{{ $community->name }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                @endif
                                @if (provinceHOD()->count() > 0)
                                    <a href="#province_" class="iq-waves-effect collapse" data-toggle="collapse"
                                        aria-expanded="false">
                                        <span class="ripple rippleEffect"
                                            style="width: 204px; height: 204px; top: -80px; left: 59px;"></span><i
                                            class="las la-th-list "></i><span>Province(s)</span><i
                                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                                    <ul id="province_" class="iq-submenu iq-submenu-data collapse" style="">

                                        @foreach (provinceHOD() as $province)
                                            <li>
                                                <a href="{{ route('province.show', $province->id) }}">
                                                    <i class="las la-plus-circle"></i>{{ $province->name }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                @endif
                                @if (cityHOD()->count() > 0)
                                    <a href="#city_" class="iq-waves-effect collapse" data-toggle="collapse"
                                        aria-expanded="false">
                                        <span class="ripple rippleEffect"
                                            style="width: 204px; height: 204px; top: -80px; left: 59px;"></span><i
                                            class="las la-th-list "></i><span>City(s)</span><i
                                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                                    <ul id="city_" class="iq-submenu iq-submenu-data collapse" style="">

                                        @foreach (cityHOD() as $city)
                                            <li>
                                                <a href="{{ route('city.show', $city->id) }}">
                                                    <i class="las la-plus-circle"></i>{{ $city->name }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                @endif
                                @if (officeHOD()->count() > 0)
                                    <a href="#office_" class="iq-waves-effect collapse" data-toggle="collapse"
                                        aria-expanded="false">
                                        <span class="ripple rippleEffect"
                                            style="width: 204px; height: 204px; top: -80px; left: 59px;"></span><i
                                            class="las la-th-list "></i><span>Office(s)</span><i
                                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                                    <ul id="office_" class="iq-submenu iq-submenu-data collapse" style="">

                                        @foreach (officeHOD() as $office)
                                            <li>
                                                <a href="{{ route('office.show', $office->office_code) }}">
                                                    <i class="las la-plus-circle"></i>{{ $office->name }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                @endif


                            </li>

                        </ul>

                    </li>



                </ul>
            </li>
        @endif



    </ul>
</nav>
<div class="p-3"></div>
