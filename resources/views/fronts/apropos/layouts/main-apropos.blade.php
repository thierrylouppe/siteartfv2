@section("body")
    @yield("page-header")

	<div class="container py-5">
		<div class="row">
            @yield("content")
			<div class="pt-4 col-lg-3 pt-lg-0"> 
				<aside class="sidebar">
					<div class="px-3 mt-4">
						<h3 class="m-0 text-color-secondary text-capitalize font-weight-bold text-5">A propos</h3> 
						<ul class="mt-2 mb-0 nav nav-list flex-column p-relative right-9">
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.comite-de-direction') ? 'active' : '' }}" href="{{ route('apropos.comite-de-direction') }}">Comité de direction</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.direction-generale') ? 'active' : '' }}" href="{{ route('apropos.direction-generale') }}">Direction générale</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.direction-centrales') ? 'active' : '' }}" href="{{ route('apropos.direction-centrales') }}">Direction centrales</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.mission-et-pouvoir') ? 'active' : '' }}" href="{{ route('apropos.mission-et-pouvoir') }}">Missions et prérogatives</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('apropos.organigramme') ? 'active' : '' }}" href="{{ route('apropos.organigramme') }}">Organigramme</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>
@endsection