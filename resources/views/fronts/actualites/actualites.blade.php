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
							<li class="active "><a class="text-color-light">Actualités</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<div class="container py-4">

			<div class="row">
				<div class="col-lg-3 order-lg-2">
					<aside class="sidebar">
						<div class="pb-1 mb-3 input-group">
							<input class="form-control text-1" wire:model.debounce.200ms="search" placeholder="Search..." name="s" id="s" type="text">
							<span class="input-group-append">
								<button type="submit" class="p-2 btn btn-dark text-1"><i class="m-2 fas fa-search"></i></button>
							</span>
						</div>
						<h5 class="pt-4 font-weight-bold">Actualités</h5>
						
						<div class="pb-2 mb-4 tabs tabs-dark">
							<ul class="nav nav-tabs">
								<li class="nav-item active"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recente</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="recentPosts">
									<ul class="simple-post-list">
										@foreach ($articlerecents as $actualite)	
										<li>
											<div class="post-image">
												<div class="img-thumbnail img-thumbnail-no-borders d-block">
													<a href="blog-post.html">
														<img src="{{ asset('storage/images/covers/'.$actualite->image) }}" width="50" height="50" alt="{{$actualite->titre }}">
													</a>
												</div>
											</div>
											<div class="post-info">
												<a href="{{ route('actualites.actualitedetail', $actualite->slug) }}">{{$actualite->titre }}</a>
												<div class="post-meta">
														<time pubdate datetime="{{Carbon\Carbon::parse($actualite->updated_at)->toDateString()}}">Publié {{Carbon\Carbon::parse($actualite->updated_at)->diffForHumans()}}</time>
												</div>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
					</aside>
				</div>
				<div class="col-lg-9 order-lg-1">
					<div class="blog-posts">
						<div class="px-3 row">
							@foreach($articlesenligne as $actualite)
								<div class="col-sm-6">
									<article class="pb-0 mb-5 border-0 post post-medium">
										<div class="post-image">
											<a href="#">
												<img src="{{ asset('storage/images/covers/'.$actualite->image) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="{{$actualite->titre }}" />
											</a>
										</div>
										<div class="post-content">
											<h2 class="mt-3 mb-2 font-weight-semibold text-5 line-height-6"><a href="{{ route('actualites.actualitedetail', $actualite->slug) }}">{{$actualite->titre }}</a></h2>
											{{-- <p class="bg-danger " style="color:Red; width: 100%; height: 60px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; backgroun:reed;">{{ $actualite->contenue }}</p> --}}
											{{-- <p style="width: 100%; height: 60px; text-overflow: ellipsis; overflow: hidden;">{!! $actualite->contenue !!}</p> --}}
											{{-- <p>{!! $article->contenue !!}</p> --}}
											{{-- <p style="width: 100%; height: 60px; text-overflow: ellipsis; overflow: hidden;">{{ $actualite->contenue }}</p> --}}

											<div class="post-meta">
												<span><i class="far fa-user"></i> Par <a href="#">Artf</a> </span>
												<span><i class="far fa-clock"></i> <a href="#"><time pubdate datetime="{{Carbon\Carbon::parse($actualite->updated_at)->toDateString()}}">Publié {{Carbon\Carbon::parse($actualite->updated_at)->diffForHumans()}}</time></a></span>
												<span class="mt-2 d-block"><a href="{{ route('actualites.actualitedetail', $actualite->slug) }}" class="btn btn-xs btn-light text-1 text-uppercase">Lire plus</a></span>
											</div>
										</div>
									</article>
								</div>
							@endforeach
						</div>

						<div class="row">
							<div class="col">
								<ul class="float-right pagination">
									{{ $articlesenligne->links() }}
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

	</div>
</div>