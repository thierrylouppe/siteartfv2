<div class="p-4 col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-newspaper fa-2x"></i> Création de l'article : </h3>
        </div>

        <form role="form" wire:submit.prevent='addArticle()' class="form-horizontal">
            @csrf
            <div class="card-body">
                <div class="card-body pad">
                    <div class="form-group ">
                        <label for="titre" class="col-sm-3 col-form-label">Titre de l'actualité</label>
                        <input type="text" wire:model='newArticle.titre' id="titre" name="titre"
                            class="form-control @error('newArticle.titre') is-invalid @enderror" 
                            placeholder="Entrer le titre">
                        @error('newArticle.titre')
                            <div class="invalid-feedback">
                                {{ $errors->first('newArticle.titre') }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="text" class="col-sm-3 col-form-label">Contenue de l'article</label>
                        <div class="mb-3" wire:ignore>
                            <textarea  wire:model='newArticle.contenue' id="description" class="form-control"></textarea>
                        </div>
                        <span class='text-danger'>@error('newArticle.contenue'){{ $message }}@enderror</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="text" class="col-sm-12 col-form-label">Selectionner
                                    l'image du slider</label>
                                <input type='file' wire:model='image' name="image" id="ee{{$inputFileIterator}}"/>
                                
                                @if ($image)
                                    <img  id="image{{$inputFileIterator}}" src="{{ $image->temporaryUrl() }}" alt="votre image"
                                style="width: 150px; height: 100px; margin: 10px 0px 10px 0px;" />
                                @endif
                                <span class='text-danger'>@error('image'){{ $message }}@enderror</span>
                                @if (session()->has('message'))
                                <span class='text-danger'>{{ session('message')}}</span>
                                    
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Enregistrer</button>
                <button type="button" wire:click="goToListArticle()" class="float-right btn btn-danger">Retourner à la liste des
                    articles</button>
            </div>
        </form>
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

