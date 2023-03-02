<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Article;
use App\Models\Publication;
use App\Models\Reglementation;
use Livewire\Component;

use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();

class Dashboards extends Component
{
    protected $paginationTheme = "bootstrap";
    
    private $actualites = []; 
    public $nbreactus; 

    public $nbreavis; 
    public $nbrebulletinregulateur; 
    public $nbreetudes; 
    public $nbreseriestatistiques; 
        
    public $nbrelois; 
    public $nbreinstructions ;
    public $nbredecrets; 
    public $nbrecirculaires; 
    public $nbrearretes;  

    public function render()
    {
        $this->actualites = Article::latest()->paginate(5);
        
        $this->nbreactus = count(Article::where('status', '1')->get());

        $this->nbreavis = count(Publication::where('typepublication', 'avis')->where('status', '1')->get());
        $this->nbrebulletinregulateur = count(Publication::where('typepublication', 'bulletinsduregulateur')->where('status', '1')->get());
        $this->nbreetudes = count(Publication::where('typepublication', 'etude')->where('status', '1')->get()); 
        $this->nbreseriestatistiques = count(Publication::where('typepublication', 'seriestatistique')->where('status', '1')->get());
        
        $this->nbrelois = count(Reglementation::where('typereglementation', 'lois')->where('status', '1')->get());
        $this->nbreinstructions = count(Reglementation::where('typereglementation', 'instruction')->where('status', '1')->get());
        $this->nbredecrets = count(Reglementation::where('typereglementation', 'decret')->where('status', '1')->get());
        $this->nbrecirculaires = count(Reglementation::where('typereglementation', 'circulaire')->where('status', '1')->get());
        $this->nbrearretes = count(Reglementation::where('typereglementation', 'arrete')->where('status', '1')->get()); 

        return view('livewire.dashboards.dashboards')
        ->extends("layouts.master")
        ->section("contenu");
    }
}
