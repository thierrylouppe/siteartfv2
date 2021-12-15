<?php

namespace App\Http\Livewire\Front\Publications;

use App\Models\Publication;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Avis extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");
        $etudeQuery = Publication::query();

        if($this->search != ""){
            $etudeQuery->where('typepublication', 'avis')->where('status', 1)->where('titre', "LIKE", "%". $this->search ."%");
        }

        return view('fronts.publications.avis', [
            "nbreetude" => count(Publication::where('typepublication', 'avis')->where('status', 1)->get()),
            "avisenligne" => $etudeQuery->where('typepublication', 'avis')->where('status', 1)->latest()->paginate(4),
        ])
                ->extends("fronts.layouts.master")
                ->section("body");
    }
    
}
