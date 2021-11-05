<div wire:ignore.self>
      @if ($currentPage == PAGELISTEARTICLE)
        @include("livewire.articles.liste")
      @endif

      @if ($currentPage == PAGEEDITARTICLE)
        @include("livewire.articles.edit")
      @endif

      @if ($currentPage == PAGECREATEARTICLE)
        @include("livewire.articles.create")
      @endif
      
</div>

<script>
  document.getElementById("summernote").summernote()
</script>

<script>
    window.addEventListener("showSuccessMessage", event=>{
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        toast:true,
        title: event.detail.message || 'Opération effectuée avec succès !',
        showConfirmButton: false,
        timer: 5000
      })
    })
</script>

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
            if(event.detail.message.data){
              //Appel une fonction livewire
              @this.deleteUser(event.detail.message.data.user_id)
            }else{
              @this.resetPassword()
            }
          }
      })
    })
</script>

{{-- Script aperçu image avant enregistrement --}}
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img-slider')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
