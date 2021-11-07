<div class="p-4 col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-newspaper fa-2x"></i> Edition de l'article </h3>
        </div>

        <form role="form" wire:submit.prevent='updateArticle()' class="form-horizontal">
            @csrf
            <div class="card-body">
                <div class="card-body pad">
                    <div class="form-group ">
                        <label for="title" class="col-sm-3 col-form-label">Titre de l'actualité</label>
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
                        <label for="text" class="col-sm-3 col-form-label">Contenue de l'article</label>
                        <div class="mb-3">
                            <textarea name="contenue" class="textarea @error('editArticle.titre') is-invalid @enderror"
                                style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                wire:model='editArticle.contenue'></textarea>
                            @error('contenue')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="text" class="col-sm-8 col-form-label">Apeçu image article</label>
                                <div class="row-sm-5">
                                    <img id="img-slider" src="http://via.placeholder.com/5000x1000" alt="your image"
                                style="width: 150px; height: 100px;" />
                                <button type="button" wire:click="goToModifImage()" class="btn btn-danger">Modifier l'image de l'article</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="text" class="col-sm-8 col-form-label">Selectionner l'état de votre
                                    article</label>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" value="1" id="customCheckbox"
                                       wire:model='editArticle.status'  @if($editArticle['status']) checked @endif>
                                    @if ($editArticle['status'] == 1)
                                       <label for="customCheckbox" class="custom-control-label">En ligne</label> 
                                    @else
                                        <label for="customCheckbox" class="custom-control-label">En rédaction</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                <button type="button" wire:click="goToListArticle()" class="btn btn-danger">Retourner à la liste des
                    articles</button>
            </div>
        </form>
    </div>

</div>
