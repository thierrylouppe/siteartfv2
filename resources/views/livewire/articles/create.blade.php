<div class="p-4 col-md-12">
    <div class="row">

        <div class="col-md-auto">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-newspaper fa-1x"></i> Création de l'article </h3>
                </div>

                <form role="form" wire:submit.prevent='addArticle()' class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <div class="card-body pad">
                            <div class="form-group ">
                                <label for="titre" class="col-sm-3 col-form-label required">Titre de l'actualité
                                </label>
                                <input type="text" wire:model='newArticle.titre' id="titre" name="titre"
                                    class="form-control @error('newArticle.titre') is-invalid @enderror"
                                    placeholder="Entrer le titre" required>
                                @error('newArticle.titre')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('newArticle.titre') }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="text" class="col-sm-6 col-form-label required">Contenue </label>
                                <div class="mb-3" wire:ignore>
                                    <textarea wire:model='newArticle.contenue' id="description" placeholder="Entrer le contenu" class="form-control"></textarea>
                                </div>
                                <span class='text-danger'>
                                    @error('newArticle.contenue')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="text" class="col-sm-12 col-form-label required">Image cover
                                        </label>
                                        <input type='file' wire:model.defer='cover_image' name="image"
                                            id="ee{{ $inputFileIterator }}" />

                                        <span class='text-danger'>
                                            @error('image')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        @if (session()->has('message'))
                                            <span class='text-danger'>{{ session('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Ajout multiple --}}
                            {{-- <div class="form-group">
                                <label for="images" class="col-sm-6 col-form-label required">Images (si type est image):</label>
                                <input type="file" wire:model.defer="images" id="images" multiple>
                                @error('images') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Enregistrer</button>
                        <button type="button" wire:click="goToListArticle()"
                            class="float-right btn btn-danger">Retourner à
                            la liste des
                            articles</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-sm">
            <div class="card col-md-auto">
                @if ($cover_image)
                    <img class="card-img-top" src="{{ $cover_image->temporaryUrl() }}" alt="Card image cap"
                        style="height: 300px; margin: 10px 0px 10px 0px;">
                @endif
            </div>
        </div>
        {{-- <div class="col-md-4"  style="width: 18rem;">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Plus d'options</h3>
                </div>
                <div class="card-body">
                    <div class="form-group ">
                        <label for="titre" class="col-sm-6 col-form-label required">Type publication </label>
                        <div class="row ml-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkbox1" name="checkbox1"
                                    wire:model='newArticle.type_publication.site' value="site">
                                <label class="form-check-label" for="checkbox1">Site</label>
                            </div>
                            
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" id="checkbox2" name="checkbox2"
                                    wire:model='newArticle.type_publication.blog' value="blog">
                                <label class="form-check-label" for="checkbox2">Blog</label>
                            </div>
                        </div>
                    
                        @error('newArticle.type_publication')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="titre" class="col-sm-6 col-form-label">Support contenu </label>
                        <div class="row ml-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1" wire:model='newArticle.support_contenu' value="image">
                                <label class="form-check-label">Image</label>
                            </div>
                            
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="radio" name="radio1" wire:model='newArticle.support_contenu' value="video">
                                <label class="form-check-label">Video</label>
                            </div>
                        </div>

                        @error('newArticle.titre')
                            <div class="invalid-feedback">
                                {{ $errors->first('newArticle.titre') }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="titre" class="col-sm-6 col-form-label required">Catégorie </label>
                        <div class="row ml-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="checkbox3" wire:model='newArticle.category' value="1">
                                <label class="form-check-label">News</label>
                            </div>
                            
                            <div class="form-check ml-4">
                                <input class="form-check-input" type="checkbox" name="checkbox2" wire:model='newArticle.category' value="2">
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

            </div>
        </div> --}}

    </div>
</div>



@push('scripts')
@endpush
<script>
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
                @this.set('newArticle.contenue', contents);
            }
        }
    });
</script>
