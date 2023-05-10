<div>
    <div role="main" class="main">
        <!-- ======= Slider Section ======= -->
        <div class="slider-container rev_slider_wrapper" style="max-width: 100%; height: auto;">
            <div id="revolutionSlider" class="slider rev_slider manual" data-version="5.4.8">
                <ul>
                    @foreach($articles as $actualite)
                    <li data-transition="fade">
                        @if($actualite->image)
                        <img src="{{ asset('storage/images/sliders/'.$actualite->image) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg img-fluid" style="max-width: 100%; height: auto;">
                        @endif

                        <h1 class="text-center tp-caption font-weight-bold text-color-light" data-x="center" data-y="center" data-voffset="['10','10','10','10']" data-width="['770','770','770','350']" data-start="1000" data-fontsize="['45','45','45','35']" data-lineheight="['56','56','50','40']" data-transform_in="y:[100%];opacity:0;s:500;" data-transform_out="opacity:0;s:500;" style="white-space: normal; letter-spacing: -1px;">{{$actualite->titre}}</h1>

                        <a class="tp-caption btn btn-primary text-1 font-weight-semibold custom-btn-style-1" href="{{ route('actualites.actualitedetail', $actualite->slug) }}" data-x="center" data-y="center" data-voffset="['200','200','200','200']" data-start="1300" data-fontsize="['14','14','14','20']" data-paddingtop="['11','11','11','16']" data-paddingbottom="['11','11','11','16']" data-paddingleft="['32','32','32','42']" data-paddingright="['32','32','32','42']" data-transform_in="y:[100%];opacity:0;s:500;" data-transform_out="opacity:0;s:500;">Lire la suite</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div><!-- ======= End Slider Section ======= -->

        <!-- ======= Section Intro ======= -->
        <div id="home-intro" class="m-0 home-intro custom-home-intro bg-color-secondary">
            <div class="container">
                <div class="row align-items-center">
                    <div class="mb-3 col-lg-8 mb-lg-0">
                        <p class="my-1 text-color-red">
                            Conditions d'obtention d'un agrément 
                            <span class="pt-0 text-color-light d-inline-block">Il est obligatoire de souscrire à une demande d'agrément pour se conformer aux exigences de la création d'une société de transfert de fonds.</span>
                        </p>
                    </div>
                    <div class="text-left col-lg-4 text-lg-right">
                        <a href="{{ route('observatoires.obtention-agrement') }}" target="_blank" class="btn btn-primary custom-btn-style-1 text-uppercase font-weight-semibold">En Savoir Plus</a>
                        {{-- <a href="{{ route('observatoires.obtention-agrement') }}" target="_blank" class="btn btn-primary custom-btn-style-1 text-uppercase font-weight-semibold">En Savoir Plus</a> --}}
                    </div>
                </div>
            </div>
        </div><!-- ======= End Section Intro ======= -->

        <!-- ======= Message Directeur ======= -->
        {{-- <div class="container-fluid">
            <div class="row">
                <div class="p-0 col-lg-6">
                    <img src="{{ asset('assets/img/parallax/parallax-1.png')}}" class="img-fluid" alt="" style="width: 100%; height: 100%; object-fit: scale-down; background-position: center;">
                </div>
                <div class="p-0 col-lg-6">
                    <section class="m-0 section section-no-border h-100">
                        <div class="m-0 row">
                            <div class="col-half-section col-half-section-left">
                                <h2 class="mt-2 text-uppercase text-5 font-weight-bold">LE MOT DU DIRECTEUR GÉNÉRAL PAR INTERIM</h2>
                                <p class="text-4 text-color-dark"></p>
                                <p class="mb-4 custom-text-color-dark">Aux Personnel, Régulés et Partenaires
                                    Cette année sera davantage consacrée à la consolidation des activités de l’ARTF. Nous déploierons une importante stratégie de communication nécessaire à l’accomplissement des missions de l’ARTF, tout en maintenant la bonne collaboration avec nos partenaires.
                                </p>
                                <a href="{{ route('apropos.mot-du-dg') }}" class="mt-2 btn btn-outline btn-primary custom-btn-style-2 font-weight-semibold text-color-dark text-uppercase">lire la suite</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div> --}}
        <!-- ======= End Message Directeur ======= -->

        <!-- ======= Acès ciblés ======= -->
        <section class="m-0 section section-no-border custom-section-spacement-1 bg-color-tertiary">
            <div class="container py-2">
                <div class="row">

                    <div class="mb-4 col-lg-6 mb-lg-0">
                        <h2 class="mt-2 mb-4 text-uppercase font-weight-bold">Accès Ciblés</h2>

                        <div class="toggle toggle-primary" data-plugin-toggle data-plugin-options="{ 'isAccordion': true }">
                            <section class="toggle active">
                                <a class="toggle-title">Conditions d'obtention d'un agrément de transfert de fonds.</a>
                                <div class="toggle-content">
                                    <p>Cliquez <a class="text-red" href="{{ route('observatoires.obtention-agrement') }}">ici</a> pour avoir plus d'informations dans le cadre de l'exercice d'une activité dans les secteurs de transfert de fonds.</p>
                                </div>
                            </section>
                            <section class="toggle">
                                <a class="toggle-title">Avoir une vue sur les séries statistiques.</a>
                                <div class="toggle-content">
                                    <p>L'Agence de Regulation des Transferts de Fonds met à votre disposition un ensemble des séries statistiques téléchargeable. Cliquez <a class="text-red" href="{{ route('publications.series-statistiques') }}">ici</a> pour le téléchargement.</p>
                                </div>
                            </section>
                            <section class="toggle">
                                <a class="toggle-title">Liste des établissements financiers.</a>
                                <div class="toggle-content">
                                    <p>L'Agence de Regulation des Transferts de Fonds met à votre disposition une liste. <a class="text-red" href="{{ route('observatoires.liste-etablissement-financier') }}">Voir la liste</a> </p>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="mb-4 col-lg-6 mb-lg-0">
                        <h2 class="mt-2 mb-4 text-uppercase font-weight-bold">Nos mission</h2>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-2 feature-box align-items-center" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="100">
                                    <div class="feature-box-icon">
                                        <i class="icon-screen-tablet icons"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <p class="mb-0 opacity-9">Réguler les activités relatives aux transferts de fonds</p>
                                    </div>
                                </div>
                                <div class="mb-2 feature-box align-items-center" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300">
                                    <div class="feature-box-icon">
                                        <i class="icon-layers icons"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <p class="mb-0 opacity-9">Contribuer à l'élaboration de la balance de paiements</p>
                                    </div>
                                </div>
                                <div class="mb-2 feature-box align-items-center" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="500">
                                    <div class="feature-box-icon">
                                        <i class="icon-magnifier icons"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <p class="mb-0 opacity-9">Suivre la constitution et la liquidation des investissements directs étrangers</p>
                                    </div>
                                </div>
                                <div class="mb-2 feature-box align-items-center" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                                    <div class="feature-box-icon">
                                        <i class="icon-screen-desktop icons"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <p class="mb-0 opacity-9">Veiller au bon fonctionnement des sociétés de transfert de fonds</p>
                                    </div>
                                </div>
                                <div class="mb-2 feature-box align-items-center" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                                    <div class="feature-box-icon">
                                        <i class="icon-doc icons"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <p class="mb-0 opacity-9">Examiner les demandes d'agrément des sociétés de transfert de fonds</p>
                                    </div>
                                </div>
                                <div class="mb-2 feature-box align-items-center" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="600">
                                    <div class="feature-box-icon">
                                        <i class="icon-user icons"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <p class="mb-0 opacity-9">Contribuer à la lutte contre le blanchiment des capitaux et le financement du terrorisme</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section><!-- ======= End Acès ciblés ======= -->

        <section class="m-0 border-0 section section-height-3 bg-color-quaternary">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 pb-sm-4 pb-lg-0 pr-lg-5 mb-sm-5 mb-lg-0">
                        <div class="mt-2 mb-1 tabs tabs-bottom tabs-center tabs-simple custom-tabs-style-1">
                            <ul class="mb-3 nav nav-tabs">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#tabsNavigationSimpleIcons1" data-toggle="tab">
                                        <p class="pt-2 pb-0 mb-0 text-color-dark font-weight-bold text-2">Vision</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabsNavigationSimpleIcons4" data-toggle="tab">
                                        <p class="pt-2 pb-0 mb-0 text-color-dark font-weight-bold text-2">Engagements</p>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabsNavigationSimpleIcons1">
                                    <div class="text-center">
                                        <p>L' Agence de Régulation des Transferts de Fonds se veut être un puissant outil d'anticipation des enjeux et défis d'un secteur sensible de l'économie d'une part et être une force de proposition en matière de définition des politiques et stratégie de développement qualitatif de l'activité des transferts de fonds.</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabsNavigationSimpleIcons4">
                                    <div class="text-center">
                                        <p>L' Agence de Régulation des Transferts de Fonds, Autorité de Régulation, est l’organe technique qui assiste le Ministre DES FINANCES ET DU BUDGET dans l'exercice de ses attributions dans l’orientation et Le contrôle des activités en matière de transferts de fonds à L' intérieur comme à l'extérieur du Congo. Découvrez les engagements de ladite agence.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 mt-sm-5" style="top: 1.7rem;">
                        <img src="{{ asset('assets/img/visions/vision-1.png')}}" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="300" style="top: 10%; left: -50%;" alt="" />
                        <img src="{{ asset('assets/img/visions/vision-2.png')}}" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" style="top: -33%; left: -29%;" alt="" />
                        <img src="{{ asset('assets/img/visions/vision-3.png')}}" class="mb-2 img-fluid position-relative appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="600" alt="" />
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Chiffres clés ======= -->
        @if($nbrechiffrecles > 0)
        <section id="news" class="m-0 section section-no-border custom-section-spacement-1 bg-color-grey-scale-2">
            <div class="container">
                <div class="text-center row justify-content-center">
                    <div class="col-12">
                        <h2 class="text-uppercase font-weight-bold ">Chiffres clés</h2>
                        <p class="mb-3 text-4 custom-text-color-5">------</p>
                    </div>

                    <div class="row">
                        <div class="col-12">

                            <div class="text-center row">
                                @foreach($chiffrecles as $chiffrecle)
                                <div class="text-center col justify-content-center">
                                    <div class="m-0 circular-bar custom-circular-bar ">
                                        <div class="circular-bar-chart" data-percent="{{$chiffrecle->percentImpor}}" data-plugin-options="{'barColor': '#ed1c24'}">
                                            <strong class="text-center text-5 text-color-red justify-content-center">{{$chiffrecle->impor}}%</strong>
                                        </div>
                                    </div>

                                    <div class="mb-3 font-weight-semibold text-color-dark">Importations de biens et services</div>
                                </div>

                                <div class="text-center col">
                                    <div class="m-0 circular-bar custom-circular-bar">
                                        <div class="circular-bar-chart" data-percent="{{$chiffrecle->percentExpor}}" data-plugin-options="{'barColor': '#ed1c24'}">
                                            <strong class="text-center text-5 text-color-red">{{$chiffrecle->expor}}%</strong>
                                        </div>
                                    </div>

                                    <div class="mb-3 font-weight-semibold text-color-dark">Exportations de biens et services</div>
                                </div>

                                <div class="text-center col">
                                    <div class="m-0 circular-bar custom-circular-bar">
                                        <div class="circular-bar-chart" data-percent="{{$chiffrecle->percentMre}}" data-plugin-options="{'barColor': '#ed1c24'}">
                                            <strong class="text-center text-5 text-color-red">{{$chiffrecle->mre}}%</strong>
                                        </div>
                                    </div>

                                    <div class="mb-3 font-weight-semibold text-color-dark">Recettes MRE</div>
                                </div>

                                <div class="text-center col">
                                    <div class="m-0 circular-bar custom-circular-bar">
                                        <div class="circular-bar-chart" data-percent="{{$chiffrecle->percentVoyage}}" data-plugin-options="{'barColor': '#ed1c24'}">
                                            <strong class="text-center text-5 text-color-red">{{$chiffrecle->voyages}}%</strong>
                                        </div>
                                    </div>

                                    <div class="mb-3 font-weight-semibold text-color-dark">Recettes Voyages</div>
                                </div>

                                <div class="text-center col">
                                    <div class="m-0 circular-bar custom-circular-bar">
                                        <div class="circular-bar-chart" data-percent="{{$chiffrecle->percentFlux}}" data-plugin-options="{'barColor': '#ed1c24'}">
                                            <strong class="text-center text-5 text-color-red">{{$chiffrecle->flux}}%</strong>
                                        </div>
                                    </div>

                                    <div class="mb-3 font-weight-semibold text-color-dark">Flux des IDE</div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </section><!-- ======= End news ======= -->
        @else
        
        @endif

        <!-- ======= News ======= -->
        <section id="news" class="m-0 section section-no-border custom-section-spacement-1 bg-color-grey-scale-1">
            <div class="container">
                <div class="text-center row">
                    <div class="col">
                        <h2 class="text-uppercase font-weight-bold ">Actualités</h2>
                        <p class="mb-3 text-4 custom-text-color-5">------</p>
                    </div>
                </div>


                <div class="row">
                    @if($nbreactualites > 0)
                    @foreach($articles as $actualite)
                    <div class="mb-4 col-lg-4 mb-lg-0">
                        <article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">
                            <div class="border-0 card border-radius-0 box-shadow-1">
                                <div class="p-3 card-body z-index-1 atualite">
                                    <a href="#">
                                        <img class="mb-2 card-img-top border-radius-0" style="max-width: 100%; height: auto;" src="{{ asset('storage/images/covers/'.$actualite->image) }}" alt="{{$actualite->title }}">
                                    </a>
                                    <p class="my-2 text-color-default text-1">
                                        <time pubdate datetime="{{Carbon\Carbon::parse($actualite->updated_at)->toDateString()}}">Publié {{Carbon\Carbon::parse($actualite->updated_at)->diffForHumans()}}</time>
                                    </p>
                                    <div class="p-0 card-body">
                                        <h4 class="pb-1 mb-2 card-title text-5 font-weight-bold"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="{{ route('actualites.actualitedetail', $actualite->slug) }}"></a>{{$actualite->titre }}</h4>
                                        <a href="{{ route('actualites.actualitedetail', $actualite->slug) }}" class="pl-0 btn btn-link font-weight-semibold text-decoration-none text-3">LIRE LA SUITE</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                    @else
                    @include('layouts.nodata')
                    @endif
                </div>
                <div class="text-center col-lg-12">
                    <a href="{{ route('actualites.actualites') }}" class="mt-3 btn btn-outline btn-primary custom-btn-style-2 text-color-blue text-uppercase font-weight-semibold">Voir Plus</a>
                </div>
            </div>
        </section><!-- ======= End news ======= --> 
    </div>
</div>
