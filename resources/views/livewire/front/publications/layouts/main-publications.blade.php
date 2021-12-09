@section("body")
    @yield("page-header")

	<div class="container py-5">
		<div class="row">
            @yield("content")
			<div class="pt-4 col-lg-3 pt-lg-0">
				<aside class="sidebar">
					<div class="px-3 mt-4">
						<h3 class="m-0 text-color-secondary text-capitalize font-weight-bold text-5">Publications</h3>
						<ul class="mt-2 mb-0 nav nav-list flex-column p-relative right-9">
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('publications.series-statistiques') ? 'active' : '' }}" href="{{ route('publications.series-statistiques') }}">Séries statistiques</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('publications.etudes') ? 'active' : '' }}" href="{{ route('publications.etudes') }}">Etudes</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('publications.bulletins-du-regulateur') ? 'active' : '' }}" href="{{ route('publications.bulletins-du-regulateur') }}">Bulletins du régulateur</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('publications.avis') ? 'active' : '' }}" href="{{ route('publications.avis') }}">Avis</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>
@endsection