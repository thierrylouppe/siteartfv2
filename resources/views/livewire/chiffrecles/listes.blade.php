<div>
    @include('livewire/chiffrecles/edite')
    <div class="p-4 pt-5 row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-newspaper fa-2x"></i> Listes des chiffres clés</h3>

                    <div class="card-tools d-flex align-items-center">
                        <a href="{{ route("admin.gestionchiffrecles.chiffrecles.create")}}" class="mr-4 text-white btn btn-link d-block"><i 
                        class="far fa-file-alt"></i> Nouveau chiffres clés</a>
                        
                    </div>
                </div>
                <!-- /.card-header -->
                {{-- pour recherche --}}
                    <div class="p-2 bg-primary" style="height:85px;">
                        <div class="row" >
                            <div class="col-md-12 ">
                                    <div class="float-right col-5" >
                                        <div class="form-group" >
                                            <label for="recherche">Recherche:</label>
                                            <input id="recherche" type="text" wire:model.debounce.200ms="search" name="table_search" class="float-right form-control" placeholder="Recherche">
                                        </div>
                                    </div>
                            </div>
                        </div>          
                    </div>
                <div class="p-0 card-body table-responsive table-striped" style="height: 300px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th style="width:40%;">Titre chiffres clés</th>
                                <th style="width:15%;">Auteur</th>
                                <th style="width:15%;" class="text-center">Ajouté</th>
                                <th style="width:45%;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chiffrecles as $chiffrecle)
                                <tr>
                                    <td>{{$chiffrecle->titre}}</td>
                                    <td>{{$chiffrecle->user->nom}}</td>
                                    <td class="text-center"><span class="tag tag-success">{{$chiffrecle->created_at->diffForHumans()}}</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-link" title="Editer" data-toggle="modal" data-target="#modal-info" wire:click.prevent="goToEditChiffrecle({{$chiffrecle->id}})"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-link" title="Supprimer" wire:click.prevent='confirmDeleteChiffrecle({{$chiffrecle->id}})'><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        {{ $chiffrecles->links() }}
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>


<script>
    window.addEventListener("showConfirmMessageDelete", event=>{
      Swal.fire({
          title: event.detail.message.title,
          text: event.detail.message.text,
          icon: event.detail.message.type,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Continuer',
          cancelButtonText: 'Annuler',
        }).then((result) => {
          if (result.isConfirmed) {
            if(event.detail.message.data){
              //Appel une fonction livewire
              @this.deleteChiffrecle(event.detail.message.data.chiffrecle_id)
            }
          }
      })
    })
</script>
