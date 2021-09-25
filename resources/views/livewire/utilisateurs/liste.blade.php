<div class="p-4 pt-5 row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i>Listes des utilisateurs</h3>

                <div class="card-tools d-flex align-items-center">
                <a class="mr-4 text-white btn btn-link d-block" wire:click.prevent='goToAddUser()'><i class="fas fa-user-plus"></i>Nouvel utilisateur</a>
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
                      <th style="width:5%;"></th>
                      <th style="width:25%;">Utilisateurs</th>
                      <th style="width:20%;">Roles</th>
                      <th style="width:20%;" class="text-center">Ajouté</th>
                      <th style="width:30%;" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>
                        @if ($user->sexe == 0)
                            <img src="{{asset('images/woman.png')}}" width="24"/>
                        @else
                            <img src="{{asset('images/man.png')}}" width="24"/>     
                        @endif
                      </td>
                      <td>{{$user->prenom}} {{$user->nom}}</td>
                      <td>{{$user->AllRoleNames}}</td>
                      <td class="text-center"><span class="tag tag-success">{{$user->created_at->diffForHumans()}}</span></td>
                      <td class="text-center">
                        <button class="btn btn-link" wire:click='goToEditUser({{$user->id}})'><i class="far fa-edit"></i></button>
                        <button class="btn btn-link" wire:click="confirmDelete('{{$user->prenom}} {{$user->nom}}', {{$user->id}})"><i class="fa fa-trash-alt"></i></button>
                      </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                    {{$users->links()}}
                </div>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>  

<script>
    window.addEventListener("showConfirmMessage", event=>{
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
            //Appel une fonction livewire
            @this.deleteUser(event.detail.message.data.user_id)
          }
      })
    })

    window.addEventListener("showSuccessMessage", event=>{
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        toast:true,
        title: event.detail.message || 'Opération effectuée avec succès !',
        showConfirmButton: false,
        timer: 3000
      })
    })
</script>
