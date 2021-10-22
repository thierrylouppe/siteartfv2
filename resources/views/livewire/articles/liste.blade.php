<div class="p-4 pt-5 row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i>Listes des articles</h3>

                <div class="card-tools d-flex align-items-center">
                    <a class="mr-4 text-white btn btn-link d-block" wire:click.prevent='goToAddUser()'><i
                            class="fas fa-user-plus"></i>Nouvel article</a>
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
                            <tr>
                                <td>Titre article</td>
                                <td>Auteur article</td>
                                <td>Statu article</td>
                                <td class="text-center"><span class="tag tag-success">22/10/2021</span></td>
                                <td class="text-center">
                                    <button class="btn btn-link"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-link"><i class="fa fa-trash-alt"></i></button>
                                    <button class="btn btn-link"><i class="fa fa-trash-alt"></i></button>
                                    <button class="btn btn-link"><i class="fa fa-trash-alt"></i></button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            {{-- <div class="card-footer">
                <div class="float-right">
                    {{ $users->links() }}
                </div>
            </div> --}}
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
</div>
