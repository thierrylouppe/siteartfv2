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
                        <label for="title" class="col-sm-3 col-form-label">Titre de l'actualité</label>
                        <input type="text" wire:model='newArticle.titre' id="title" name="title"
                            class="form-control @error('title') is-invalid @enderror" 
                            placeholder="Entrer le titre">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="text" class="col-sm-3 col-form-label">Contenue de l'article</label>
                        <div class="mb-3">
                            <textarea name="content" wire:model='newArticle.contenue' id="summernote" placeholder="Entrer le contenue" class="textarea @error('content') is-invalid @enderror"
                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="text" class="col-sm-8 col-form-label">Selectionner
                                    l'image du slider</label>
                                <input type='file' name="imgslider" onchange="readURL(this);" />
                                @error('imgslider')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('imgslider') }}
                                    </div>
                                @enderror
                            </div>
                            <img id="img-slider" src="http://via.placeholder.com/5000x1000" alt="your image"
                                style="width: 150px; height: 100px;" />
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


