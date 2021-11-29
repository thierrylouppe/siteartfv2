<?php

namespace App\Http\Livewire\Publications;

use App\Models\Publication;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class Listes extends Component
{
    use WithFileUploads;
    public $idPublication; 
    public $titre, $typepublication, $status; 
    public $fichier = null;
    public $fichierEdit = null;
    public $showModifierFichier = 0;
    public $inputFileIterator = 0;
    public $search = "", $filtreType = "", $filtreEtat = "";


    protected $paginationTheme = "bootstrap";
    public function render()
    {
        Carbon::setLocale("fr");

        $publicationQuery = Publication::query();

        if($this->search != ""){
            $publicationQuery->where('titre', "LIKE", "%". $this->search ."%")
                             ->orWhere('typepublication', "LIKE", "%". $this->search ."%");
        }

        if($this->filtreType != ""){
            $publicationQuery->where('typepublication', $this->filtreType);
        }

        if($this->filtreEtat != ""){
            $publicationQuery->where('status', $this->filtreEtat);
        }

        return view('livewire.publications.liste', [
            "publications" => $publicationQuery->latest()->paginate(5),
            "typepublications" => Publication::all(),
            
        ])
        ->extends("layouts.master")
        ->section("contenu"); 
    }

    public function edit($id) 
    {
        $publication = Publication::where('id', $id)->first();
        $this->idPublication = $publication->id;
        $this->titre = $publication->titre;
        $this->typepublication = $publication->typepublication;
        $this->fichier = $publication->pathfichier;
        $this->status = $publication->status;
        $this->user_id = $publication->user_id;

        
    }

    public function update($id)
    {
        $validated = $this->validate([
            'titre' =>  'required',
            'typepublication' => 'required',
            'fichier' =>  'required',
            'status' =>  'required',
        ]);
        
        $publication = Publication::find($id);

        $publication->update($validated);
        
        // $userId = auth()->user()->id;
        // $fichierPath = "";
        
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Publication mise à jour avec succès!!!"]);
        
        return redirect()->route("admin.gestionpublications.publications.index");
    }
    public function updateFichier($id)
    {
        $validateArr = [
            'fichierEdit' =>  'required',
        ];

        $this->validate($validateArr);
        $fichierPath = ""; 

        if($this->fichierEdit != null){
            $fichierPath = $this->fichierEdit->store('download/publications', 'public');
        }

        $oldFichier = Publication::find($id)->pathfichier; 
        
        $oldEmplacementImageExists = Storage::disk()->exists('public/' . $oldFichier);
         
        if ($oldFichier == $this->fichier and $oldEmplacementImageExists ) {
            Storage::disk()->delete('public/' . $oldFichier);
        }

        Publication::find($id)->update([
            "pathfichier" => $fichierPath
        ]);

        $this->inputFileIterator++;
        $this->fichierEdit = null;
        $this->closeEditFichier();

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Fichier mise à jour avec succès!!!"]);
    }

    public function showEditFichier(){
        $this->showModifierFichier = 1;
    }

    public function closeEditFichier(){
        $this->showModifierFichier = 0;
    }

    public function confirmePublierPublication($id){
        $this->dispatchBrowserEvent("showConfirmMessagePublier", ["message"=>[
            "text" => "Vous êtes sur le point de publier cette publication. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "publication_id" => $id,
            ]
        ]]);
    }

    public function confirmeDepublierPublication($id){
        $this->dispatchBrowserEvent("showConfirmMessageDepublier", ["message"=>[
            "text" => "Vous êtes sur le point de dépublier cette publication. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "publication_id" => $id,
            ]
        ]]);
    }

    public function publierPublication($id){
        //$userId = auth()->user()->id;
        $validationAttributes["newPublication"]["status"] = "1"; 
        //$validationAttributes["newArticle"]["user_id"] = $userId; 
        Publication::find($id)->update($validationAttributes['newPublication']);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Publication publier avec succès!!!"]);
    }

    
    public function depublierPublication($id){
        $validationAttributes["newPublication"]["status"] = "0"; 
        Publication::find($id)->update($validationAttributes['newPublication']);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Publication dépublier avec succès!!!"]);
    }

    public function confirmDeletePublication($id){
        $this->dispatchBrowserEvent("showConfirmMessageDelete", ["message"=>[
            "text" => "Vous êtes sur le point de supprimer cette publication. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "publication_id" => $id,
            ]
        ]]);
    }

    public function deletePublication($id){
        $fichierPath = Publication::find($id)->pathfichier; 
        
        $oldemplacementimageexists = Storage::disk()->exists('public/' . $fichierPath);
        if($oldemplacementimageexists){
            Storage::disk()->delete('public/' . $fichierPath);
        }

        Publication::destroy($id);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Publication supprimer avec succès!!!"]);
    }

    protected function cleanupOldUploads()
    {
        $storage = Storage::disk("local");

        foreach($storage->allFiles("livewire-tmp") as $pathFileName){

            if(! $storage->exists($pathFileName)) continue;

            $fiveSecondsDelete = now()->subSeconds(5)->timestamp;

            if($fiveSecondsDelete > $storage->lastModified($pathFileName)){
                $storage->delete($pathFileName);
            }
        }
    }
}
