<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="border-0 header-body">
        <div class="container header-container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{ route('home') }}">
                                <img alt="Logo ARTF" width="181" height="80" data-bgfit="contain" src="{{ asset('assets/img/logo/logo.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="order-2 header-nav header-nav-links order-lg-1">
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">

                                        <li>
                                            <a class="nav-link {{ request()->url()==route('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                                Accueil
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ request()->is('apropos/*')? 'active' : '' }}" href="#">
                                                A propos
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('apropos.comite-de-direction') }}">
                                                        Comité de Direction
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('apropos.direction-generale') }}">
                                                        Direction Générale
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('apropos.direction-centrales') }}">
                                                        Directions Centrales
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('apropos.mission-et-pouvoir') }}">
                                                        Missions et Prérogatives
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('apropos.organigramme') }}">
                                                        Organigramme
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ request()->is('reglementations/*')? 'active' : '' }}" href="#">
                                                Réglementation
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('reglementations.lois') }}">
                                                        Lois
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('reglementations.decrets') }}">
                                                        Decrets
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('reglementations.arretes') }}">
                                                        Arrêtés
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('reglementations.circulaires') }}">
                                                        Circulaires
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('reglementations.instructions') }}">
                                                        Instructions
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ request()->is('observatoires/*')? 'active' : '' }}" href="#">
                                                Observatoires
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('observatoires.liste-etablissement-financier') }}">
                                                        Liste des établissements financiers
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('observatoires.obtention-agrement') }}">
                                                        Conditions d'obtention d'un agrément
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ request()->is('publications/*')? 'active' : '' }}" href="#">
                                                Publications
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('publications.series-statistiques') }}">
                                                        Séries statistiques
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('publications.etudes') }}">
                                                        Etudes
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('publications.bulletins-regulateur') }}">
                                                        Bulletins du régulateur
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('publications.avis') }}">
                                                        Avis
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ request()->is('actualites/*') ? 'active' : ''}}" href="{{ route('actualites.actualites') }}">
                                                Actualités
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ request()->url()==route('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                                                Contact
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        <div class="order-1 ml-2 order-lg-2">
                            <div class="row">
                                <div class="pt-3 text-center col-lg-12">
                                    <ul class="mb-3 header-social-icons social-icons social-icons-clean custom-social-icons">
                                        <li class="social-icons-facebook"><a href="https://www.facebook.com/artfcongo/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="social-icons-twitter"><a href="https://twitter.com/artf_congo" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>