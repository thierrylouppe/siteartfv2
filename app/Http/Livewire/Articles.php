<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\ImageArticle;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Articles extends Component
{
    //Trait pour la pagination
    use WithPagination;
    use WithFileUploads; 

    protected $paginationTheme = "bootstrap";

    public $newArticle = [];
    public $editArticle = [];
    public $publiArticle = [];
    public $rolePermissions = [];
    public $currentPage = PAGELISTEARTICLE;
    public $image = null; 
    public $newImage = null; 
    public $inputFileIterator = 0;


    public function render()
    {
        Carbon::setLocale("fr");
        return view('livewire.articles.index', [
            "articles" => Article::with('user')->latest()->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function goToAddArticle(){
        $this->resetValidation();
        $this->newArticle = [];
        $this->image = null;
        $this->inputFileIterator++;
        $this->currentPage = PAGECREATEARTICLE;
    }

    public function goToListArticle(){
        $this->currentPage = PAGELISTEARTICLE;
        $this->editArticle = [];
    }

    public function goToEditArticle($idArticle){
        $this->editArticle = Article::with('user')->find($idArticle)->toArray();
        $this->currentPage = PAGEEDITARTICLE;
    }

    public function editImage(){
        dump("OK c'est bon");
        $validateArr = [
            'newImage' => "required"
        ];
        $test = $this->validate($validateArr); 
        dump($test);
        $imagePath = ""; 

        if($this->image != null){
            $imagePath = $this->image->store('upload', 'public');
        }
        // //Création d'un nouvel article
        Article::create([
            "newImage" => $imagePath,
        ]);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article publier avec succès!!!"]);
    }
    public function confirmeEditImage($id){
        $this->dispatchBrowserEvent("showConfirmMessageDepublier", ["message"=>[
            "text" => "Vous êtes sur le point de modifier l'image cet article. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "article_id" => $id,
            ]
        ]]);
    }

    public function addArticle(){
        $validateArr = [
            'newArticle.titre' =>  'required|max:255|unique:articles,titre,',
            'newArticle.contenue' => 'required',
            'image' => "required"
        ];

        $userId = auth()->user()->id;
        $validatedData = $this->validate($validateArr); 
        $imagePath = ""; 

        if($this->image != null){
            $imagePath = $this->image->store('upload', 'public');
        }

        //Création d'un nouvel article
        Article::create([
            $titreArticle = $validatedData["newArticle"]["titre"],
            $slug = Str::slug($titreArticle, '-'),
            "titre" => $validatedData["newArticle"]["titre"],
            "contenue" => $validatedData["newArticle"]["contenue"],
            "slug" => $validatedData["newArticle"]["slug"] = $slug,
            "status" => $validatedData["newArticle"]["status"] = "0",
            "user_id" => $validatedData["newArticle"]["user_id"] = $userId,
            "image" => $imagePath,
        ]);
        //Vider les champs 
        $this->newArticle = []; 
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article créé avec succès!!!"]);
    } 

    public function updateArticle(){
        $validateArr = [
            'editArticle.titre' =>  ['required', 'max:255', Rule::unique("articles", "titre")->ignore($this->editArticle['id'])],
            'editArticle.contenue' => 'required',
            'editArticle.status' => 'required',
        ];
        
        $userId = auth()->user()->id;
        $validatedData = $this->validate($validateArr); 

        Article::find($this->editArticle["id"])->update([
            $titreArticle = $validatedData["editArticle"]["titre"],
            $slug = Str::slug($titreArticle, '-'),
            "titre" => $validatedData["editArticle"]["titre"],
            "contenue" => $validatedData["editArticle"]["contenue"],
            "slug" => $validatedData["editArticle"]["slug"] = $slug,
            "status" => $validatedData["editArticle"]["status"],
            "user_id" => $validatedData["editArticle"]["user_id"] = $userId,
        ]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article mis à jour avec succès!!!"]);
    }

    public function confirmePublierArticle($id){
        $this->dispatchBrowserEvent("showConfirmMessagePublier", ["message"=>[
            "text" => "Vous êtes sur le point de publier cet article. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "article_id" => $id,
            ]
        ]]);
    }

    public function confirmeDepublierArticle($id){
        $this->dispatchBrowserEvent("showConfirmMessageDepublier", ["message"=>[
            "text" => "Vous êtes sur le point de dépublier cet article. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "article_id" => $id,
            ]
        ]]);
    }


    public function publierArticle($id){
        //$userId = auth()->user()->id;
        $validationAttributes["newArticle"]["status"] = "1"; 
        //$validationAttributes["newArticle"]["user_id"] = $userId; 
        Article::find($id)->update($validationAttributes['newArticle']);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article publier avec succès!!!"]);
    }

    public function depublierArticle($id){
        $validationAttributes["newArticle"]["status"] = "0"; 
        Article::find($id)->update($validationAttributes['newArticle']);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article dépublier avec succès!!!"]);
    }

    public function confirmDeleteArticle($id){
        $this->dispatchBrowserEvent("showConfirmMessageDelete", ["message"=>[
            "text" => "Vous êtes sur le point de supprimer cet article. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "article_id" => $id,
            ]
        ]]);
    }

    public function deleteArticle($id){
        $imagePath = Article::find($id)->image; 
        
        $oldemplacementimageexists = Storage::disk()->exists('public/' . $imagePath);
        if($oldemplacementimageexists){
            Storage::disk()->delete('public/' . $imagePath);
        }

        Article::destroy($id);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article supprimer avec succès!!!"]);
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
