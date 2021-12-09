@section("contenu")
@yield("page-header")

<div class="container py-5">
    <div class="row">
        @yield("contenu")
        <div class="pt-4 col-lg-3 pt-lg-0">
            <aside class="sidebar">
                <div class="px-3 mt-4">
                    <h3 class="m-0 text-color-secondary text-capitalize font-weight-bold text-5">Directions centrales</h3>
                    <ul class="mt-2 mb-0 nav nav-list flex-column p-relative right-9">
                        <li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.dise') ? 'active' : '' }}" href="{{ route('apropos.dise') }}">Direction de l’inspection, des statistiques et des études</a></li>
                        <li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.dr') ? 'active' : '' }}" href="{{ route('apropos.dr') }}">Direction de la régulation</a></li>
                        <li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.dajic') ? 'active' : '' }}" href="{{ route('apropos.dajic') }}">Direction des affaires juridiques, des investigations et de la et de la coopération</a></li>
                        <li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.df') ? 'active' : '' }}" href="{{ route('apropos.df') }}">Direction financière</a></li>
                        <li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.drhl') ? 'active' : '' }}" href="{{ route('apropos.drhl') }}">Direction des ressources humaines et de la logistique</a></li>

                    </ul>
                </div>
            </aside>
        </div>
    </div>
</div>
</div>
@endsection

@section("body")
@yield("page-header")

<div class="container py-5">
    <div class="row">
        @yield("content")
        <div class="pt-4 col-lg-3 pt-lg-0">
            <aside class="sidebar">
                <div class="px-3 mt-4">
                    <h3 class="m-0 text-color-secondary text-capitalize font-weight-bold text-5">Directions centrales</h3>
                    <ul class="mt-2 mb-0 nav nav-list flex-column p-relative right-9">
                        <li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.dise') ? 'active' : '' }}" href="{{ route('apropos.dise') }}">Direction de l’inspection, des statistiques et des études</a></li>
                        <li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.dr') ? 'active' : '' }}" href="{{ route('apropos.dr') }}">Direction de la régulation</a></li>
                        <li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.dajic') ? 'active' : '' }}" href="{{ route('apropos.dajic') }}">Direction des affaires juridiques, des investigations et de la et de la coopération</a></li>
                        <li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.df') ? 'active' : '' }}" href="{{ route('apropos.df') }}">Direction financière</a></li>
                        <li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.drhl') ? 'active' : '' }}" href="{{ route('apropos.drhl') }}">Direction des ressources humaines et de la logistique</a></li>

                    </ul>
                </div>
            </aside>
        </div>
    </div>
</div>
</div>
@endsection