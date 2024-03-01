<header id="header" class="header-effect-shrink"
    data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}"
    style="height: 101px;">
    <div class="header-body border-top-0 header-body-bottom-border" style="position: fixed; top: 0px;">
        <div class="header-container container-fluid px-lg-4" style="height: 100px; min-height: 0px;">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <h1 class="header-logo" style="width: 100px; height: 48px;">
                            <a href="index.html">
                                <img alt="Porto" width="100" height="48"
                                    src="{{ asset('assets/img/logo/logo.png') }}"
                                    style="top: 0px; width: 100px; height: 48px;">
                            </a>
                        </h1>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        @guest

                        <div
                            class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                            <nav class="collapse">
                                <ul class="nav nav-pills" id="mainNav">
                                    <li class="dropdown">
                                        <a class="nav-link"
                                            href="#"><span class=" navbar-badge">Connexion</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        @else
                        <div
                            class="header-nav header-nav-line header-nav-bottom-line header-nav-line-under-text header-nav-bottom-line-effect-1">
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        {{-- <div
                            class="header-nav header-nav-line header-nav-bottom-line header-nav-line-under-text header-nav-bottom-line-effect-1">
                            <div
                                class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown">
                                            <a class="nav-link"
                                                data-toggle="dropdown-item dropdown-toggle active current-page-active"
                                                href="#" aria-expanded="true">
                                                <i class="far fa-bell"></i>
                                                <span class="badge badge-warning navbar-badge">15</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <div class="dropdown-divider"></div>
                                                <li>
                                                    <a href="#" class="dropdown-item">
                                                        <i class="mr-2 fas fa-envelope"></i> 4 new messages
                                                    </a>
                                                </li>
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item" href="#">Classic<i
                                                            class="fas fa-chevron-down"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="index-classic.html">Classic -
                                                                Original</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="index-classic-color.html">Classic - Color</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="index-classic-light.html">Classic - Light</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="index-classic-video.html">Classic - Video</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="index-classic-video-light.html">Classic - Video -
                                                                Light</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div> --}}
                        <div
                            class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2 mr-2 mr-lg-0">
                            <div class="header-nav-feature header-nav-features-search d-inline-flex">
                                <a href="#" class="header-nav-features-toggle" data-focus="headerSearch">
                                    <i class="header-nav-top-icon fas fa-user"></i></a>
                                <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed"
                                    id="headerTopSearchDropdown">
                                    <a href="#" class="dropdown-item text-bold"><b>{{ Auth::user()->nom }}
                                            <span class="text-capitalize">{{ Auth::user()->prenom }}</span></b></a>
                                    {{-- <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="mr-2 fas fa-envelope"></i> 4 new messages
                                        <span class="float-right text-sm text-muted">3 mins</span>
                                    </a> --}}
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('blog.profils') }}" class="dropdown-item">
                                        <i class="mr-2 fa fa-user"></i> <b>Mon profile</b>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        class="btn btn-primary btn-block"><b>Déconnexion</b>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <div class="dropdown-divider"></div>
                                    {{-- <hr>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
