  {{-- @if (getuser()->hasRole('Super Admin')) --}}
        {{-- ROLES MANAGEMENT ONLY FOR SUPER ADMIN --}}

        {{-- <li @if (in_array(request()->route()->getName(),
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
        </li> --}}
        {{-- ROLE MANAGEMENT END --}}

        {{-- @endif --}}


        {{-- @if (getuser()->hasRole('Super Admin')) --}}
        {{-- USER MANAGEMENT ONLY FOR SUPER ADMIN --}}
        {{-- <li @if (in_array(request()->route()->getName(),
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
        </li> --}}
        {{-- USER MANAGEMENT END --}}
        {{-- @endif --}}