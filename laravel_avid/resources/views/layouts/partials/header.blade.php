<nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container-fluid">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">

            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ route('login') }}"><img src="<?=url('images/logo.png');?>" alt="logo" style="height:45px !important;" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('login') }}"><img src="<?=url('images/avian.png');?>" alt="logo" style="height:45px !important;" /></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">{{ $userinfo['username'] }}</span>
                        <span class="online-status"></span>
                        <img src="{{ $avatar }}" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a href="{{ route('change_password') }}" class="dropdown-item"><i class="mdi mdi-settings text-primary"></i>Ubah Password</a>
                        <a href="{{ route('logout') }}" class="dropdown-item"><i class="mdi mdi-logout text-primary"></i>Logout</a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </div>
</nav>