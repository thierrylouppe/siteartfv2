<?php

namespace App\Http\Livewire\Chiffrecles;

use App\Models\Chiffrecle;
use Carbon\Carbon;
use Livewire\Component;

class Creates extends Component
{
    public $newChiffre = [];
    public $titre, $impor, $expor, $voyages, $flux, $mre; 

    public function render()
    {
        Carbon::setLocale("fr");

        return view('livewire.chiffrecles.creates')
            ->extends("layouts.master")
            ->section("contenu"); 
    }

    public function addChiffrecle()
    {
        $validateArr = [
            'newChiffre.titre' => 'required|max:255|unique:chiffrecles,titre',
            'newChiffre.impor' => 'required',
            'newChiffre.expor' => 'required',
            'newChiffre.voyage' => 'required',
            'newChiffre.flux' => 'required',
            'newChiffre.mre' => 'required',
        ];

        $userId = auth()->user()->id;
        $validatedData = $this->validate($validateArr);

        Chiffrecle::create([
            $valImportationsBiensServices = remove_operateur($validatedData["newChiffre"]["impor"]), 
            $valExportationsBiensServices = remove_operateur($validatedData["newChiffre"]["expor"]),
            $valVoyages = remove_operateur($validatedData["newChiffre"]["voyage"]),
            $valFluxide = remove_operateur($validatedData["newChiffre"]["flux"]),
            $valMre = remove_operateur($validatedData["newChiffre"]["mre"]),

            "titre" => $validatedData["newChiffre"]["titre"],
            "impor" => $validatedData["newChiffre"]["impor"],
            "expor" => $validatedData["newChiffre"]["expor"],
            "voyages" => $validatedData["newChiffre"]["voyage"],
            "flux" => $validatedData["newChiffre"]["flux"],
            "mre" => $validatedData["newChiffre"]["mre"],

            "percentImpor" => $validatedData["newChiffre"]["percentImpor"]=$valImportationsBiensServices,
            "percentExpor" => $validatedData["newChiffre"]["percentExpor"]=$valExportationsBiensServices,
            "percentVoyage" => $validatedData["newChiffre"]["percentVoyage"]=$valVoyages,
            "percentFlux" => $validatedData["newChiffre"]["percentFlux"]=$valFluxide,
            "percentMre" => $validatedData["newChiffre"]["percentMre"]=$valMre,
            "user_id" => $validatedData["newChiffre"]["user_id"]=$userId,
        ]);
        $this->newChiffre = [];

        //Envoi Event après insert de user
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Chiffre clés créé avec succès!!!"]);
    }
}
