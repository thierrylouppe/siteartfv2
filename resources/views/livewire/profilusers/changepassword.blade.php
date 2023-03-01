<div>
    <div class="mx-auto">
        <p class="login-box-msg">Vous n'êtes qu'à un pas de votre nouveau mot de passe, récupérez votre mot de
            passe maintenant.</p>
        <form wire:submit.prevent='confirmChangePassword'>
            @csrf
            <div class="mb-3 input-group">
                <input type="email" placeholder="Email" class="form-control" wire:model='email' required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="mb-3 input-group">
                <input type="password" class="form-control" placeholder="Votre nouveau mot de passe"
                    class="form-control" wire:model='password' required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            {{-- <div class="mb-3 input-group">
                <input type="password" class="form-control" placeholder="Confirmer votre mot de passe"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">Changer le mot de passe</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
</div>

<script>
    window.addEventListener("showConfirmChangePassword", event=>{
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
            @this.changePassword()
          }
      })
    })
</script>