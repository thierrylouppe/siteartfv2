<div>
    <!-- Modale pour changer l'image de l'article -->
    {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> --}}
    <div wire:ignore.self class="modal fade" id="modal-info" data-target="#modal" data-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">Modification publication chiffres clés</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form role="form" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                <div class="card-body pad">
                    <div class="form-group ">
                        <label for="titre" class="col-form-label">Titre de la publication chiffres clés</label>
                        <input type="text" wire:model='titre' id="titre" name="titre"
                            class="form-control @error('titre') is-invalid @enderror" 
                            placeholder="Titre de la publication">
                        @error('titre')
                            <div class="invalid-feedback">
                                {{ $errors->first('titre') }}
                            </div>
                        @enderror
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="impor" class="col-form-label">Impor bien et service</label>
                                    <input type="text" wire:model='impor' id="impor" name="impor"
                                        class="form-control @error('impor') is-invalid @enderror" 
                                        placeholder="Valeur importation">
                                    @error('impor')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('impor') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="expor" class="col-form-label">Expor bien et service</label>
                                    <input type="text" wire:model='expor' id="expor" name="expor"
                                        class="form-control @error('expor') is-invalid @enderror" 
                                        placeholder="Valeur exportation">
                                    @error('expor')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('expor') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group ">
                                    <label for="mre" class="col-form-label">Recettes MRE</label>
                                    <input type="text" wire:model='mre' id="mre" name="mre"
                                        class="form-control @error('mre') is-invalid @enderror" 
                                        placeholder="Valeur recettes mre">
                                    @error('mre')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('mre') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group ">
                                    <label for="voyage" class="col-form-label">Recettes voyages</label>
                                    <input type="text" wire:model='voyage' id="voyage" name="voyage"
                                        class="form-control @error('voyage') is-invalid @enderror" 
                                        placeholder="Valeur voyage">
                                    @error('voyage')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('voyage') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group ">
                                    <label for="flux" class="col-form-label">Flux des IDE</label>
                                    <input type="text" wire:model='flux' id="flux" name="flux"
                                        class="form-control @error('flux') is-invalid @enderror" 
                                        placeholder="Valeur flux IDE">
                                    @error('flux')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('flux') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" wire:click.prevent="updateChiffrecle({{$idChiffrecle}})">Enregistrer les modifications</button>
                        
                        <a href="{{ route("admin.gestionchiffrecles.chiffrecles.index")}}" class="float-right btn btn-danger">Retourner à la liste des chiffres clés</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
