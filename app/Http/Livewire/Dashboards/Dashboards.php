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

        $this->nbreavis = count(Publication::all());
        $this->nbrebulletinregulateur = count(Publication::all());
        $this->nbreetudes = count(Publication::all( )); 
        $this->nbreseriestatistiques = count(Publication::all());
        
        $this->nbrelois = count(Reglementation::all());
        $this->nbreinstructions = count(Reglementation::all());
        $this->nbredecrets = count(Reglementation::all());
        $this->nbrecirculaires = count(Reglementation::all());
        $this->nbrearretes = count(Reglementation::all()); 

        return view('livewire.dashboards.dashboards')
        ->extends("layouts.master")
        ->section("contenu");
    }
}
