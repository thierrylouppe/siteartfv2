<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\ImageArticle;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{
    //Trait pour la pagination
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $newArticle = [];
    public $editArticle = [];
    public $publiArticle = [];
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

    

    public function rules(){
        if($this->currentPage == PAGEEDITARTICLE){
            return [
                'editArticle.titre' =>  ['required', 'max:255', Rule::unique("articles", "titre")->ignore($this->editArticle['id'])],
                'editArticle.contenue' => 'required',
                'editArticle.status' => 'required'
            ];
        }

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

    public function updateArticle(){
        $userId = auth()->user()->id;
        $validationAttributes = $this->validate(); 
        $titreArticle = $validationAttributes["editArticle"]["titre"];
        $slug = Str::slug($titreArticle, '-');
        $validationAttributes["editArticle"]["slug"] = $slug;
        $validationAttributes["editArticle"]["user_id"] = $userId;

        //dump($validationAttributes);
        Article::find($this->editArticle["id"])->update($validationAttributes['editArticle']);
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
        $validationAttributes["newArticle"]["status"] = "1"; 
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
        Article::destroy($id);

        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article supprimer avec succès!!!"]);
    }
}
