@php
    $config = request()->user()->config;
@endphp

<nav class="main-header navbar navbar-expand navbar-light {{ $config['darkMode']=='dark' ? 'bg-dark' : 'navbar-white' }}" id="main_navbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" onclick="savestate();" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        @stack('top-menu')
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" title="Enable/Disable Dark-mode" onclick="swithDarkmode();" id="darkmode_switch" href="#" role="button">
                {!! $config['darkMode']=='dark' ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>' !!}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout.get') }}" role="button">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
