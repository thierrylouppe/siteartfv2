<div class="p-4 pt-5 row">
    <div class='col-md-8'>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-newspaper fa-2x"></i> Edition de l'article </h3>
            </div>
            <form role="form" wire:submit.prevent='updateArticle()' class="form-horizontal">
                @csrf
                <div class="card-body">
                    <div class="card-body pad">
                        <div class="form-group ">
                            <label for="title" class="col-sm-6 col-form-label">Titre de l'actualité</label>
                            <input type="text" id="titre" name="titre"  class="form-control @error('editArticle.titre') is-invalid @enderror"
                                aria-describedby="titre" wire:model='editArticle.titre' , value="title">
                            @error('editArticle.titre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="text" class="col-sm-6 col-form-label">Contenue de l'article</label>
                            <div class="mb-3" wire:ignore>
                                <textarea id="description" name="contenue" class="textarea"
                                    wire:model='editArticle.contenue'></textarea>
                            </div>
                            <span class='text-danger'>@error('editArticle.contenue'){{ $message }}@enderror</span>
                        </div>
                        <div class="col-sm-8">
                        <div class="form-group">
                            <label for="text" class="col-form-label">Selectionner l'état de votre
                                article</label>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="1" id="customCheckbox"
                                    wire:model='editArticle.status'  @if($editArticle['status']) checked @endif>
                                    @error("editArticle.status")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @if ($editArticle['status'] == 1)
                                    <label for="customCheckbox" class="custom-control-label">En ligne</label> 
                                @else
                                    <label for="customCheckbox" class="custom-control-label">En rédaction</label>
                                @endif
                            </div>
                        </div>
            </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                    <button type="button" wire:click="goToListArticle()" class="btn btn-danger">Retourner à la liste des
                        articles</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Modification de l'image --}}
    <div class='col-md-4'>
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title"><i class="far fa-image fa-2x"></i> Changer l'image de l'article</h3>
            </div>
            <div class="pb-1 card-body">
                <div class="row">
                    <form role="form" wire:submit.prevent='addArticle()' class="">
                        @csrf
                        <div class="form-group row-sm-18">
                            <label for="image" class="col-form-label">Selectionner l'image</label>
                            <input type='file' wire:model='imageEdit' name="image" id="image{{$inputFileIterator}}" />
                            <span class='text-danger'>@error('imageEdit'){{ $message }}@enderror</span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="p-1 card-footer">
                <button type="submit" wire:click.prevent="updateImage({{$idArticle}})" class="btn btn-primary">Changer l'image de l'article</button>
            </div>
        </div>

        <div class="form-group" style="width: 300px; height: 200px; margin: 5px 0px 5px 0px;">
            <label class=" col-form-label">Apeçu de l'image</label>
            @if ($imageEdit)
                <img  src="{{ $imageEdit->temporaryUrl() }}" alt="votre image"
                style="width: 150px; height: 100px; margin: 5px 0px 5px 0px;" />
            @else
                <img id="img-slider" src="{{ asset('storage/'.$editArticle['image']) }}" alt="your image"
                style="width: 150px; height: 100px; margin: 5px 0px 5px 0px;" />
            @endif
        </div>
    </div>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="mb-3" wire:ignore>
                <textarea id="description2" name="contenue" class="textarea"
                    wire:model='editArticle.contenue'></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

{{-- <script>


        $(document).ready(function () {
            $('.summernote').summernote();
            $('#description2').summernote({
                height: 300,
            });
        });
</script> --}}
<script>
    $('#description2').summernote({
                height: 300,
            });
            
    $('#description').summernote({
    placeholder: "Contenue de l'article ici",
    tabsize: 2,
    height: 120,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ],
    callbacks: {
            onChange: function(contents, $editable) {
                @this.set('editArticle.contenue', contents);
            }
        }
  });
</script>
