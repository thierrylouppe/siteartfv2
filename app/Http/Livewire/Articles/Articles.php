<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $id_article;
    public $newArticle;
    public $editArticle;
    public $publiArticle;
    public $rolePermissions;
    public $currentPage = PAGELISTEARTICLE;
    public $cover_image = null;
    public $images = [];
    public $imagesEdit = [];
    public $imageEdit = null;
    public $inputFileIterator = 0;
    public $search = "";
    public $filtreType = "";
    public $filtreEtat = "";
    public $etatEditImage = false;
    public $etatEditImages = false;
    public $etatAddImage = false;

    public $typePublication = [];

    public $categories;
    public $activeEdite = false;
    public $articleSelectEdit;


    public function render()
    {
        Carbon::setLocale("fr");

        $articleQuery = Article::query();

        if ($this->search != "") {
            $articleQuery->where('titre', "LIKE", "%" . $this->search . "%");
        }

        if ($this->filtreEtat != "") {
            $articleQuery->where('status', $this->filtreEtat);
        }

        return view('livewire.articles.index', [
            "articles" => $articleQuery->latest()->paginate(5)
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }

    public function toggleEditImage()
    {
        $this->etatEditImage = !$this->etatEditImage;
    }

    public function toggleAddImage()
    {
        $this->etatAddImage = !$this->etatAddImage;
    }

    public function toggleEditImages()
    {
        $this->etatEditImages = !$this->etatEditImages;
    }

    public function annulerAction()
    {
        if ($this->editArticle['support_contenu'] == 'image') {
            $this->editArticle['support_contenu'] = null;
            $this->etatEditImages = false;
        }
    }
    public function annulerActionUrl()
    {
        // dd($this->editArticle['support_contenu']);
        if ($this->editArticle['support_contenu'] == 'video') {
            $this->editArticle['support_contenu'] = null;
            $this->editArticle['link_video'] = null;
            $this->etatEditImages = false;
            if (count($this->images) > 0) {
                $this->editArticle['support_contenu'] = 'image';
            }
        }
    }

    public function goToAddArticle()
    {
        $this->resetValidation();
        $this->newArticle = [];
        $this->cover_image = null;
        $this->currentPage = PAGECREATEARTICLE;
    }

    public function goToListArticle()
    {
        $this->currentPage = PAGELISTEARTICLE;
        $this->editArticle = [
            'category' => [],
            'support_contenu' => null,
            'link_video' => null,
        ];
        $this->inputFileIterator++;
        $this->cover_image = "";
        // $this->images = "";
        $this->cleanupOldUploads();
    }

    public function goToEditArticle($id_article)
    {
        $this->articleSelectEdit = Article::findOrFail($id_article);

        // dd($this->articleSelectEdit);
        $this->id_article = $this->articleSelectEdit->id;

        $this->editArticle = $this->articleSelectEdit
            ->only([
                'id', 'titre', 'contenue', 'status',
                'author', 'support_contenu', 'cover_image',
                'images', 'category', 'link_video',
            ]);

        $type_publication_decode = json_decode($this->articleSelectEdit->type_publication);
        if ($type_publication_decode) {
            if (property_exists($type_publication_decode, 'site')) {
                $this->typePublication['site'] = $type_publication_decode->site;
            }
            if (property_exists($type_publication_decode, 'blog')) {
                $this->typePublication['blog'] = $type_publication_decode->blog;
            }
        }

        if ($this->articleSelectEdit->images) {
            $images_decode = json_decode($this->articleSelectEdit->images);
            if ($images_decode) {
                $this->images = $images_decode;
            }
        }

        $this->currentPage = PAGEEDITARTICLE;
        $this->inputFileIterator++;
        $this->imageEdit = null;
        $this->etatEditImage = false;

        $this->dispatchBrowserEvent('showEditArticleModal');
    }

    public function addArticle()
    {
        $user_id = auth()->user()->id;
        $validatedData = $this->validateArticle();
        $image_name = $this->processCoverImage($this->cover_image);

        $this->createArticle($validatedData, $image_name, $user_id);

        $this->cleanupOldUploads();

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Article créé avec succès!!!"]);
        $this->goToListArticle();
    }

    public function confirmePublierArticle($id)
    {
        $this->dispatchBrowserEvent("showConfirmMessagePublier", ["message" => [
            "text" => "Vous êtes sur le point de publier cet article. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "article_id" => $id,
            ]
        ]]);
    }

    public function confirmeDepublierArticle($id)
    {
        $this->dispatchBrowserEvent("showConfirmMessageDepublier", ["message" => [
            "text" => "Vous êtes sur le point de dépublier cet article. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "article_id" => $id,
            ]
        ]]);
    }

    public function confirmDeleteArticle($id)
    {
        $this->dispatchBrowserEvent("showConfirmMessageDelete", ["message" => [
            "text" => "Vous êtes sur le point de supprimer cet article. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "article_id" => $id,
            ]
        ]]);
    }
    private function validateArticle()
    {
        return $this->validate([
            'newArticle.titre' => 'required|max:255|unique:articles,titre',
            'newArticle.contenue' => 'required',
            'newArticle.type_publication' => 'nullable',
            'newArticle.support_contenu' => 'nullable',
            'newArticle.link_video' => 'nullable',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    }

    private function validateEditArticle()
    {
        return $this->validate([
            'editArticle.titre' => 'nullable|max:255',
            'editArticle.contenue' => 'nullable',
            'editArticle.support_contenu' => 'nullable',
            'editArticle.link_video' => 'nullable',
            'editArticle.category' => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    }

    private function processCoverImage($coverImage)
    {
        // Logique pour le traitement de l'image de couverture
        if ($this->cover_image != null) {
            $image_file = $this->cover_image->store('temp_images');

            $image_name = time() . '.' . $this->cover_image->getClientOriginalExtension();

            $source = storage_path() . "/app/" . $image_file;

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
                // $image->resize(2300, 1000)->save($pathOne . $image_name);
                $image->save($pathOne . $image_name);
                //resize image cover
                // $image->resize(550, 412)->save($pathTwo . $image_name);
                $image->save($pathTwo . $image_name);

                Storage::delete($image_file);
            } else {
                return session()->flash('message', 'Votre image est inférieure de 500 x 500!');
            }

            return $image_name;
        }
    }

    private function processImages($images)
    {
        $imagePaths = [];
        // dd($images);
        foreach ($images as $image) {
            // dd($image);
            $image_file = $image->store('temp_images');

            $image_name = time() . '_' . rand(100, 999) . '.' . $image->getClientOriginalExtension();
            $source = storage_path() . "/app/" . $image_file;

            $image = Image::make($source);
            $height = $image->height();
            $width = $image->width();

            // Logique de traitement supplémentaire si nécessaire
            if ($height >= 500 && $width >= 500) {
                $pathOne = storage_path('app/public/images/images/');

                if (!file_exists($pathOne)) {
                    mkdir($pathOne, 0777, true);
                }
                $image->save($pathOne . $image_name);
                $imagePaths[] = $image_name;
                // Suppression du fichier temporaire
                Storage::delete($image_file);
            } else {
                return session()->flash('message', 'Votre image est inférieure de 500 x 500!');
            }
        }

        return $imagePaths;
    }

    private function createArticle($validatedData, $image_name, $user_id)
    {
        // Logique pour la création d'un nouvel article
        $this->typePublication = ["site" => false, "blog" => false];

        Article::create([
            $titreArticle = $validatedData["newArticle"]["titre"],
            $slug = Str::slug($titreArticle, '-'),
            "titre" => $validatedData["newArticle"]["titre"],
            "contenue" => $validatedData["newArticle"]["contenue"],
            "slug" => $validatedData["newArticle"]["slug"] = $slug,
            "link_video" => $validatedData["newArticle"]["link_video"] ?? null,
            "status" => 0,
            "author" => $user_id,
            "type_publication" => json_encode($this->typePublication),
            "support_contenu" => $validatedData["newArticle"]["support_contenu"] ?? null,
            "category" => 1,
            "cover_image" => $image_name,
            'images' => $imagePaths ?? null,
        ]);
    }

    // Méthode pour la mise à jour d'un article
    public function updateArticle()
    {
        $validatedData = $this->validateEditArticle();
        $article_id = $this->editArticle["id"];
        $article = Article::find($article_id);

        $etat_support_contenu = $validatedData["editArticle"]["support_contenu"];
        if ($etat_support_contenu == "image") {
            $link_video = null;
            if ($article->images != null) {
                $support_contenu = $validatedData["editArticle"]["support_contenu"];
            } else {
                $support_contenu = null;
            }
            // dd($support_contenu);
            $article->update([
                "titre" => $validatedData["editArticle"]["titre"],
                "contenue" => $validatedData["editArticle"]["contenue"],
                "type_publication" => $this->typePublication,
                "support_contenu" => $support_contenu,
                "link_video" => $link_video,
                "category" => $validatedData["editArticle"]["category"],
            ]);
        } else {
            $link_video = $validatedData["editArticle"]["link_video"];
            $article->update([
                "titre" => $validatedData["editArticle"]["titre"],
                "contenue" => $validatedData["editArticle"]["contenue"],
                "type_publication" => $this->typePublication,
                "support_contenu" => $validatedData["editArticle"]["support_contenu"],
                "link_video" => $link_video,
                "images" => null,
                "category" => $validatedData["editArticle"]["category"],
            ]);

            if ($article->images) {
                $images_decode = json_decode($article->images);
                if ($images_decode) {
                    $images = $images_decode;
                    $this->processDeleteCoverImages($images, $article_id);
                }
            }
        }

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Article mis à jour avec succès!!!"]);
        $this->goToListArticle();
    }

    public function processDeleteCoverImage($cover_image, $article_id)
    {
        $imagePath = "";

        if ($cover_image != null) {
            $imagePath = $cover_image->store('upload', 'public');
        }
        $oldImage = Article::find($article_id)->cover_image;

        $oldEmplacementImageExistsCover = Storage::disk()->exists('public/images/covers/' . $oldImage);
        $oldEmplacementImageExistsSliders = Storage::disk()->exists('public/images/sliders/' . $oldImage);

        if ($oldEmplacementImageExistsCover) {
            Storage::disk()->delete('public/images/covers/' . $oldImage);
            Storage::disk()->delete('public/images/sliders/' . $oldImage);
        }
    }

    public function processDeleteCoverImages($images, $article_id)
    {
        $oldImages = json_decode(Article::find($article_id)->images);

        foreach ($oldImages as $oldImage) {
            $oldEmplacementImageExistsImages = Storage::disk()->exists('public/images/Images/' . $oldImage);
        }

        if ($oldEmplacementImageExistsImages) {
            foreach ($oldImages as $oldImage) {
                Storage::disk()->delete('public/images/Images/' . $oldImage);
            }
        }
    }

    public function updateImage($article_id)
    {
        $validateArr = [
            'cover_image' =>  'required',
        ];

        $this->validate($validateArr);

        $this->processDeleteCoverImage($this->cover_image, $article_id);

        $image_name = $this->processCoverImage($this->cover_image);

        Article::find($article_id)->update([
            "cover_image" => $image_name
        ]);

        $this->inputFileIterator++;
        $this->cover_image = null;
        $this->etatEditImage = false;
        $this->cleanupOldUploads();
        $this->annulerAction();
        $this->goToEditArticle($article_id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Image mise à jour avec succès!!!"]);
    }

    public function updateImages($article_id)
    {
        // dd($th
        if ($this->etatEditImages == true) {
            $validateArr = [
                'imagesEdit' => 'required',
            ];

            $this->validate($validateArr);
            $article = Article::find($article_id);

            if ($article->images) {
                $this->processDeleteCoverImages($this->imagesEdit, $article_id);
            }

            $image_names = $this->processImages($this->imagesEdit);


            $article->update([
                'images' => $image_names,
                'support_contenu' => "image",
            ]);

        } else {
            $validateArr = [
                'images' => 'required',
            ];
            $this->validate($validateArr);
            $article = Article::find($article_id);

            if ($article->images) {
                $this->processDeleteCoverImages($this->images, $article_id);
            }

            $image_names = $this->processImages($this->images);


            $article->update([
                'images' => $image_names,
                'support_contenu' => "image",
            ]);
        }


        $this->inputFileIterator++;
        $this->imagesEdit = null;
        $this->etatEditImage = false;
        $this->etatAddImage = false;
        $this->etatEditImages = false;
        $this->cleanupOldUploads();
        $this->goToEditArticle($article_id);

        $this->dispatchBrowserEvent('showSuccessMessage', ['message' => 'Images mises à jour avec succès!!!']);
    }

    public function publierArticle($id)
    {
        //$userId = auth()->user()->id;
        $article = Article::find($id);
        $type_publication_decode = json_decode($article->type_publication);
        // dd($type_publication_decode->blog);

        if ($type_publication_decode->site === "site" || $type_publication_decode->blog === "blog") {
            $validationAttributes["newArticle"]["status"] = "1";
            $article->update($validationAttributes['newArticle']);
            //Envoi msg succès
            $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Article publier avec succès!!!"]);
        } else {
            $this->dispatchBrowserEvent("showInfoMessage", ["message" => "Manque de type publication"]);
        }
    }

    public function depublierArticle($id)
    {
        $validationAttributes["newArticle"]["status"] = "0";
        Article::find($id)->update($validationAttributes['newArticle']);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Article dépublier avec succès!!!"]);
    }

    public function deleteArticle($article_id)
    {
        $article = Article::find($article_id);
        $imageCover = $article->cover_image;
        $images = $article->images;

        $oldemplacementimageexists = Storage::disk()->exists('public/images/sliders/' . $imageCover);
        if ($oldemplacementimageexists) {
            Storage::disk()->delete('public/images/sliders/' . $imageCover);
            Storage::disk()->delete('public/images/covers/' . $imageCover);
        }

        if ($article->images) {
            $images_decode = json_decode($article->images);
            if ($images_decode) {
                $images = $images_decode;
                $this->processDeleteCoverImages($images, $article_id);
            }
        }

        Article::destroy($article_id);
        //Envoi msg succès
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Article supprimer avec succès!!!"]);
    }

    // public function deleteComment($comment_id)
    // {
    //     $comment = Comment::find($comment_id);
    //     $imageCover = $article->cover_image;
    //     $images = $article->images;

    //     $oldemplacementimageexists = Storage::disk()->exists('public/images/sliders/' . $imageCover);
    //     if ($oldemplacementimageexists) {
    //         Storage::disk()->delete('public/images/sliders/' . $imageCover);
    //         Storage::disk()->delete('public/images/covers/' . $imageCover);
    //     }

    //     if ($article->images) {
    //         $images_decode = json_decode($article->images);
    //         if ($images_decode) {
    //             $images = $images_decode;
    //             $this->processDeleteCoverImages($images, $article_id);
    //         }
    //     }

    //     Article::destroy($article_id);
    //     //Envoi msg succès
    //     $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Article supprimer avec succès!!!"]);
    // }

    protected function cleanupOldUploads()
    {
        $storage = Storage::disk("local");

        foreach ($storage->allFiles("livewire-tmp") as $pathFileName) {

            if (!$storage->exists($pathFileName)) continue;

            $fiveSecondsDelete = now()->subSeconds(3)->timestamp;

            if ($fiveSecondsDelete > $storage->lastModified($pathFileName)) {
                $storage->delete($pathFileName);
            }
        }

        foreach ($storage->allFiles("temp_images") as $pathFileName) {

            if (!$storage->exists($pathFileName)) continue;

            $fiveSecondsDelete = now()->subSeconds(3)->timestamp;

            if ($fiveSecondsDelete > $storage->lastModified($pathFileName)) {
                $storage->delete($pathFileName);
            }
        }
        // Logique pour nettoyer les anciens fichiers
        collect(Storage::disk('local')->allFiles('livewire-tmp'))->each(function ($pathFileName) {
            if (Storage::disk('local')->exists($pathFileName) && now()->subSeconds(3)->timestamp > Storage::disk('local')->lastModified($pathFileName)) {
                Storage::disk('local')->delete($pathFileName);
            }
        });
    }
}
