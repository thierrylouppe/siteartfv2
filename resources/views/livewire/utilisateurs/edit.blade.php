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
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-fingerprint fa-2x"></i> Rôles & permissions</h3>
                    </div>

                    <div class="card-body">
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