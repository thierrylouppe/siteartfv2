@section("body")
    @yield("page-header")

	<div class="container py-5">
		<div class="row">
            @yield("content")
			<div class="col-lg-3 pt-4 pt-lg-0">
				<aside class="sidebar">
					<div class="px-3 mt-4">
						<h3 class="text-color-secondary text-capitalize font-weight-bold text-5 m-0">Publications</h3>
						<ul class="nav nav-list flex-column mt-2 mb-0 p-relative right-9">
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('series-statistiques') ? 'active' : '' }}" href="{{ route('series-statistiques') }}">Séries statistiques</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('etudes') ? 'active' : '' }}" href="{{ route('etudes') }}">Etudes</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('bulletins-du-regulateur') ? 'active' : '' }}" href="{{ route('bulletins-du-regulateur') }}">Bulletins du régulateur</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('avis') ? 'active' : '' }}" href="{{ route('avis') }}">Avis</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>
@endsection