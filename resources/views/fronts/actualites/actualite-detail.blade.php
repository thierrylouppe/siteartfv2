<div>
	<div role="main" class="main">
		<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
			<div class="container">
				<div class="row">
					<div class="order-2 col-md-8 order-md-1 align-self-center p-static">
						<h1 class="text-dark">Actualités</h1>
					</div>
					<div class="order-1 col-md-4 order-md-2 align-self-center">
						<ul class="breadcrumb d-block text-md-right">
							<li><a class="aperso" href="#">Accueil</a></li>
							<li class="active "><a class="text-color-light">Actualité détail</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<div class="container py-5">
			<div class="row">
				<div class="col-lg-9">

					<article>
						<div class="mb-5 border-0 card border-radius-0 box-shadow-1">
							<div class="p-4 card-body z-index-1">
								@if($article->image)
								<div class="ml-0 post-image">
									<a href="#">
										<img src="{{ asset('storage/images/sliders/'.$article->image) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="{{ $article->titre }}" />
									</a>
								</div>
								@endif
								<p class="mb-3 text-uppercase text-1 text-color-default"><time pubdate datetime="{{Carbon\Carbon::parse($article->updated_at)->toDateString()}}">Publié {{Carbon\Carbon::parse($article->updated_at)->diffForHumans()}}</time></p>

								<div class="p-0 card-body">
									<h2 class="mt-2 font-weight-bold">{{ $article->titre }}</h2>

									<p>{!! $article->contenue !!}</p>
									<hr class="my-5">
									<!-- AddThis Button BEGIN -->
									<div class="addthis_toolbox addthis_default_style ">
										<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
										<a class="addthis_button_tweet"></a>
										<a class="addthis_button_pinterest_pinit"></a>
										<a class="addthis_counter addthis_pill_style"></a>
									</div>
									<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
									<!-- AddThis Button END -->
								</div>
							</div>
						</div>
					</article>

				</div>
				<div class="pt-4 col-lg-3 pt-lg-0">
					<aside class="sidebar">
						<div class="px-3 mt-4">
							<div class="pb-1 mb-3 input-group">
								<input class="border-0 form-control box-shadow-none text-1 bg-color-grey" wire:model.debounce.200ms="search" placeholder="Recherchez..." name="s" id="s" type="text">
								<span class="input-group-append">
									<button type="submit" class="p-2 btn bg-color-grey text-1"><i class="m-2 fas fa-search"></i></button>
								</span>
							</div>
						</div>
						<div class="clearfix py-1">
							<hr class="my-2">
						</div>
						<div class="px-3 mt-4">
							<h3 class="m-0 mb-3 text-color-secondary text-capitalize font-weight-bold text-5">Articles récents</h3>
							<div class="pb-2 mb-1">
								@foreach($articlerecents as $actualite)
								<a href="#" class="mb-0 text-color-default text-uppercase text-1 d-block text-decoration-none">{{Carbon\Carbon::parse($actualite->updated_at)->diffForHumans()}}</a>
								<a href="{{ route('actualites.actualitedetail', $actualite->slug) }}" class="{{ request()->url()==route('actualites.actualitedetail', $actualite->slug) ? 'text-color-red font-weight-bold' : '' }} text-hover-primary  text-3 d-block pb-3 line-height-4">{{ $actualite->titre }}</a>
								@endforeach
							</div>
						</div>
						<div class="clearfix py-1">
							<hr class="my-2">
						</div>
					</aside>
				</div>
			</div>
		</div>

	</div>
</div>