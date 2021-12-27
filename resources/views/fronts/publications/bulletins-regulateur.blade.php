<div>
	<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
		<div class="container">
			<div class="row">
				<div class="order-2 col-md-8 order-md-1 align-self-center p-static">
					<h1 class="text-dark">Publications</h1>
				</div>
				<div class="order-1 col-md-4 order-md-2 align-self-center">
					<ul class="breadcrumb d-block text-md-right">
						<li><a class="aperso" href="#">Accueil</a></li>
						<li><a class="aperso" href="#">Publications</a></li>
						<li class="active "><a class="text-color-light">Bulletins du regulateur</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<div class="container py-5">
		<div class="row">
			{{-- Contenue --}}
			<div class="col-lg-9">

			<div class="mb-5 border-0 card border-radius-0 box-shadow-1">
				<div class="p-4 card-body z-index-1">

					<div class="p-0 card-body">
						<h2 class="mt-2 font-weight-bold">BULLETINS DU REGULATEUR</h2>
						<hr class="my-3">
						@if ($nbrebulletinregulateurs > 0)
							@forelse($bulletinregulateurs as $bulletinregulateur)
							<section class="mb-5 call-to-action featured featured-primary">
								<div class="col-sm-9 col-lg-9">
									<div class="call-to-action-content">
										<h3><strong class="font-weight-extra-bold">{{$bulletinregulateur->titre}}</strong></h3>
									</div>
								</div>
								<div class="col-sm-3 col-lg-3">
									<div class="call-to-action-btn">
										<a href="{{asset('storage/'.$bulletinregulateur->pathfichier)}}" download="{{$bulletinregulateur->titre}}.pdf" target="_blank" class="btn btn-modern text-2 btn-primary">Télécharger <span><i class="fas fa-file-pdf"></i></span></a>
									</div>
								</div>
							</section>
							@empty
							<tr>
								<td colspan="6">
									<div class="alert alert-danger">
										<h5><i class="icon fas fa-ban"></i> Information!</h5>
										Aucune donnée trouvée par rapport aux éléments de recherche entrés.
									</div>
								</td>
							</tr>
							@endforelse
							<div class="row">
								<div class="col">
									<ul class="float-right pagination">
										{{ $bulletinregulateurs->links()}}
									</ul>
								</div>
							</div>
							@else
								@include('layouts.nodata')
						@endif
					</div>
				</div>
			</div>

		</div>
			<div class="pt-4 col-lg-3 pt-lg-0">
				<aside class="sidebar">
					@if ($nbrebulletinregulateurs > 0)
					<div class="px-3 mt-4">
						<h3 class="m-0 mb-2 text-color-secondary text-capitalize font-weight-bold text-5">Recherche</h3>
						<input class="form-control text-1" wire:model.debounce.200ms="search" placeholder="Rechercher votre étude" name="s" id="s" type="text">	
					</div>
					@endif
					<div class="px-3 mt-4">
						<h3 class="m-0 text-color-secondary text-capitalize font-weight-bold text-5">Publications</h3>
						<ul class="mt-2 mb-0 nav nav-list flex-column p-relative right-9">
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ setMenuActive("publications.series-statistiques") }}" href="{{ route('publications.series-statistiques') }}">Séries statistiques</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ setMenuActive("publications.etudes") }}" href="{{ route('publications.etudes') }}">Etudes</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ setMenuActive("publications.bulletins-regulateur") }}" href="{{ route('publications.bulletins-regulateur') }}">Bulletins du régulateur</a></li>
							<li class="nav-item"><a class="nav-link bg-transparent border-0 {{ setMenuActive("publications.avis") }}" href="{{ route('publications.avis') }}">Avis</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>
