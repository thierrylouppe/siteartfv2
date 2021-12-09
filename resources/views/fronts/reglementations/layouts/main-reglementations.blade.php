@section("body")
    @yield("page-header")
	<div class="container py-5">
		<div class="row">
            @yield("content")
            <div class="col-lg-3 pt-4 pt-lg-0">
				<aside class="sidebar">
					<div class="px-3 mt-4">
						<h3 class="text-color-secondary text-capitalize font-weight-bold text-5 m-0">Réglementation</h3>
						<ul class="nav nav-list flex-column mt-2 mb-0 p-relative right-9">
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('lois') ? 'active' : '' }}" href="{{ route('lois') }}">Lois</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('decret') ? 'active' : '' }}" href="{{ route('decret') }}">Decrets</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('arrete') ? 'active' : '' }}" href="{{ route('arrete') }}">Arrêtés</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('circulaires') ? 'active' : '' }}" href="{{ route('circulaires') }}">Circulaires</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('instructions') ? 'active' : '' }}" href="{{ route('instructions') }}">Instructions</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>
@endsection