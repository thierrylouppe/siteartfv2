<div>
    <div class="p-4 pt-5 row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-sticky-note fa-2x"></i> Aperçu de la publication</h3>
                </div>
                <div class="card-body">
                    <div class="card-body pad">
                        <article>
                            <div class="mb-1 border-0 card border-radius-0 box-shadow-1">
                                <div class="p-4 card-body z-index-1">
                                    @if($article->image)
                                        <div class="ml-0 post-image">
                                            <a href="#">
                                                <img src="{{ asset('storage/'.$article->image) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="{{ $article->titre }}"/>
                                            </a>
                                        </div>
                                    @endif
                                    <p class="mb-3 text-uppercase text-1 text-color-default"><time pubdate datetime="{{Carbon\Carbon::parse($article->created_at)->toDateString()}}">Publié {{Carbon\Carbon::parse($article->created_at)->diffForHumans()}}</time></p>

                                    <div class="p-0 card-body">
                                        <h2 class="mt-2 font-weight-bold">{{ $article->titre }}</h2>
                                        <p>{!! $article->contenue !!}</p>
                                        <hr class="my-5"> 
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="card-footer">
                        <a href="{{ route("admin.gestionarticles.articles.index")}}"  name="cancel" class="float-right btn btn-danger">Fermer l'aperçu</a>
                    </div>
            </div>
        </div>
    </div>
</div>