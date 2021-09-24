<div class="p-4 pt-5 row">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel utilisateur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addUser()">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label >Nom</label>
                        <input type="text" wire:model='newUser.nom' class="form-control @error("newUser.nom") is-invalid @enderror">

                        @error("newUser.nom")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label >Prenom</label>
                        <input type="text" wire:model='newUser.prenom' class="form-control @error("newUser.prenom") is-invalid @enderror">

                        @error("newUser.nom")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label >Sexe</label>
                    <select class="form-control @error('newUser.sexe') is-invalid @enderror" wire:model='newUser.sexe'>  
                      <option value="">--------------</option>
                      <option value="1">Homme</option>
                      <option value="0">Femme</option>
                    </select>
                    @error("newUser.sexe")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="email" wire:model='newUser.email' class="form-control @error("newUser.email") is-invalid @enderror">

                        @error("newUser.email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label >Mot de passe</label>
                    <input type="text" class="form-control" disabled placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retourner à la liste des utilisateurs</button>
                </div>
              </form>
            </div>
      </div>

<script>
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