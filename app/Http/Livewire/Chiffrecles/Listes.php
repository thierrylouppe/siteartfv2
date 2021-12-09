<?php

namespace App\Http\Livewire\Chiffrecles;

use App\Models\Chiffrecle;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Listes extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search = "";
    public $idChiffrecle;
    public $titre, $impor, $expor, $voyage, $flux, $mre;

    public function render()
    {
        Carbon::setLocale("fr");

        $chiffrecleQuery = Chiffrecle::query();

        if($this->search != ""){
            $chiffrecleQuery->where('titre', "LIKE", "%". $this->search ."%");
        }
        return view('livewire.chiffrecles.listes', [
            "chiffrecles" => $chiffrecleQuery->latest()->paginate(5)
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }


    public function goToEditChiffrecle($id){
        $chiffrecle = Chiffrecle::where('id', $id)->first();
        $this->idChiffrecle = $chiffrecle->id;
        $this->titre = $chiffrecle->titre;
        $this->impor = $chiffrecle->impor;
        $this->expor = $chiffrecle->expor;
        $this->voyage = $chiffrecle->voyages;
        $this->flux = $chiffrecle->flux;
        $this->mre = $chiffrecle->mre;
    }

    public function updateChiffrecle($id)
    {
        $validated = $this->validate([
            'titre' =>  'required',
            'impor' => 'required',
            'expor' =>  'required',
            'voyage' =>  'required',
            'flux' =>  'required',
            'mre' =>  'required',
        ]);

        
        $publication = Chiffrecle::find($id);
        
        $validated["voyages"] = $validated["voyage"];
        $validated["percentImpor"] = remove_operateur($validated["impor"]);
        $validated["percentExpor"] = remove_operateur($validated["expor"]);
        $validated["percentVoyage"] = remove_operateur($validated["voyage"]);
        $validated["percentFlux"] = remove_operateur($validated["flux"]);
        $validated["percentMre"] = remove_operateur($validated["mre"]);

        $publication->update($validated);
        
        // $userId = auth()->user()->id;
        // $fichierPath = "";
        
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Publication chiffres clés mise à jour avec succès!!!"]);
         return redirect()->route("admin.gestionchiffrecles.chiffrecles.index");     
    }

    public function confirmDeleteChiffrecle($id){
        $this->dispatchBrowserEvent("showConfirmMessageDelete", ["message"=>[
            "text" => "Vous êtes sur le point de supprimer cette publication des chiffres clés. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "chiffrecle_id" => $id,
            ]
        ]]);
    }

    public function deleteChiffrecle($id){
        
        Chiffrecle::destroy($id);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Chiffres clés supprimer avec succès!!!"]);
    }
}
