@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if (Auth::user()->usertype=='Admin')
            <li class="nav-item has-treeview {{ ($prefix=='/users')?'menu-open':'' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage User
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.view') }}" class="nav-link {{ ($route=='users.view'?'active':'') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View User</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="nav-item has-treeview {{ ($prefix=='/profiles')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Profile
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('profiles.view') }}" class="nav-link {{ ($route=='profiles.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Your Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profiles.password.view') }}" class="nav-link {{ ($route=='profiles.password.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/divisions')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Division
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('divisions.view') }}" class="nav-link {{ ($route=='divisions.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Division</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/districts')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage District
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('districts.view') }}" class="nav-link {{ ($route=='districts.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View District</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/upazilas')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Upazila
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('upazilas.view') }}" class="nav-link {{ ($route=='upazilas.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Upazila</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/unions')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Union
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('unions.view') }}" class="nav-link {{ ($route=='unions.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Union</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/wards')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Ward No
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('wards.view') }}" class="nav-link {{ ($route=='wards.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Ward No</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/villages')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Village
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('villages.view') }}" class="nav-link {{ ($route=='villages.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Village</p>
                    </a>
                </li>

            </ul>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
