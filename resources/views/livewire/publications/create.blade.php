<div>
    <div class="p-4 pt-5 row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-sticky-note fa-2x"></i> Création de la publication</h3>
                </div>

                <form role="form" wire:submit.prevent='addPublication()' class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <div class="card-body pad">
                            <div class="form-group ">
                                <label for="titre" class="col-sm-3 col-form-label">Titre de la publication</label>
                                <input type="text" wire:model='newPublication.titre' id="titre" name="titre"
                                    class="form-control @error('newPublication.titre') is-invalid @enderror" 
                                    placeholder="Entrer le titre">
                                @error('newPublication.titre')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('newPublication.titre') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Type de publication</label>
                                        <select class="form-control" wire:model='newPublication.typepublication'>
                                            <option>Choisir le type de la publication</option>
                                            <option value="avis">Avis</option>
                                            <option value="bulletinsduregulateur">Bulletins du régulateur</option>
                                            <option value="etude">Etudes</option>
                                            <option value="seriestatistique">Séries statistiques</option>
                                        </select>
                                        <span class='text-danger'>@error('newPublication.typepublication'){{ $message }}@enderror</span>
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
                        <a href="{{ route("admin.gestionpublications.publications.index")}}" id="cancel" name="cancel" class="float-right btn btn-danger">Retourner à la liste des publications</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
