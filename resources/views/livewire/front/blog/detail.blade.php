<div>
    <div role="main" class="main no-height" id="main">
        <div class="container">
            <div class="row mt-4 mb-4">
                <div class="col">
                    <article class="our-blog-item blog-post mt-4">
                        <span class="image-wrapper">
                            <img src="{{ asset('storage/images/sliders/' . $article->cover_image) }}"
                                alt="{{ $article->titre }}" class="img-fluid">
                        </span>
                        <span class="category text-uppercase bg-color-quaternary">
                            {{ $article->categorie->titre }}
                        </span>
                        <div class="post-infos">
                            <div class="share">
                                <div class="share-icons bg-color-quaternary">
                                    <a href="#" class="text-decoration-none" title="Share on Facebook"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="text-decoration-none" title="Share on Twitter"><i
                                            class="fab fa-twitter"></i></a>
                                    <a href="#" class="text-decoration-none" title="Share on Linkedin"><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <i class="fas fa-share-alt"></i>
                                </div>
                            </div>
                            <span class="post-date">
                                {{ $article->updated_at->diffForHumans() }}
                            </span>
                            <h1 class="font-weight-normal mb-4">
                                {{ $article->titre }}
                            </h1>

                            <p>{!! $article->contenue !!}</p>
                            @if ($article->support_contenu == 'image')
                            @endif
                            <div class="owl-carousel owl-theme nav-center custom-carousel-dots-style pt-4 owl-loaded owl-drag owl-carousel-init"
                                data-plugin-options="{'items': 2, 'responsive': {'479': {'items': 1}, '979': {'items': 2}, '1199': {'items': 2}}, 'margin': 10, 'loop': false, 'dots': true, 'nav': false}"
                                style="height: auto;">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2285px;">
                                        @foreach ($article->decodedImages as $image)
                                            <div class="owl-item" style="width: 370.7px; margin-right: 10px;">
                                                <div>
                                                    <a href="#photographyLightbox" class="text-decoration-none">
                                                        <img src="{{ asset('storage/images/images/' . $image) }}"
                                                            alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation"
                                        class="owl-prev"></button><button type="button" role="presentation"
                                        class="owl-next"></button></div>
                            </div>

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
                                </article>
                            @endif
                        </div>
                    </article>

                </div>
            </div>
        </div>

        <section class="post-comments">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="text-primary font-weight-normal custom-font-size-1 mb-3">Commentaire
                            ({{ count($article->comments) }})</h2>
                        <ul class="comments">
                            @foreach ($article->comments as $comment)
                                @if ($comment->parent_id == null && $comment->article_id == $article->id)
                                    <div class="accordion" id="commentAccordion">
                                        <div class="col">
                                            <div class="">
                                                <div class="" id="heading{{ $comment->id }}">
                                                    <li data-toggle="collapse"
                                                        data-target="#collapse{{ $comment->id }}" aria-expanded="true"
                                                        aria-controls="collapse{{ $comment->id }}"
                                                        style="height: auto; padding-top: 0px; padding-bottom: 6px;">
                                                        <div class="comment"
                                                            style="width: auto; height: auto; margin: 0px;">
                                                            <div class="img-thumbnail d-none d-sm-block bg-info"
                                                                style="width: 50px; height: 50px;">
                                                                <img class="avatar" alt=""
                                                                    src="{{ asset('path/to/default/avatar.jpg') }}">
                                                            </div>
                                                            <div class="comment-block"
                                                                style="height: auto; padding: 1px;">
                                                                <span class="comment-by ">
                                                                    <strong>{{ $comment->auteur->nom }}
                                                                        {{ $comment->auteur->prenom }}</strong>
                                                                    <span class="float-right">
                                                                        <span> <a href="#"
                                                                                class="btn btn-quaternary  text-uppercase font-weight-semibold"
                                                                                wire:click.prevent='activeReply({{ $comment->id }})'>Répondre
                                                                                Com P</a>
                                                                        </span>
                                                                        <span>
                                                                            <p class="text-lowercase text-info"><em>Il
                                                                                    y
                                                                                    a <samp
                                                                                        class="text-danger">({{ count($comment->replies) }})</samp>
                                                                                    sous-commentaire</em></p>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                                <p>{{ $comment->content }}</p>
                                                            </div>
                                                        </div>
                                                        @if ($selectContent == $comment->id)
                                                            <form wire:submit.prevent="addReply({{ $comment->id }})">
                                                                <div class="form-row">
                                                                    <div class="form-group col">
                                                                        <textarea wire:model.defer="replyContent" maxlength="5000" rows="2" class="form-control" name="replyContent"
                                                                            placeholder="Répondre au commentaire..."></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col">
                                                                        <input type="submit" value="RépondreOK"
                                                                            class="btn btn-quaternary btn-sm text-uppercase font-weight-semibold">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @elseif ($selectParent_id == $comment->id)
                                                            <form
                                                                wire:submit.prevent="addReply({{ $selectContent }})">
                                                                <div class="form-row">
                                                                    <div class="form-group col">
                                                                        <textarea wire:model.defer="replyContent" maxlength="5000" rows="2" class="form-control" name="replyContent"
                                                                            placeholder="Répondre au commentaire sous commentaire..."></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col">
                                                                        <input type="submit" value="Répondre"
                                                                            class="btn btn-quaternary btn-sm text-uppercase font-weight-semibold">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @endif
                                                    </li>
                                                </div>
                                                <li>
                                                    @if ($comment->replies->isNotEmpty())
                                                        <div id="collapse{{ $comment->id }}" class="collapse"
                                                            aria-labelledby="heading{{ $comment->id }}"
                                                            data-parent="#commentAccordion">
                                                            <ul class="comments reply">
                                                                @foreach ($comment->replies as $reply)
                                                                    <li>
                                                                        <div class="comment"
                                                                            style="width: auto; height: auto;">
                                                                            <div class="img-thumbnail d-none d-sm-block bg-danger"
                                                                                style="width: 50px; height: 50px;">
                                                                                <img class="avatar" alt=""
                                                                                    src="{{ asset('path/to/default/avatar.jpg') }}">
                                                                            </div>
                                                                            <div class="comment-block"
                                                                                style="height: auto; padding: 1px;">
                                                                                <span class="comment-by">
                                                                                    <strong>
                                                                                        {{ $reply->auteur->prenom }}</strong>
                                                                                    <span class="float-right">
                                                                                        <span> <a href=""
                                                                                                class="btn btn-quaternary text-uppercase font-weight-semibold"
                                                                                                wire:click.prevent='activeSousReply({{ $reply->id }}, {{ $reply->parent_id }})'>Répondreff</a></span>
                                                                                    </span>
                                                                                </span>
                                                                                <p>{{ $reply->content }}</p>
                                                                                {{-- <p>{{ $reply }}</p> --}}
                                                                            </div>
                                                                        </div>
                                                                        @foreach ($comment->replies_recursive as $test)
                                                                            {{-- {{ $test->replies_recursive}} --}}
                                                                            @foreach ($test->replies_recursive as $pro)
                                                                                {{-- {{ $pro->parent_id }} <br> --}}
                                                                                @if ($pro->parent_id == $reply->id)
                                                                                    <ul>

                                                                                        <div class="comment"
                                                                                            style="width: auto; height: auto;">
                                                                                            <div class="img-thumbnail d-none d-sm-block"
                                                                                                style="width: 50px; height: 50px;">
                                                                                                <img class="avatar"
                                                                                                    alt=""
                                                                                                    src="{{ asset('path/to/default/avatar.jpg') }}">
                                                                                            </div>
                                                                                            <div class="comment-block"
                                                                                                style="height: auto; padding: 1px;">
                                                                                                <span
                                                                                                    class="comment-by">
                                                                                                    <strong>{{ $pro->auteur->nom }}
                                                                                                        {{ $pro->auteur->prenom }}</strong>
                                                                                                    {{-- <span class="float-right">
                                                                                                    <span> <a href=""
                                                                                                            class="btn btn-quaternary text-uppercase font-weight-semibold"
                                                                                                            wire:click.prevent='activeReply({{ $pro->id }})'>Répondre</a></span>
                                                                                                </span> --}}
                                                                                                </span>
                                                                                                <p>{{ $pro->content }}
                                                                                                </p>
                                                                                                {{-- <p>{{ $reply }}</p> --}}
                                                                                            </div>
                                                                                        </div>
                                                                                    </ul>
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </li>

                                            </div>
                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="leave-comment bg-color-light">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="text-primary font-weight-normal custom-font-size-1 mb-3">Laisser un commentaire</h2>
                        <form class="form" wire:submit.prevent="submitComment">
                            <div class="form-row">
                                <div class="form-group col">
                                    <textarea wire:model.defer="comment" maxlength="5000" rows="5" class="form-control" name="comment"
                                        id="comment" placeholder="Commentaire*"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="submit" value="Soumettre"
                                        class="btn btn-quaternary  btn-lg text-uppercase font-weight-semibold"
                                        data-loading-text="Loading...">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>




        <div id="photographyLightbox" class="mfp-hide">
            <div class="thumb-gallery">
                <div class="owl-carousel owl-theme manual thumb-gallery-detail owl-loaded owl-drag"
                    id="thumbGalleryDetail">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                            @foreach ($article->decodedImages as $image)
                                <div class="owl-item">
                                    <div>
                                        <span class="img-thumbnail d-block">
                                            <img alt="Project Image"
                                                src="{{ asset('storage/images/images/' . $image) }}"
                                                class="img-fluid">
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation"
                            class="owl-prev disabled"></button><button type="button" role="presentation"
                            class="owl-next"></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </div>

    </div>
</div>
