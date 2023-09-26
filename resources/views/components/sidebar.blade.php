<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('img/dart.png') }}" alt="logo" width="40" class="shadow-light rounded-circle">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('img/dart.png') }}" alt="logo" width="25" class="shadow-light rounded-circle">
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('dashboard.title') }}</li>
            <li class="{{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home">
                    </i> <span>{{ __('dashboard.title') }}</span>
                </a>
            </li>
            <li class="menu-header">{{ __('dashboard.settings') }}</li>
            <li class="{{ Request::is('admin/user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user') }}"><i class="far fa-user"></i>
                    <span>{{ __('dashboard.user.menu') }}</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('blank-page') }}"><i class="far fa-square"></i>
                    <span>{{ __('dashboard.blank-page') }}</span>
                </a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
