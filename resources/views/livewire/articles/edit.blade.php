<div class="p-4 pt-5 row">
    <div class='col-md-8'>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-newspaper fa-2x"></i> Edition de l'article </h3>
            </div>
            <form role="form" wire:submit.prevent='updateArticle()' class="form-horizontal">
                @csrf
                <div class="card-body">
                    <div class="card-body pad">
                        <div class="form-group ">
                            <label for="title" class="col-sm-6 col-form-label">Titre de l'actualité</label>
                            <input type="text" id="titre" name="titre"
                                class="form-control @error('editArticle.titre') is-invalid @enderror"
                                aria-describedby="titre" wire:model='editArticle.titre' , value="title">
                            @error('editArticle.titre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="text" class="col-sm-6 col-form-label">Contenue de l'article</label>
                            <div class="mb-3" wire:ignore>
                                <textarea id="description" name="contenue" class="textarea" wire:model='editArticle.contenue'></textarea>
                            </div>
                            <span class='text-danger'>
                                @error('editArticle.contenue')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        @if ($editArticle['support_contenu'] == 'video')
                            <div class="form-group ">
                                <label for="url" class="col-form-label required">Lien de la video
                                </label>
                                <input type="url" id="url" name="url"
                                    placeholder="Entrer le lien youtube de la video"
                                    class="form-control @error('editArticle.link_video') is-invalid @enderror"
                                    aria-describedby="link_video" wire:model='editArticle.link_video' , value="title">
                                <div class="d-flex justify-content-between bd-highlight">
                                    <div class="p-2 bd-highlight">
                                    </div>
                                    <div class="p-2 bd-highlight"></div>
                                    <div class="p-2 bd-highlight">
                                        <label class="col-form-label text-danger" wire:click='annulerActionUrl'
                                            style="cursor: pointer;">Annuler
                                        </label>
                                    </div>
                                </div>
                                @error('editArticle.link_video')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label for="titre" class="col col-form-label required">Type publication</label>
                                    <div class="row ml-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkbox1"
                                                name="checkbox1" wire:model='typePublication.site' value="site">
                                            <label class="form-check-label" for="checkbox1">Site</label>
                                        </div>

                                        <div class="form-check ml-4">
                                            <input class="form-check-input" type="checkbox" id="checkbox2"
                                                name="checkbox2" wire:model='typePublication.blog' value="blog">
                                            <label class="form-check-label" for="checkbox2">Blog</label>
                                        </div>
                                    </div>
                                    @error('typePublication')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <label for="titre" class="col col-form-label required">Catégorie</label>
                                    <div class="row ml-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio3"
                                                wire:model='editArticle.category' value="1">
                                            <label class="form-check-label">News</label>
                                        </div>

                                        <div class="form-check ml-4">
                                            <input class="form-check-input" type="radio" name="radio3"
                                                wire:model='editArticle.category' value="2">
                                            <label class="form-check-label">Publication</label>
                                        </div>
                                    </div>


                                    @error('newArticle.titre')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('newArticle.titre') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <label for="titre" class="col col-form-label">Support contenu </label>
                                    <div class="row ml-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio1"
                                                wire:model='editArticle.support_contenu' value="image">
                                            <label class="form-check-label">Image</label>
                                        </div>
                                        <div class="form-check ml-2">
                                            <input class="form-check-input" type="radio" name="radio1"
                                                wire:model='editArticle.support_contenu' value="video">
                                            <label class="form-check-label">Video</label>
                                        </div>
                                        @if ($editArticle['support_contenu'] == 'image' && $articleSelectEdit->images == null)
                                            <div>
                                                <small class="badge badge-primary ml-2" wire:click='toggleAddImage'
                                                    style="cursor: pointer;"><i class="fas fa-plus"></i>
                                                    Images</small>
                                            </div>
                                        @endif
                                    </div>

                                    @error('editArticle.support_contenu')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('editArticle.support_contenu') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                @if ($editArticle['status'] == 1)
                                    <label for="text" class="col-form-label text-success">Article en ligne</label>
                                @else
                                    <label for="text" class="col-form-label text-danger required">Article en
                                        rédaction </label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                    <button type="button" wire:click="goToListArticle()" class="btn btn-danger">Retourner à la liste
                        des
                        articles</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Modification de l'image' --}}
    <div class='col-md-4'>
        @if ($etatEditImage)
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-image"></i> Changer l'image de l'article</h3>
                </div>
                <div class="pb-1 card-body">
                    <div class="row">
                        <form role="form" wire:submit.prevent='addArticle()' class="">
                            @csrf
                            <div class="form-group row-sm-18">
                                <label for="image" class="col-form-label">Selectionner l'image</label>
                                <input type='file' wire:model='cover_image' name="image"
                                    id="image{{ $inputFileIterator }}" />
                                <span class='text-danger'>
                                    @error('cover_image')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="p-1 card-footer">
                    <button type="submit" wire:click.prevent="updateImage({{ $id_article }})"
                        class="btn btn-primary">Changer l'image de l'article</button>
                </div>
            </div>
            <h1></h1>
        @endif

        <div class="card col-md-auto btn-link" wire:click="toggleEditImage" style="cursor: pointer;">
            @if ($cover_image)
                {{-- <img class="card-img-top" src="{{ $cover_image->temporaryUrl() }}"
                    alt="{{ $editArticle['cover_image'] }}" style="height: 300px; margin: 10px 0px 10px 0px;"> --}}
            @else
                <img class="card-img-top" src="{{ asset('storage/images/covers/' . $editArticle['cover_image']) }}"
                    alt="{{ $editArticle['cover_image'] }}" style="height: 300px; margin: 10px 0px 10px 0px;">
            @endif
        </div>
        @if ($editArticle['support_contenu'] == 'image' && $etatAddImage == true)
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-image"></i> Changer les images de l'article</h3>
                </div>
                <div class="pb-1 card-body">
                    <form role="form">
                        <div class="form-group row-sm-18">
                            <label for="image" class="col-form-label required">Selectionner les images</label>
                            <input type='file' wire:model='images' name="image"
                                id="image{{ $inputFileIterator }}" multiple />
                            <span class='text-danger'>
                                @error('images')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </form>
                    <button type="submit" wire:click.prevent="updateImages({{ $id_article }})"
                        class="btn btn-primary mb-2">AjouterOK</button>
                    <button type="button" wire:click.prevent="annulerAction()"
                        class="btn btn-danger mb-2">Annuler</button>
                </div>
            </div>
            <h1></h1>
        @elseif ($editArticle['support_contenu'] == 'image')
            @if ($etatEditImages)
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="far fa-image"></i> Mise à jour des images de l'article</h3>
                    </div>
                    <div class="pb-1 card-body">
                        <form role="form">
                            <div class="form-group row-sm-18">
                                <label for="image" class="col-form-label required">Selectionner les images</label>
                                <input type='file' wire:model='imagesEdit' name="image"
                                    id="image{{ $inputFileIterator }}" multiple required />
                                <span class='text-danger'>
                                    @error('imagesEdit')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </form>
                        <button type="submit" wire:click.prevent="updateImages({{ $id_article }})"
                            class="btn btn-primary mb-2">Mise à jour</button>
                    </div>
                </div>
                <h1></h1>
            @endif
        @endif
        {{-- {{$articleSelectEdit->images}} --}}
        <div class="card col-md-auto btn-link" wire:click="toggleEditImages" style="cursor: pointer;">
            @if ($articleSelectEdit->images != null)
                <div class="row">
                    <div class="container">
                        <div class="row">
                            @foreach ($images as $image)
                                <div class="col"><img class="card-img-top"
                                        src="{{ asset('storage/images/images/' . $image) }}"
                                        alt="{{ $image }}"
                                        style="height: 100px; Width: 100px; margin: 5px 5px 5px 5px;">
                                </div>
                            @endforeach
                        </div>
                        {{-- @if ($articleSelectEdit->images)
                        @endif --}}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- <script>


        $(document).ready(function () {
            $('.summernote').summernote();
            $('#description2').summernote({
                height: 300,
            });
        });
</script> --}}
<script>
    $('#description2').summernote({
        height: 300,
    });

    $('#description').summernote({
        placeholder: "Contenue de l'article ici",
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('editArticle.contenue', contents);
            }
        }
    });
</script>
