<div>
    <section class="section border-0 m-0">
        <div class="container container-lg-custom">
            <div class="row pb-1">
                @foreach ($all_articles as $article)
                    <div class="col-sm-6 col-lg-4 mb-4 pb-1">
                        <a href="{{ route('blog.detail', $article->slug) }}">
                            <article>
                                <div
                                    class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                    <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                        <img src="{{ asset('storage/images/sliders/' . $article->cover_image) }}"
                                            class="img-fluid" alt="{{ $article->titre }}" style="height: 300px; ">
                                        <div class="thumb-info-title bg-transparent p-4">
                                            <div class="thumb-info-type bg-color-primary px-2 mb-1">
                                                {{ $article->categorie->titre }}</div>
                                            <div class="thumb-info-inner mt-1">
                                                <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
                                                    {{ $article->titre }}</h2>
                                            </div>
                                            <div class="thumb-info-show-more-content">
                                                <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
                                                    {{ Str::limit(strip_tags($article->contenue), 150) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container container-lg-custom">
        <div class="row py-5">
            <div class="col-md-8 col-lg-8">
                <div class="blog-posts">
                    @foreach ($articlesenligne as $article)
                        @if ($article->support_contenu == null)
                            <article class="post post-large">
                                <div class="post-image">
                                    <a href="{{ route('blog.detail', $article->slug) }}">
                                        <img src="{{ asset('storage/images/sliders/' . $article->cover_image) }}"
                                            class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0"
                                            alt="{{ $article->titre }}">
                                    </a>
                                </div>

                                <div class="post-date text-1">
                                    <span
                                        class="day border-radius-0 text-4 text-primary">{{ $article->updated_at->format('d') }}</span>
                                    <span
                                        class="month border-radius-0 text-1 bg-color-dark">{{ $article->updated_at->format('M') }}</span>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a
                                            href="{{ route('blog.detail', $article->slug) }}"
                                            class="text-color-dark text-color-hover-primary">{{ $article->titre }}</a>
                                    </h2>
                                    {{ Str::limit(strip_tags($article->contenue), 250) }}
                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> Par <a href="#">ARTF/Communication</a>
                                        </span>
                                        <span><i class="far fa-folder"></i> <a
                                                href="#">{{ $article->categorie->titre }}</a></span>
                                        <span><i class="far fa-comments"></i> <a href="#">{{ $article->comments_count }} Comments</a></span>
                                        <span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a
                                                href="{{ route('blog.detail', $article->slug) }}"
                                                class="btn btn-xs btn-light text-1 text-uppercase">En
                                                savoir plus</a></span>
                                    </div>

                                </div>
                            </article>
                        @endif

                        {{-- Post avec 6 photos --}}
                        @if ($article->support_contenu == 'image')
                            <article class="post post-large">
                                <div class="post-image">
                                    <div class="lightbox"
                                        data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                                        <div class="row mx-0">
                                            @foreach ($article->decodedImages as $image)
                                                <div class="col-6 col-md-4 p-0">
                                                    <a href="{{ asset('storage/images/images/' . $image) }}">
                                                        <span
                                                            class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                            <span class="thumb-info-wrapper">
                                                                <img src="{{ asset('storage/images/images/' . $image) }}"
                                                                    class="img-fluid" alt="{{ $article->titre }}"
                                                                    style="height: 240px; ">
                                                                <span class="thumb-info-action">
                                                                    <span
                                                                        class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                                            class="fas fa-plus text-primary"></i></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="post-date text-1">
                                    <span
                                        class="day border-radius-0 text-4 text-primary">{{ $article->updated_at->format('d') }}</span>
                                    <span
                                        class="month border-radius-0 text-1 bg-color-dark">{{ $article->updated_at->format('M') }}</span>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a
                                            href="{{ route('blog.detail', $article->slug) }}"
                                            class="text-color-dark text-color-hover-primary">{{ $article->titre }}</a>
                                    </h2>
                                    {{ Str::limit(strip_tags($article->contenue), 250) }}

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i>Par <a
                                                href="#">ARTF/Communication</a></span>
                                        <span><i class="far fa-folder"></i> <a
                                                href="#">{{ $article->categorie->titre }}</a></span>
                                        <span><i class="far fa-comments"></i> <a href="#">{{ $article->comments_count }} Comments</a></span>
                                        <span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a
                                                href="{{ route('blog.detail', $article->slug) }}"
                                                class="btn btn-xs btn-light text-1 text-uppercase">En savoir
                                                plus</a></span>
                                    </div>

                                </div>
                            </article>
                        @endif
                        {{-- Post avec video --}}
                        @if ($article->support_contenu == 'video')
                            <article class="post post-large">
                                <div class="post-image">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="640" height="360" src="{{ $article->link_video }}"
                                            title="{{ $article->titre }}" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>

                                <div class="post-date text-1">
                                    <span
                                        class="day border-radius-0 text-4 text-primary">{{ $article->updated_at->format('d') }}</span>
                                    <span
                                        class="month border-radius-0 text-1 bg-color-dark">{{ $article->updated_at->format('M') }}</span>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a
                                            href="{{ route('blog.detail', $article->slug) }}"
                                            class="text-color-dark text-color-hover-primary">{{ $article->titre }}</a>
                                    </h2>
                                    {{ Str::limit(strip_tags($article->contenue), 250) }}

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> Par <a
                                                href="#">ARTF/Communication</a></span>
                                        <span><i class="far fa-folder"></i> <a
                                                href="#">{{ $article->categorie->titre }}</a></span>
                                        <span><i class="far fa-comments"></i> <a href="#">{{ $article->comments_count }} Comments</a></span>
                                        <span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a
                                                href="{{ route('blog.detail', $article->slug) }}"
                                                class="btn btn-xs btn-light text-1 text-uppercase">En savoir
                                                plus</a></span>
                                    </div>

                                </div>
                            </article>
                        @endif
                    @endforeach


                    <ul class="pagination float-right">
                        {{ $articles->links() }}
                    </ul>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="pin-wrapper" style="height: 658.5px;">
                    <aside class="sidebar pb-4" data-plugin-sticky=""
                        data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">

                        <div class="col-md-">

                            <h3 class="font-weight-bold text-3 mt-4 mt-md-0">Dernières publications</h3>

                            <div class="owl-carousel owl-theme owl-loaded owl-drag owl-carousel-init"
                                data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': false, 'dots': false, 'autoplay': true, 'autoplayTimeout': 5000}"
                                style="height: auto;">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-720px, 0px, 0px); transition: all 0.25s ease 0s; width: 2520px;">
                                        @foreach ($articlerecents as $article)
                                            <div class="owl-item cloned" style="width: 350px; margin-right: 10px;">
                                                <div>
                                                    <a href="{{ route('blog.detail', $article->slug) }}">
                                                        <article>
                                                            <div
                                                                class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                                                <div
                                                                    class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                                                    <img src="{{ asset('storage/images/sliders/' . $article->cover_image) }}"
                                                                        class="img-fluid"
                                                                        alt="{{ $article->titre }}">
                                                                    <div class="thumb-info-title bg-transparent p-4">
                                                                        <div
                                                                            class="thumb-info-type bg-color-primary px-2 mb-1">
                                                                            {{ $article->categorie->titre }}</div>
                                                                        <div class="thumb-info-inner mt-1">
                                                                            <h2
                                                                                class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
                                                                                {{ $article->titre }}
                                                                            </h2>
                                                                        </div>
                                                                        <div class="thumb-info-show-more-content">
                                                                            <p
                                                                                class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
                                                                                {{ Str::limit(strip_tags($article->contenue), 150) }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation"
                                        class="owl-prev"></button><button type="button" role="presentation"
                                        class="owl-next"></button></div>
                                <div class="owl-dots disabled"></div>
                            </div>
                        </div>

                        <div class="">
                            <h3 class="font-weight-bold text-3 mb-0 mt-4 mt-md-0">Articles à la une</h3>

                            <ul class="simple-post-list">
                                @forelse ($article_a_une as $article)
                                @if ($article->comments_count )  
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                            <a href="{{ route('blog.detail', $article->slug) }}">
                                                <img src="{{ asset('storage/images/sliders/' . $article->cover_image) }}"
                                                    class="border-radius-0" width="50" height="50"
                                                    alt="{{ $article->titre }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <h4 class="font-weight-normal text-3 line-height-4 mb-0"><a
                                                href="{{ route('blog.detail', $article->slug) }}"
                                                class="text-primary">{{ $article->titre }}</a></h4>
                                        <div class="post-meta">
                                            {{ $article->updated_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @empty
                                <h4 class="text-danger">Aucun article</h4>
                                @endforelse
                            </ul>
                        </div>

                        {{-- <h5 class="font-weight-bold">Dernières Twitte</h5>
                        <div id="tweet" class="twitter mb-4" data-plugin-tweets=""
                            data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                            <p>Please wait...</p>
                        </div> --}}

                        <h5 class="font-weight-bold pt-4">Retrouvez nous sur Facebook</h5>
                        <div class="fb-page" data-href="https://www.facebook.com/artfcongo/" data-small-header="true"
                            data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/artfcongo/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/artfcongo/">ARTF Congo</a></blockquote>
                        </div>
                    </aside>
                </div>
            </div>
        </div>

    </div>
</div>
