<?php

namespace App\Http\Livewire\Reglementations;

use App\Models\Reglementation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Listes extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = "bootstrap";

    public $idReglementation;
    public $titre, $typereglementation, $status; 
    public $fichier = null;
    public $fichierEdit = null; 
    public $showModifierFichier = 0;
    public $inputFileIterator = 0;
    public $search = "", $filtreType = "", $filtreEtat = ""; 

    public function render()
    {
        Carbon::setLocale("fr");

        $reglementationQuery = Reglementation::query();

        if($this->search != ""){
            $reglementationQuery->where('titre', "LIKE", "%". $this->search ."%")
                             ->orWhere('typereglementation', "LIKE", "%". $this->search ."%");
        }

        if($this->filtreType != ""){
            $reglementationQuery->where('typereglementation', $this->filtreType);
        }

        if($this->filtreEtat != ""){
            $reglementationQuery->where('status', $this->filtreEtat);
        }

        return view('livewire.reglementations.liste', [
            "reglementations" => $reglementationQuery->latest()->paginate(5),
            "typereglementations" => Reglementation::all(),
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function edit($id) 
    {
        $reglementation = Reglementation::where('id', $id)->first();
        $this->idReglementation = $reglementation->id;
        $this->titre = $reglementation->titre;
        $this->typereglementation = $reglementation->typereglementation;
        $this->fichier = $reglementation->pathfichier;
        $this->status = $reglementation->status;
        $this->user_id = $reglementation->user_id; 
    }

    public function update($id)
    {
        $validated = $this->validate([
            'titre' =>  'required',
            'typereglementation' => 'required',
            'fichier' =>  'required',
            'status' =>  'required',
        ]);
        
        $publication = Reglementation::find($id);

        $publication->update($validated);
        
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Réglementation mise à jour avec succès!!!"]);
        
        return redirect()->route("admin.gestionreglementations.reglementations.index");
    }

    public function updateFichier($id)
    {
        $validateArr = [
            'fichierEdit' =>  'required',
        ];

        $this->validate($validateArr);
        $fichierPath = ""; 

        if($this->fichierEdit != null){
            $fichierPath = $this->fichierEdit->store('download/reglementations', 'public');
        }

        $oldFichier = Reglementation::find($id)->pathfichier; 
        
        $oldEmplacementImageExists = Storage::disk()->exists('public/' . $oldFichier);
         
        if ($oldFichier == $this->fichier and $oldEmplacementImageExists ) {
            Storage::disk()->delete('public/' . $oldFichier);
        }

        Reglementation::find($id)->update([
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

    public function confirmePublierReglementation($id){
        $this->dispatchBrowserEvent("showConfirmMessagePublier", ["message"=>[
            "text" => "Vous êtes sur le point de publier cette reglementation. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "reglementation_id" => $id,
            ]
        ]]);
    }

    public function confirmeDepublierReglementation($id){
        $this->dispatchBrowserEvent("showConfirmMessageDepublier", ["message"=>[
            "text" => "Vous êtes sur le point de dépublier cette reglementation. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "reglementation_id" => $id,
            ]
        ]]);
    }

    public function publierReglementation($id){
        //$userId = auth()->user()->id;
        $validationAttributes["newReglementation"]["status"] = "1"; 
        //$validationAttributes["newArticle"]["user_id"] = $userId; 
        Reglementation::find($id)->update($validationAttributes['newReglementation']);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Reglementation publier avec succès!!!"]);
    }

    
    public function depublierReglementation($id){
        $validationAttributes["newReglementation"]["status"] = "0"; 
        Reglementation::find($id)->update($validationAttributes['newReglementation']);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Publication dépublier avec succès!!!"]);
    }

    public function confirmDeleteReglementation($id){
        $this->dispatchBrowserEvent("showConfirmMessageDelete", ["message"=>[
            "text" => "Vous êtes sur le point de supprimer cette publication. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "reglementation_id" => $id,
            ]
        ]]);
    }

    public function deleteReglementation($id){
        $fichierPath = Reglementation::find($id)->pathfichier; 
        
        $oldemplacementimageexists = Storage::disk()->exists('public/' . $fichierPath);
        if($oldemplacementimageexists){
            Storage::disk()->delete('public/' . $fichierPath);
        }

        Reglementation::destroy($id);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Reglementation supprimer avec succès!!!"]);
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


