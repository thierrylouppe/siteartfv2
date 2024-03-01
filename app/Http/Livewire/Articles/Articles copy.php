<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\ImageArticle;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

// Un component
class Articles extends Component
{
    //Trait pour la pagination
    use WithFileUploads; 
    use WithPagination;

    protected $paginationTheme = "bootstrap";


    public $idArticle;
    public $newArticle = [
        'titre' => '',
        'contenue' => '',
        'support_contenu' => '',
        'type_publication' => [],
        // 'category' => "",
        'link_video' => "",
    ];
    public $editArticle = [];
    public $publiArticle = [];
    public $rolePermissions = [];
    public $currentPage = PAGELISTEARTICLE;
    public $cover_image = null; 
    public $images = [];
    public $imageEdit = null; 
    public $inputFileIterator = 0;
    public $search = "", $filtreType = "", $filtreEtat = "";
    public $categoryEdit1 = "", $categoryEdit2 = "";

    public function render()
    {
        Carbon::setLocale("fr");

        $articleQuery = Article::query();

        if($this->search != ""){
            $articleQuery->where('titre', "LIKE", "%". $this->search ."%");
        }

        if($this->filtreEtat != ""){
            $articleQuery->where('status', $this->filtreEtat);
        }

        return view('livewire.articles.index', [
            "articles" => $articleQuery->latest()->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function goToAddArticle(){
        $this->resetValidation();
        $this->newArticle = [];
        $this->image = null;
        $this->currentPage = PAGECREATEARTICLE;
    }

    public function goToListArticle(){
        $this->currentPage = PAGELISTEARTICLE;
        $this->editArticle = [
            'category' => [],
        ];
        $this->inputFileIterator++;
        $this->cover_image = "";
        $this->cleanupOldUploads();
    }

    public function goToEditArticle($idArticle){
        $article = Article::where('id', $idArticle)->first();
        $this->editArticle = Article::find($idArticle)->toArray();
        $this->idArticle = $article->id;
        // dump($this->editArticle["category"]);
        
        $this->currentPage = PAGEEDITARTICLE;
        $this->inputFileIterator++;
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

    public function updatedNewArticleTypePublication()
    {
        // Cette méthode sera appelée lorsque la propriété 'type_publication' sera mise à jour
        // Vous pouvez y accéder via $this->newArticle['type_publication']

        // Si vous avez besoin d'une action spécifique lors de la mise à jour, vous pouvez le faire ici
    }

    public function addArticle(){
        $validateArr = [
            'newArticle.titre' =>  'required|max:255|unique:articles,titre,',
            'newArticle.contenue' => 'required',
            'newArticle.type_publication' => 'nullable',
            'newArticle.support_contenu' => 'nullable',
            'newArticle.link_video' => 'nullable',
            'cover_image' => "required|image|mimes:jpeg,png,jpg|max:2048",
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $userId = auth()->user()->id;
        $validatedData = $this->validate($validateArr); 
        $image_name = ""; 

        //Image v1
        if($this->cover_image != null){
            $image_file = $this->cover_image->store('temp_images');
            //dump($image_file);

            $image_name = time() . '.' . $this->cover_image->getClientOriginalExtension();
            //dump($image_name);
            $source = storage_path() . "/app/" . $image_file;
            // dump($source);
            $image = Image::make($source);
            $height = $image->height();
            $width = $image->width();

            if ($height >= 500 && $width >= 500) {
                $pathOne = storage_path('app/public/images/sliders/');
                $pathTwo = storage_path('app/public/images/covers/');

                if (!file_exists($pathOne)) {
                    mkdir($pathOne, 0777, true);
                }

                if (!file_exists($pathTwo)) {
                    mkdir($pathTwo, 0777, true);
                }

                //resize image slider
                $image->resize(2300, 1000)->save($pathOne . $image_name);
                //resize image cover
                $image->resize(550, 412)->save($pathTwo . $image_name);

                Storage::delete($image_file);
            } else {
                return session()->flash('message', 'Votre image est inférieure de 500 x 500!');
                // return $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre image est inférieure de 500 x 500!"]);  
            }
            // $image = Image::make(public_path("storage/".$imagePath))->fit(200, 200);
            // $image->save();
        }

        // Enregistrez les images dans le dossier public
        // foreach ($this->images as $image) {
        //     $image->store('imagess', 'public');
        // }

        // dd($validatedData["newArticle"]);

        //Création d'un nouvel article
        $new_article = Article::create([
            $titreArticle = $validatedData["newArticle"]["titre"],
            $slug = Str::slug($titreArticle, '-'),
            "titre" => $validatedData["newArticle"]["titre"],
            "contenue" => $validatedData["newArticle"]["contenue"],
            "slug" => $validatedData["newArticle"]["slug"] = $slug,
            "link_video" => $validatedData["newArticle"]["link_video"] ?? null,
            "status" => 0,
            "author" => $userId,
            "type_publication" => json_encode($validatedData["newArticle"]["type_publication"] ?? null),
            "support_contenu" => $validatedData["newArticle"]["support_contenu"] ?? null,
            "category" => 1,
            "cover_image" => $image_name,
            'images' => $imagePaths ?? null,
        ]);

        $this->cleanupOldUploads();
        //Vider les champs 
        $this->newArticle = []; 
        $this->inputFileIterator++;
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article créé avec succès!!!"]);
        $this->goToListArticle();
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
        $this->goToListArticle();
    }

    public function updateImage($id)
    {
        $validateArr = [
            'imageEdit' =>  'required',
        ];

        $this->validate($validateArr);
        $imagePath = ""; 

        if($this->imageEdit != null){
            $imagePath = $this->imageEdit->store('upload', 'public');
        }
        
        $oldImage = Article::find($id)->cover_image; 
        
        $oldEmplacementImageExists = Storage::disk()->exists('public/' . $oldImage);
        dd($oldEmplacementImageExists);
         
        if ($oldImage == $this->cover_image and $oldEmplacementImageExists ) {
            Storage::disk()->delete('public/' . $oldImage);
        }

        Article::find($id)->update([
            "cover_image" => $imagePath
        ]);

        $this->inputFileIterator++;
        $this->imageEdit = null;

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Image mise à jour avec succès!!!"]);
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
        
        $oldemplacementimageexists = Storage::disk()->exists('public/images/sliders/' . $imagePath);
        if($oldemplacementimageexists){
            Storage::disk()->delete('public/images/sliders/' . $imagePath);
            Storage::disk()->delete('public/images/covers/' . $imagePath);
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

            $fiveSecondsDelete = now()->subSeconds(3)->timestamp;

            if($fiveSecondsDelete > $storage->lastModified($pathFileName)){
                $storage->delete($pathFileName);
            }
        }
    }
}
