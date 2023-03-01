<div class="p-4 pt-5 row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-newspaper fa-2x"></i> Listes des articles</h3>

                <div class="card-tools d-flex align-items-center">
                    <a class="mr-4 text-white btn btn-link d-block" wire:click.prevent='goToAddArticle()'><i 
                    class="far fa-file-alt"></i> Nouvel article</a>
                    
                </div>
            </div>
            <!-- /.card-header -->
            {{-- pour recherche --}}
                <div class="p-2 bg-primary" style="height:85px;">
                    <div class="row" >
                        <div class="col-md-12 ">
                            <div class="row" >
                                <div class="col-5" >
                                    <div class="form-group" >
                                        <label for="recherche">Recherche:</label>
                                        <input id="recherche" type="text" wire:model.debounce.200ms="search" name="table_search" class="float-right form-control" placeholder="Recherche">
                                    </div>
                                </div>
                                <div class="col-4" >
                                    {{-- <div class="form-group" >
                                        <label for="filtreType">Filtrer par publication</label>
                                        <select id="filtreType" wire:model="filtreType" class="form-control">
                                            <option value="">Choisir le type de la publication</option>
                                            <option value="avis">Avis</option>
                                            <option value="bulletinsduregulateur">Bulletins du régulateur</option>
                                            <option value="etude">Etudes</option>
                                            <option value="seriestatistique">Séries statistiques</option>
                                        </select>
                                    </div> --}}
                                </div>
                                <div class="col-3" >
                                    <div class="form-group" >
                                        <label for="filtreEtat">Filtrer par état</label>
                                        <select id="filtreEtat" wire:model="filtreEtat" class="form-control">
                                            <option value="">Choisir l'état</option>
                                            <option value="1">En ligne</option>
                                            <option value="0">En redaction</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            <div class="p-0 card-body table-responsive table-striped" style="height: 300px;">
                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                            <th style="width:30%;">Article</th>
                            <th style="width:15%;">Auteur</th>
                            <th style="width:15%;">Status</th>
                            <th style="width:10%;" class="text-center">Ajouté</th>
                            <th style="width:45%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{$article->titre}}</td>
                                <td>{{$article->user->nom}}</td>
                                @if ($article->status == 0)
                                    <td><span class="badge bg-warning">En rédaction</span></td>
                                @else
                                    <td><span class="badge bg-success">En ligne</span></td>
                                @endif
                                <td class="text-center"><span class="tag tag-success">{{$article->created_at->diffForHumans()}}</span></td>
                                <td class="text-center">
                                    <a href="{{ route('admin.gestionarticles.articles.show', $article->slug) }}" title="Aperçu" class="btn btn-link"><i class="fas fa-eye"></i></a>
                                    
                                    @if ($article->status == 0)
                                        @can('editer')
                                            <button class="btn btn-link" title="Editer" wire:click.prevent='goToEditArticle({{$article->id}})'><i class="fas fa-edit"></i></button>
                                        @endcan
                                        @can('publier')
                                            <button class="btn btn-link" title="Publier" wire:click.prevent='confirmePublierArticle({{$article->id}})'><i class="fas fa-arrow-up"></i></button>
                                        @endcan
                                        @can('delete-article')
                                            <button class="btn btn-link" title="Supprimer" wire:click.prevent='confirmDeleteArticle({{$article->id}})'><i class="far fa-trash-alt"></i></button> 
                                        @endcan
                                    @else
                                        @can('depublier')
                                            <button class="btn btn-link" title="Dépublier" wire:click.prevent='confirmeDepublierArticle({{$article->id}})'><i class="fas fa-arrow-down"></i></button>
                                        @endcan
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    {{ $articles->links() }}
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
</div>
