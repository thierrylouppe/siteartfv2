@extends('layouts.main')
@section("body")
<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-dark">Actualités</h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
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
            <div class="col-md-3 order-3 order-md-1 align-right">
                @if(request()->input('s'))
                <h6>{{ $actualites->total() }} résultat(s) pour la recherche "{{ request()->s}}"</h6>
                @endif
            </div>
        </div>
        <div class="row">

            <div class="col">


                <div class="blog-posts">
                    <div class="row">
                        @if($nbreactualites > 0)
                        @foreach($actualites as $actualite)
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800"> 
                                <div class="card border-0 border-radius-0 box-shadow-1">
                                    <div class="card-body p-3 z-index-1 atualite">
                                        <a href="#">
                                            <img class="card-img-top border-radius-0 mb-2" style="max-width: 100%; height: auto;" src="{{ asset('storage/images/covers/'.$actualite->imgslider) }}" alt="{{$actualite->title }}">
                                        </a>
                                        <p class=" text-color-default text-1 my-2">
                                            <time pubdate datetime="{{Carbon\Carbon::parse($actualite->created_at)->toDateString()}}">Publié {{Carbon\Carbon::parse($actualite->created_at)->diffForHumans()}}</time>
                                        </p>
                                        <div class="card-body p-0">
                                            <h4 class="card-title text-5 font-weight-bold pb-1 mb-2"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="{{ route('actualitedetail', $actualite->slug) }}">{{$actualite->title }}</a></h4>
                                            <a href="{{ route('actualitedetail', $actualite->slug) }}" class="btn btn-link font-weight-semibold text-decoration-none text-3 pl-0">LIRE LA SUITE</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col">
                                <ul class="pagination float-right">
                                    {{ $actualites->links()}}
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

    </div>

</div>


@endsection