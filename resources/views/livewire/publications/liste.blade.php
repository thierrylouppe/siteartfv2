<div>
    @include('livewire/publications/edite')
    <div class="p-4 pt-5 row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-newspaper fa-2x"></i> Listes des publications</h3>
                    <div class="card-tools d-flex align-items-center">
                        <a class="mr-4 text-white btn btn-link d-block" href="{{ route("admin.gestionpublications.publications.create")}}" ><i 
                        class="far fa-file-alt"></i> Nouvel publication</a>
                        
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
                                    <div class="form-group" >
                                        <label for="filtreType">Filtrer par publication</label>
                                        <select id="filtreType" wire:model="filtreType" class="form-control">
                                            <option value="">Choisir le type de la publication</option>
                                            <option value="avis">Avis</option>
                                            <option value="bulletinsduregulateur">Bulletins du régulateur</option>
                                            <option value="etude">Etudes</option>
                                            <option value="seriestatistique">Séries statistiques</option>
                                        </select>
                                    </div>
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
                <div class="p-0 card-body table-responsive table-striped">
                    <div style="height:300px;">
                        <table class="table table-head-fixed">
                            <thead>
                                <tr>
                                    <th style="width:30%;">Titre publication</th>
                                    <th style="width:15%;">Auteur</th>
                                    <th class="text-center" style="width:15%;">Status</th>
                                    <th class="text-center" style="width:20%;" class="text-center">Type publication</th>
                                    <th class="text-center" style="width:30%;" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($publications as $publication)
                                    <tr>
                                        <td>{{$publication->titre}}</td>
                                        <td>{{$publication->user->nom}}</td>
                                        @if ($publication->status == 0)
                                            <td class="text-center"><span class="badge bg-warning">En rédaction</span></td>
                                        @else
                                            <td class="text-center"><span class="badge bg-success">En ligne</span></td>
                                        @endif

                                        @if($publication->typepublication == "avis")
                                        <td class="text-center"><span class="badge bg-info">AVIS</span></td>
                                        @elseif ($publication->typepublication == "bulletinsduregulateur")
                                        <td class="text-center"><span class="badge bg-info">BULLETINS DU REGULATEUR</span></td>
                                        @elseif ($publication->typepublication == "etude")
                                        <td class="text-center"><span class="badge bg-info">ETUDES</span></td>
                                        @elseif ($publication->typepublication == "seriestatistique")
                                        <td class="text-center"><span class="badge bg-info">SERIES STATISTIQUE</span></td>
                                        @endif
                                        <td class="text-center">
                                            @if ($publication->status == 0)
                                            @can('editer')
                                                <button class="btn btn-link" title="Editer" data-toggle="modal" data-target="#modal-info" wire:click.prevent="edit({{$publication->id}})"><i class="fas fa-edit"></i></button>
                                            @endcan
                                            @can('editer') 
                                                <button class="btn btn-link" title="Publier" wire:click.prevent='confirmePublierPublication({{$publication->id}})'><i class="fas fa-arrow-up"></i></button>
                                            @endcan
                                            @can('delete-article')
                                                <button class="btn btn-link" title="Supprimer" wire:click.prevent='confirmDeletePublication({{$publication->id}})'><i class="far fa-trash-alt"></i></button>
                                            @endcan
                                            @else
                                                @can('depublier')
                                                    <button class="btn btn-link" title="Dépublier" wire:click.prevent='confirmeDepublierPublication({{$publication->id}})'><i class="fas fa-arrow-down"></i></button>
                                                @endcan
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-danger">
                                                <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                                Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="height:60px;">
                    <div class="float-right">
                        {{ $publications->links() }}
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<script>
    window.addEventListener("showConfirmMessagePublier", event=>{
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
                @this.publierPublication(event.detail.message.data.publication_id)
            }
          }
      })
    })
</script>

<script>
    window.addEventListener("showConfirmMessageDepublier", event=>{
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
                @this.depublierPublication(event.detail.message.data.publication_id)
            }
          }
      })
    })
</script>

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
              @this.deletePublication(event.detail.message.data.publication_id)
            }
          }
      })
    })
</script>
