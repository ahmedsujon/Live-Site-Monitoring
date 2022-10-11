<div>
    <div class="app-menu navbar-menu">
        <div class="navbar-brand-box">
            <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('assets/admin/images/logo.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="35">
                </span>
            </a>
            <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('assets/admin/images/logo.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/admin/images/logo.png') }}" alt="" height="35">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'active' : '' }} menu-link" href="{{ route('admin.dashboard') }}">
                            <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/monitoring/domains') || request()->is('admin/monitoring/domains/*') ? 'active' : '' }} menu-link" href="{{ route('admin.monitoring.domain') }}">
                            <i class="ri-bar-chart-2-line"></i> <span data-key="t-dashboards">Monitoring</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->is('admin/tools') || request()->is('admin/tools/*') ? 'text-white':'collapsed' }}" href="#sidebarTools" data-bs-toggle="collapse" aria-expanded="{{ request()->is('admin/tools') || request()->is('admin/tools/*') ? 'true':'false' }}" role="button" aria-controls="sidebarTools">
                            <i class="ri-xbox-line"></i> <span data-key="t-base-ui">Website Status</span>
                        </a>
                        <div class="menu-dropdown mega-dropdown-menu collapse {{ request()->is('admin/tools') || request()->is('admin/tools/*') ? 'show':'' }}" id="sidebarTools">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item {{ request()->is('admin/website-list') || request()->is('admin/website-list/*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.website.list') }}" class="nav-link {{ request()->is('admin/website-list') ? 'active':'' }}" data-key="t-alerts">Website List</a>
                                        </li>
                                        <li class="nav-item {{ request()->is('admin/suspended/website-list') || request()->is('admin/suspended/website-list/*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.suspended.website.list') }}" class="nav-link {{ request()->is('admin/suspended/website-list') ? 'active':'' }}" data-key="t-alerts">Suspended Websites</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/domain/status') || request()->is('admin/domain/status/*') ? 'active' : '' }} menu-link" href="{{ route('admin.domain.status') }}">
                            <i class="ri-stack-line"></i> <span data-key="t-dashboards">Domain Status</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/expiry/domain/status') || request()->is('admin/expiry/domain/status/*') ? 'active' : '' }} menu-link" href="{{ route('admin.expiry.domain.status') }}">
                            <i class="ri-alert-line"></i> <span data-key="t-dashboards">Recent Expiring</span>
                        </a>
                    </li>
                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Basic
                            Settings</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarLanding">
                            <i class="ri-rocket-line"></i> <span data-key="t-landing">Management</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarLanding">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-one-page"> Users </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.adminlist') }}" class="nav-link" data-key="t-one-page"> Admins </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarWebsite" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarWebsite">
                            <i class="ri-apps-line"></i> <span data-key="t-base-ui">Website Settings</span>
                        </a>
                        <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarWebsite">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.header.settings') }}" class="nav-link" data-key="t-alerts">Header Settings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.footer.settings') }}" class="nav-link" data-key="t-badges">Footer Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarCMS" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarCMS">
                            <i class="ri-book-3-line"></i> <span data-key="t-base-ui">CMS</span>
                        </a>
                        <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarCMS">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.social.link') }}" class="nav-link" data-key="t-alerts">Social Link</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-key="t-badges">Badges</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarSetting" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarSetting">
                            <i class="ri-settings-3-line"></i> <span data-key="t-base-ui">Settings</span>
                        </a>
                        <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarSetting">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.profile') }}" class="nav-link" data-key="t-alerts">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.profile') }}" class="nav-link" data-key="t-badges">Change Password</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
        <div class="sidebar-background"></div>
    </div>
</div>