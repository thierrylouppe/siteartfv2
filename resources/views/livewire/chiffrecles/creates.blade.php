<div class="p-4 col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-newspaper fa-2x"></i> Création des chiffres clés</h3>
        </div>

        <form role="form" wire:submit.prevent='addChiffrecle()' class="form-horizontal">
            @csrf
            <div class="card-body">
                <div class="card-body pad">
                    <div class="form-group ">
                        <label for="titre" class="col-form-label">Titre de la publication chiffres clés</label>
                        <input type="text" wire:model='newChiffre.titre' id="titre" name="titre"
                            class="form-control @error('newChiffre.titre') is-invalid @enderror" 
                            placeholder="Titre de la publication">
                        @error('newChiffre.titre')
                            <div class="invalid-feedback">
                                {{ $errors->first('newChiffre.titre') }}
                            </div>
                        @enderror
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="impor" class="col-form-label">Impor bien et service</label>
                                    <input type="text" wire:model='newChiffre.impor' id="impor" name="impor"
                                        class="form-control @error('newChiffre.impor') is-invalid @enderror" 
                                        placeholder="Valeur importation">
                                    @error('newChiffre.impor')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('newChiffre.impor') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="expor" class="col-form-label">Expor bien et service</label>
                                    <input type="text" wire:model='newChiffre.expor' id="expor" name="expor"
                                        class="form-control @error('newChiffre.expor') is-invalid @enderror" 
                                        placeholder="Valeur exportation">
                                    @error('newChiffre.expor')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('newChiffre.expor') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group ">
                                    <label for="mre" class="col-form-label">Recettes MRE</label>
                                    <input type="text" wire:model='newChiffre.mre' id="mre" name="mre"
                                        class="form-control @error('newChiffre.mre') is-invalid @enderror" 
                                        placeholder="Valeur recettes mre">
                                    @error('newChiffre.mre')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('newChiffre.mre') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group ">
                                    <label for="voyage" class="col-form-label">Recettes voyages</label>
                                    <input type="text" wire:model='newChiffre.voyage' id="voyage" name="voyage"
                                        class="form-control @error('newChiffre.voyage') is-invalid @enderror" 
                                        placeholder="Valeur voyage">
                                    @error('newChiffre.voyage')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('newChiffre.voyage') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group ">
                                    <label for="flux" class="col-form-label">Flux des IDE</label>
                                    <input type="text" wire:model='newChiffre.flux' id="flux" name="flux"
                                        class="form-control @error('newChiffre.flux') is-invalid @enderror" 
                                        placeholder="Valeur flux IDE">
                                    @error('newChiffre.flux')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('newChiffre.flux') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Enregistrer</button>
                <a href="{{ route("admin.gestionchiffrecles.chiffrecles.index")}}" class="float-right btn btn-danger">Retourner à la liste des chiffres clés</a>
            </div>
        </form>
    </div>
</div>



