<?php

namespace App\Http\Livewire\Reglementations;

use App\Models\Reglementation;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Creates extends Component
{
    use WithFileUploads;

    public $newReglementation = [];
    public $fichier = null;
    public $inputFileIterator = 0;

    public function render()
    {
        return view('livewire.reglementations.create')
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function addReglementation()
    {
        $validateArr = [
            'newReglementation.titre' => 'required|max:255|unique:reglementations,titre,',
            'newReglementation.typereglementation' => 'required',
            'fichier' => 'required|file|mimes:doc,docx,pdf|max:102400',
        ];

        $userId = auth()->user()->id;
        $validatedData = $this->validate($validateArr);
        $fichierPath = "";

        if($this->fichier != null)
        {
            $fichierPath = $this->fichier->store('download/reglementations', 'public');
        }

        Reglementation::create
        ([
            "titre" => $validatedData["newReglementation"]["titre"],
            "typereglementation" => $validatedData["newReglementation"]["typereglementation"],
            "status" => $validatedData["newReglementation"]["status"] = "0",
            "user_id" => $validatedData["newReglementation"]["user_id"] = $userId,
            "pathfichier" => $fichierPath,
        ]);

        $this->newReglementation = [];
        $this->fichier = null;
        $this->inputFileIterator++;

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Reglementation créé avec succès!!!"]);
    }

    protected function cleanupOldUploads()
    {
        $storage = Storage::disk("local");

        foreach($storage->allFiles("livewire-tmp") as $pathFileName){

            if(! $storage->exists($pathFileName)) continue;

            $fiveSecondsDelete = now()->subSeconds(2)->timestamp;

            if($fiveSecondsDelete > $storage->lastModified($pathFileName)){
                $storage->delete($pathFileName);
            }
        }
    }
}
