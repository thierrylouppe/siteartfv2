<div class="p-4 pt-5 row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-newspaper fa-2x"></i> Listes des articles</h3>

                <div class="card-tools d-flex align-items-center">
                    <a class="mr-4 text-white btn btn-link d-block" wire:click.prevent='goToAddArticle()'><i 
                    class="far fa-file-alt"></i> Nouvel article</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" class="float-right form-control" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
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
                                    <button class="btn btn-link" title="Aperçu"><i class="fas fa-eye"></i></button>
                                    
                                    @if ($article->status == 0)
                                        <button class="btn btn-link" title="Editer" wire:click.prevent='goToEditArticle({{$article->id}})'><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-link" title="Publier" wire:click.prevent='confirmePublierArticle({{$article->id}})'><i class="fas fa-arrow-up"></i></button>
                                        <button class="btn btn-link" title="Supprimer" wire:click.prevent='confirmDeleteArticle({{$article->id}})'><i class="far fa-trash-alt"></i></button>
                                    @else
                                        <button class="btn btn-link" title="Dépublier" wire:click.prevent='confirmeDepublierArticle({{$article->id}})'><i class="fas fa-arrow-down"></i></button>
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
