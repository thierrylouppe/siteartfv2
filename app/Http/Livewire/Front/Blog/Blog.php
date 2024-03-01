<?php

namespace App\Http\Livewire\Front\Blog;

use App\Models\Article;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    protected $articles;
    protected $articlerecents;
    protected $article_a_une;
    protected $all_articles;

    public function mount()
    {
        $this->articles = Article::all(); // Ou utilisez votre propre logique pour récupérer les articles
    }


    public function render()
    {
        $this->decodeImages();

        return view('livewire.front.blog.blog', [
            'articles' => $this->articles,
            "articlesenligne" => $this->articles,
            "all_articles" => $this->all_articles,
            "articlerecents" => $this->articlerecents,
            "article_a_une" => $this->article_a_une,



            "nbreactualites" => count(Article::all()),
        ])
            ->extends("fronts.layouts.blogs.master")
            ->section("body");
    }

    public function decodeImages()
    {
        $this->all_articles = Article::where('status', 1)->whereJsonContains('type_publication->blog', 'blog')->with('categorie')->withCount('comments')->with('comments')->latest()->take(3)->get();
        $this->articles = Article::where('status', 1)->whereJsonContains('type_publication->blog', 'blog')->with('categorie')->withCount('comments')->with('comments')->latest()->paginate(2);
        $this->articlerecents = Article::where('status', 1)->whereJsonContains('type_publication->blog', 'blog')->with('categorie')->latest()->take(2)->get();
        $this->article_a_une = Article::where('status', 1)->whereJsonContains('type_publication->blog', 'blog')->withCount('comments')->orderByDesc('comments_count')->take(2)->get();
        // dd($this->all_articles);

        foreach ($this->articles as $article) {
            $article->decodedImages = json_decode($article->images) ?? [];
        }
    }


    // public function render()
    // {
    //     Carbon::setLocale("fr");

    //     // $articleQuery = Article::query();
    //     $this->articles = Article::query();
    //     $this->decodeImages();

    //     // if ($this->search != "") {
    //     //     $articleQuery->where('titre', "LIKE", "%" . $this->search . "%");
    //     // }
    //     // dd($this->articles->where('status', 1)->with('categorie')->latest()->get() );

    //     return view('livewire.front.blog.blog', [
    //         "nbreactualites" => count(Article::all()),
    //         'articles' => $this->articles->where('status', 1)->with('categorie')->latest()->get(),
    //         // "articlesenligne" => [],
    //         // "articlesenligne" => $articleQuery->where('status', 1)->with('categorie')->latest()->paginate(4),
    //         "articlerecents" => Article::where('status', 1)->latest()->paginate(3),
    //     ])
    //         ->extends("fronts.layouts.blogs.master")
    //         ->section("body");
    // }

}
