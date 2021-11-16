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
                            <input type="text" id="titre" name="titre"  class="form-control @error('editArticle.titre') is-invalid @enderror"
                                aria-describedby="titre" wire:model='editArticle.titre' , value="title">
                            @error('editArticle.titre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="text" class="col-sm-6 col-form-label">Contenue de l'article</label>
                            <div class="mb-3">
                                <textarea name="contenue" class="textarea @error('editArticle.contenue') is-invalid @enderror"
                                    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                    wire:model='editArticle.contenue'></textarea>
                                @error('editArticle.contenue')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <label for="text" class="col-form-label">Selectionner l'état de votre
                                article</label>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="1" id="customCheckbox"
                                    wire:model='editArticle.status'  @if($editArticle['status']) checked @endif>
                                    @error("editArticle.status")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                    <button type="button" wire:click="goToListArticle()" class="btn btn-danger">Retourner à la liste des
                        articles</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Modification de l'image --}}
    <div class='col-md-4'>
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-newspaper fa-2x"></i> Changer l'image de l'article</h3>
            </div>
            <div class="pb-1 card-body">
                <div class="row">
                    <form role="form" wire:submit.prevent='addArticle()' class="">
                        @csrf
                        <div class="form-group row-sm-18">
                            <label for="text" class="col-form-label">Selectionner l'image</label>
                            <input type='file' wire:model='image' name="image" />
                            <span class='text-danger'>@error('image'){{ $message }}@enderror</span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="p-1 card-footer">
                <button type="submit" class="btn btn-primary">Changer l'image de l'article</button>
            </div>
        </div>

        <div class="form-group">
            <label for="text" class=" col-form-label">Apeçu de l'image</label>
            @if ($image)
                <img  id="image{{$inputFileIterator}}" src="{{ $image->temporaryUrl() }}" alt="votre image"
                style="width: 150px; height: 100px; margin: 5px 0px 5px 0px;" />
            @else
                <img id="img-slider" src="{{ asset('storage/'.$editArticle['image']) }}" alt="your image"
                style="width: 150px; height: 100px; margin: 5px 0px 5px 0px;" />
            @endif
        </div>
    </div>
</div>
