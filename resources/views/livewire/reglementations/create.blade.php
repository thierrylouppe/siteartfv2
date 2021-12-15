<div>
    <div class="p-4 pt-5 row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-sticky-note fa-2x"></i> Création de la reglementation</h3>
                </div>

                <form role="form" wire:submit.prevent='addReglementation()' class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <div class="card-body pad">
                            <div class="form-group ">
                                <label for="titre" class="col-sm-3 col-form-label">Titre de la reglementation</label>
                                <input type="text" wire:model='newReglementation.titre' id="titre" name="titre"
                                    class="form-control @error('newReglementation.titre') is-invalid @enderror" 
                                    placeholder="Entrer le titre">
                                @error('newReglementation.titre')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('newReglementation.titre') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Type de reglementation</label>
                                        <select class="form-control" wire:model='newReglementation.typereglementation'>
                                            <option>Choisir le type de la reglementation</option>
                                            <option value="lois">Lois</option>
                                            <option value="decret">Décret</option>
                                            <option value="arrete">Arrêté</option>
                                            <option value="circulaire">Circulaire</option>
                                            <option value="instruction">Instruction</option>
                                        </select>
                                        <span class='text-danger'>@error('newReglementation.typereglementation'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for="text" class="col-sm-12 col-form-label">Selectionner le fichier</label>
                                        <input type='file' wire:model='fichier'  name="fichier" id="fichier{{$inputFileIterator}}" />
                                        <span class='text-danger'>@error('fichier'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route("admin.gestionreglementations.reglementations.index")}}" id="cancel" name="cancel" class="float-right btn btn-danger">Retourner à la liste des publications</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
