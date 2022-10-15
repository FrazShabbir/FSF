<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li @if (in_array(request()->route()->getName(),['dashboard'])) class="active" @endif>
            <a href="{{ route('dashboard') }}" class="iq-waves-effect"><i
                    class="las la-home iq-arrow-left"></i><span>Dashboard</span></a>
        </li>


        <li>
            <a href="#usermanagement" class="iq-waves-effect" data-toggle="collapse" >
                <i class="las la-th-list  iq-arrow-left"></i><span>User Management</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="usermanagement" class="iq-submenu collapse " data-parent="#iq-sidebar-toggle" style="">

                <li>
                    <ul>
                        <li class="usermanagement">
                            <a href="#users" class="iq-waves-effect collapsed" data-toggle="collapse"
                                aria-expanded="false"><span class="ripple rippleEffect"
                                    style="width: 204px; height: 204px; top: -80px; left: 59px;"></span><i
                                    class="las la-th-list "></i><span>User</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                            <ul id="users" class="iq-submenu iq-submenu-data collapse" style="">
                                @can('Create Users')
                                <li>
                                    <a href=""> <i class="las la-plus-circle"></i>Add User</a>
                                </li>
                                @endcan
                                @can('Read Users')
                                <li>
                                    <a href=""> <i class="las la-th-list"></i>All Users</a>
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
                                    <a href="{{ route('roles.create') }}"> <i class="las la-plus-circle"></i>Add Role</a>
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

        {{-- @if (getuser()->hasRole('Super Admin')) --}}
        {{-- ROLES MANAGEMENT ONLY FOR SUPER ADMIN --}}

        <li @if (in_array(request()->route()->getName(),
            ['roles.create', 'roles.edit', 'roles.index', 'roles.show'])) class="active" @endif>
            <a href="#userRoles" class="iq-waves-effect" data-toggle="collapse"
                @if (in_array(request()->route()->getName(),
                    ['roles.create', 'roles.edit', 'roles.index', 'roles.show'])) aria-expanded="true" @else aria-expanded="false" @endif><i
                    class="ri-menu-3-line iq-arrow-left"></i><span>Roles</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="userRoles" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                @can('Create Roles')
                    <li class="{{ request()->route()->getName() == 'roles.create'? 'active': '' }}"><a
                            href="{{ route('roles.create') }}"><i class="las la-plus-circle"></i>Create a Role</a></li>
                @endcan
                @can('Read Roles')
                    <li class="{{ request()->route()->getName() == 'roles.create'? 'active': '' }}"><a
                            href="{{ route('roles.index') }}"><i class="las la-th-list"></i>Roles List</a></li>
                @endcan
            </ul>
        </li>
        {{-- ROLE MANAGEMENT END --}}

        {{-- @endif --}}


        {{-- @if (getuser()->hasRole('Super Admin')) --}}
        {{-- USER MANAGEMENT ONLY FOR SUPER ADMIN --}}
        <li @if (in_array(request()->route()->getName(),
            ['users.create', 'users.edit', 'users.index', 'users.show'])) class="active" @endif>
            <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse"
                @if (in_array(request()->route()->getName(),
                    ['users.create', 'users.edit', 'users.index', 'users.show'])) aria-expanded="true" @else aria-expanded="false" @endif><span
                    class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>User</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                @can('Create Users')
                    <li class="{{ request()->route()->getName() == 'users.create'? 'active': '' }}"><a
                            href="{{ route('users.create') }}"><i class="las la-plus-circle"></i>User Add</a></li>
                @endcan
                @can('Read Users')
                    <li class="{{ request()->route()->getName() == 'users.index'? 'active': '' }}"><a
                            href="{{ route('users.index') }}"><i class="las la-th-list"></i>User List</a></li>
                @endcan
            </ul>
        </li>
        {{-- USER MANAGEMENT END --}}
        {{-- @endif --}}

    


        {{-- SETTINGS ONLY FOR ADMIN AND SUPERADMIN --}}
        @can('Update Settings')
            <li class="{{ request()->route()->getName() == 'site.siteSettings'? 'active': '' }}">
                <a href="{{ route('site.siteSettings') }}" class="iq-waves-effect"><i
                        class="las la-tools iq-arrow-left"></i><span>General Settings</span></a>
            </li>
        @endcan
        {{-- SETTING END --}}
        

    </ul>
</nav>
<div class="p-3"></div>
