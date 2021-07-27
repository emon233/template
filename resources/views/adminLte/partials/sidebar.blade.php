<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset(SITE_LOGO_PRIMARY) }}" alt="{{ SITE_NAME_SHORT }}" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ SITE_NAME }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->image_path }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a class="d-block">{{ auth()->user()->full_name }}</a>
            </div>
        </div>
        {{-- <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <?php $menu = isset($menu) ? $menu : ''; ?>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link @if (isset($menu) && $menu=='dashboard' ) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>

                <?php
                    $userManagementArray = ['users'];
                    $userManagement = in_array($menu, $userManagementArray) ? true : false;

                ?>
                <li class="nav-item @if($userManagement) menu-open @endif">
                    <a href="#" class="nav-link @if($userManagement) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('User Management') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('viewAny', \App\Models\User::class)
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link @if($menu == 'users') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Manage Users') }}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>

                @if (auth()->user()->role->all_access)

                <?php
                    $systemManagementArray = ['roles','accesses'];
                    $systemManagement = in_array($menu, $systemManagementArray) ? true : false;
                ?>

                <li class="nav-item @if($systemManagement) menu-open @endif">
                    <a href="#" class="nav-link @if($systemManagement) active @endif">
                        <i class="nav-icon fab fa-redhat"></i>
                        <p>
                            {{ __('System Management') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('viewAny', \App\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('system.roles.index') }}" class="nav-link @if($menu == 'roles') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Manage Roles') }}</p>
                            </a>
                        </li>
                        @endcan
                        @can('viewAny', \App\Models\Access::class)
                        <li class="nav-item">
                            <a href="{{ route('system.accesses.index') }}" class="nav-link @if($menu == 'accesses') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Manage Access') }}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
