<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\ImageArticle;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{
    //Trait pour la pagination
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $newArticle = [];
    public $editArticle = [];
    public $rolePermissions = [];
    public $currentPage = PAGELISTEARTICLE;


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
        $this->currentPage = PAGECREATEARTICLE;
    }

    public function goToListArticle(){
        $this->currentPage = PAGELISTEARTICLE;
        $this->editArticle = [];
    }

    public function goToEditArticle($idArticle){
        $this->editArticle = Article::with('imageArticle')->find($idArticle)->toArray();
        // dump($this->editArticle);
        $this->currentPage = PAGEEDITARTICLE;
    }

    public function updateArticle(){
        $validationAttributes = $this->validate(); 

        dump($validationAttributes);
    }

    public function rules(){
        return [
            'newArticle.titre' =>  'required|max:255|unique:articles,titre,',
            'newArticle.contenue' => 'required',
        ];
    }

    public function addArticle(){
        $userId = auth()->user()->id;
        $validationAttributes = $this->validate(); 
        $titreArticle = $validationAttributes["newArticle"]["titre"];
        $slug = Str::slug($titreArticle, '-');
        $validationAttributes["newArticle"]["status"] = "0"; 
        $validationAttributes["newArticle"]["slug"] = $slug;
        $validationAttributes["newArticle"]["user_id"] = $userId;
        //dump($validationAttributes);

        //Création d'un nouvel article
        Article::create($validationAttributes["newArticle"]);
        //Vider les champs 
        $this->newArticle = []; 
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article créé avec succès!!!"]);
    } 
}
