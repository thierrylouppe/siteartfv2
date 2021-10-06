<div class="p-4 pt-5 row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition utilisateur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="updateUser()">
                <div class="card-body">
                    <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label >Nom</label>
                        <input type="text" wire:model='editUser.nom' class="form-control @error("editUser.nom") is-invalid @enderror">

                        @error("editUser.nom")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                        <label >Prenom</label>
                        <input type="text" wire:model='editUser.prenom' class="form-control @error("editUser.prenom") is-invalid @enderror">

                        @error("editUser.nom")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label >Sexe</label>
                    <select class="form-control @error('editUser.sexe') is-invalid @enderror" wire:model='editUser.sexe'>  
                        <option value="">--------------</option>
                        <option value="1">Homme</option>
                        <option value="0">Femme</option>
                    </select>
                    @error("editUser.sexe")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                    <label >Email</label>
                    <input type="email" wire:model='editUser.email' class="form-control @error("editUser.email") is-invalid @enderror">

                        @error("editUser.email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                    <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retourner à la liste des utilisateurs</button>
                </div>
            </form>
        </div>
    </div>


    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-key fa-2x"></i> Réinitialisation de mot de passe</h3>
                    </div>

                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="#" class="btn btn-link" wire:click.prevent='confirmPwdReset'>Réinitialisé le mot de passe</a>
                                <span>(par défaut: "password")</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-4 col-md-12">
                <div class="card card-primary"> 
                    <div class="card-header d-flex align-items-center">
                        <h3 class="card-title flex-grow-1"><i class="fas fa-fingerprint fa-2x"></i> Rôles & permissions</h3>
                        <button class="btn bg-gradient-success" wire:click="updateRoleAndPermissions"><i class="fas fa-check"></i>Valider les modifications</button>
                    </div>

                    <div class="card-body">
                        <div id="accordion">
                            @foreach ($rolePermissions["roles"] as $role)
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4 class="card-title flex-grow-1">
                                            <a data-parent="#accordion" href="#" aria-expanded="true">
                                                {{$role["role_nom"]}}
                                            </a>
                                        </h4>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" wire:model.lazy="rolePermissions.roles.{{$loop->index}}.active"
                                            @if ($role["active"])
                                                checked
                                            @endif
                                             id="customSwitch{{$role['role_id']}}">
                                            <label class="custom-control-label" for="customSwitch{{$role['role_id']}}">{{$role["active"]? "Activé" : "Desactivé"}}</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- @json($rolePermissions["roles"]) --}}
                        </div>
                    </div>

                    <div class="p-3">
                        {{-- @json($rolePermissions["permissions"]) --}}
                        <table class="table table-bordered">
                            <thead>
                                <th>Permissions</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($rolePermissions["permissions"] as $permission)
                                <tr>
                                    <td>{{ $permission["permission_nom"] }}</td>
                                    <td>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input" wire:model.lazy="rolePermissions.permissions.{{$loop->index}}.active"
                                            @if ($permission["active"])
                                                checked
                                            @endif
                                             id="customSwitchPermission{{$permission['permission_id']}}">
                                            <label class="custom-control-label" for="customSwitchPermission{{$permission['permission_id']}}">{{$permission["active"]? "Activé" : "Desactivé"}}</label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- hold process actuellement centralisé sur la page index --}}
{{-- <script>
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
            @this.resetPassword()
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
</script> --}}