<div>
    <!-- Modale pour changer l'image de l'article -->
    <div wire:ignore.self class="modal fade" id="modal-info">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">Modification publication</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form role="form" class="form-horizontal">
                    @csrf
                    {{-- <input type="hidden" name="id" wire:model="ids" /> --}}
                    <div class="card-body">
                        <div class="card-body pad">
                            <div class="form-group ">
                                <label for="titre" class="col-md-6 col-form-label">Titre de la publication</label>
                                <input type="text" wire:model='titre' id="titre" name="titre"
                                    class="form-control @error('titre') is-invalid @enderror" 
                                    placeholder="Entrer le titre">
                                @error('titre')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('titre') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Type de publication</label>
                                        <select class="form-control" wire:model='typepublication'>
                                            <option>Choisir le type de la publication</option>
                                            <option value="avis">Avis</option>
                                            <option value="bulletinsduregulateur">Bulletins du régulateur</option>
                                            <option value="etude">Etudes</option>
                                            <option value="seriestatistique">Séries statistiques</option>
                                        </select>
                                        <span class='text-danger'>@error('typepublication'){{ $message }}@enderror</span>
                                    </div>
                                </div>

                                @if ($showModifierFichier)
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label for="text" class="col-sm-12 col-form-label">Selectionner le fichier</label>
                                            <input type='file' wire:model='fichierEdit'  name="fichier" id="fichier{{$inputFileIterator}}" />
                                            <div>
                                                <span class='text-danger'>@error('fichierEdit'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary" wire:click.prevent="updateFichier({{$idPublication}})">Modifier le fichier</button>
                                        </div>
                                    </div>
                                @else
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label for="text" class="col-sm-12 "></label>
                                            <button class="mt-2 btn btn-primary" wire:click.prevent="showEditFichier()">Modifier le fichier</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" wire:click.prevent="update({{$idPublication}})">Mise à jour</button>
                        
                        <a href="{{ route("admin.gestionpublications.publications.index")}}" id="cancel" name="cancel" class="float-right btn btn-danger">Retourner à la liste des publications</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
