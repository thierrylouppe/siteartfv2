@section("body")
    @yield("page-header")

	<div class="container py-5">
		<div class="row">
            @yield("content")
			<div class="pt-4 col-lg-3 pt-lg-0">
				<aside class="sidebar">
					<div class="px-3 mt-4">
						<h3 class="m-0 text-color-secondary text-capitalize font-weight-bold text-5">Observatoires</h3>
						<ul class="mt-2 mb-0 nav nav-list flex-column p-relative right-9">
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('observatoires.liste-etablissement-financier') ? 'active' : '' }}" href="{{ route('observatoires.liste-etablissement-financier') }}">Liste des établissements financiers</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ request()->url()==route('observatoires.obtention-agrement') ? 'active' : '' }}" href="{{ route('observatoires.obtention-agrement') }}">Condition d'obtention d'un agrement</a></li>
							@if(request()->url()==route('observatoires.obtention-agrement'))
							<li class="nav-item"><a class="bg-transparent border-0 nav-link text-color-secondary" href="{{asset('download/test.pdf')}}" download="Documentation (ver. 2.0.1).pdf" target="_blank">Télécharger la composition du dossier de demande agrement</a></li>
							@endif
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>
@endsection