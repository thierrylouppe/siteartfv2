<?php

namespace App\Http\Livewire\Publications;

use App\Models\Publication;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Creates extends Component
{
    use WithFileUploads;


    public $newPublication = []; 
    public $fichier = null; 
    public $inputFileIterator = 0;
    
    public function render()
    {
        return view('livewire.publications.create')
        ->extends("layouts.master")
        ->section("contenu"); 
    }

    public function addPublication()
    {
        $validateArr = [
            'newPublication.titre' => 'required|max:255|unique:publications,titre,',
            'newPublication.typepublication' => 'required',
            'fichier' => 'required|mimes:doc,docx,pdf|max:102400',
        ];

        $userId = auth()->user()->id;
        $validatedData = $this->validate($validateArr);
        $fichierPath = "";

        if($this->fichier != null){
            $fichierPath = $this->fichier->store('download/publications', 'public');
        }

        Publication::create([
            "titre" => $validatedData["newPublication"]["titre"],
            "typepublication" => $validatedData["newPublication"]["typepublication"],
            "status" => $validatedData["newPublication"]["status"] = "0",
            "user_id" => $validatedData["newPublication"]["user_id"] = $userId,
            "pathfichier" => $fichierPath,
        ]);

        $this->newPublication = [];
        $this->fichier = null;
        $this->inputFileIterator++;

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Publication créé avec succès!!!"]);
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
