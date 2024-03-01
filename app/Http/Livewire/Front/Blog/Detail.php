<?php

namespace App\Http\Livewire\Front\Blog;

use App\Models\Article;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Detail extends Component
{
    public $article;
    public $slug_select = "";
    public $search = "";
    public $comment;
    public $replyContent;
    public $selectContent;
    public $activeReplyContent = false;
    public $selectParent_id;

    public function mount($slug)
    {
        $this->slug_select = $slug;
        // dd($this->slug_select);
        $this->article = Article::where('slug', $this->slug_select)->first();
        if ($this->article != null) {
            $actualites = Article::recent();
            session(["previous_route_name" => Route::currentRouteName(), "slugParam" => request()->slug]);

            return view('fronts.actualites.actualite-detail', compact("actualites"))->with('article', $this->article);
        }
        if (session()->has("previous_route_name") && session()->has("slugParam")) {
            return redirect()->route(session()->get("previous_route_name"), ["slug" => session()->get("slugParam")]);
        }
    }


    public function render()
    {
        // dd($this->idCommentFrontSelect); 
        $test = $this->decodeImages($this->slug_select);
        Carbon::setLocale("fr");

        $articleQuery = Article::query();

        if ($this->search != "") {
            $articleQuery->where('titre', "LIKE", "%" . $this->search . "%");
        }
        return view('livewire.front.blog.detail', [
            "articlesenligne" => $articleQuery->where('status', 1)->latest()->paginate(6),
            "articlerecents" => $articleQuery->where('status', 1)->latest()->paginate(3),
        ])
            ->extends("fronts.layouts.blogs.master")
            ->section("body");
    }

    public function decodeImages($slug_select)
    {
        $this->article = Article::where('slug', $slug_select)->with('categorie')->with('comments.auteur')->with('comments.repliesRecursive')->first();
        $this->article->decodedImages = json_decode($this->article->images) ?? [];
        // dd($this->article);
    }

    // Ajoutez cette méthode à votre composant Livewire
    public function submitComment()
    {
        // dd("Comment principal");
        if (Auth::check()) {
            $validatedData = $this->validate([
                'comment' => 'required|max:5000',
            ]);
            // dd($this->article->id);
            // Logique pour sauvegarder le commentaire dans la base de données
            // Assurez-vous de mettre à jour votre modèle Comment en conséquence
            Comment::create([
                'content' => $validatedData['comment'],
                'article_id' => $this->article->id, // Assurez-vous que vous avez l'article actuel dans la propriété $article
                'author' => auth()->user()->id, // Utilisateur actuel, vous pouvez ajuster selon vos besoins
                // Ajoutez d'autres champs nécessaires
            ]);
            $this->activeReplyContent = false;
            $this->selectContent = 0;
            $this->selectParent_id = 0;
            
            // Réinitialisez le formulaire après soumission
            $this->reset('comment');
        } else {
            // dd("Alert! Something went wrong");
            // L'utilisateur n'est pas connecté, affichez un message SweetAlert2
            $this->dispatchBrowserEvent("showInfoMessage", ["message"=>"Article publier avec succès!!!"]);
        }
        
    }

    public function addReply($commentId)
    {
        // dd($commentId);
        $validatedData = $this->validate([
            'replyContent' => 'required|max:5000',
        ]);

        $comment = Comment::find($commentId);
        // dd($comment->article_id);
        $test = $comment->replies()->create([
            'content' => $validatedData['replyContent'],
            'author' => auth()->user()->id,
            'article_id' => $comment->article_id,
            'parent_id' => $commentId,
            // Autres champs nécessaires
        ]);
        
        // Réinitialisez le champ de réponse après soumission
        $this->reset('replyContent');
        $this->activeReplyContent = false;
        $this->selectContent = 0;
        $this->selectParent_id = 0;

        // Rafraîchissez la vue si nécessaire
        $this->emit('commentAdded'); 
    }

    public function activeReply($commentId)
    {
        $this->activeReplyContent = true;
        $this->selectContent = $commentId;

    }
    public function activeSousReply($commentId, $parent_id)
    {
        $this->activeReplyContent = true;
        $this->selectContent = $commentId;
        $this->selectParent_id = $parent_id;

    }
}
