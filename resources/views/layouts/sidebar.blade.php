@php
    $config = request()->user()->config;
@endphp

    <!-- Main Sidebar Container -->
<aside id="main_sidebar"
       class="main-sidebar elevation-4 {{ $config['darkMode']=='dark' ? 'sidebar-dark-primary' : 'sidebar-light-primary' }}">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="brand-image"
             style="margin-top: auto">
        <span class="brand-text font-weight-light">{{ ucfirst(config('app.name', 'Cakee')) }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <div data-initials="{{ strtoupper(substr(request()->user()->name, 0, 2)) }}"></div>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ ucfirst(request()->user()->name) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.first') }}"
                       class="nav-link {{ Route::is('dashboard.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @canany(['User-alter', 'User-list', 'Roles'])
                    <li class="nav-item {{ Route::is('users.*') || Route::is('roles.*')  ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ Route::is('users.*') || Route::is('roles.*')  ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Users & Permissions
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @canany(['User-alter', 'User-list'])
                                <li class="nav-item">
                                    <a href="{{ route('users.list') }}"
                                       class="nav-link {{ Route::is('users.*') ? 'active' : '' }}">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            @endcanany
                            @can('Roles')
                                <li class="nav-item">
                                    <a href="{{ route('roles.list') }}"
                                       class="nav-link {{ Route::is('roles.*')  ? 'active' : '' }}">
                                        <i class="fas fa-users-cog nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
