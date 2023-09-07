<nav class="navbar header-navbar pcoded-header iscollapsed" header-theme="theme1" pcoded-header-position="fixed">
    <div class="navbar-wrapper">

        <div class="navbar-logo" logo-theme="theme1">
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-right">

                <li class="user-profile header-notification user-select-none">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('default_avatar.svg') }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{ Str::limit(\Auth::user()->name, 12) }}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <form id="logout-form" action="{{ route('admin.account.logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('admin.account.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="feather icon-log-out"></i>
                                        @lang('Выйти')
                                    </a>
                                </form>
                            </li>
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
