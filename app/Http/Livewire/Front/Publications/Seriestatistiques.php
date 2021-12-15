<?php

namespace App\Http\Livewire\Front\Publications;

use App\Models\Publication;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Seriestatistiques extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");
        $seriestatistiqueQuery = Publication::query();

        if($this->search != ""){
            $seriestatistiqueQuery->where('typepublication', 'seriestatistique')->where('status', 1)->where('titre', "LIKE", "%". $this->search ."%");
        }

        return view('fronts.publications.series-statistiques', [
            "nbreetude" => count(Publication::where('typepublication', 'seriestatistique')->get()),
            "seriestatistiques" => $seriestatistiqueQuery->where('typepublication', 'seriestatistique')->where('status', 1)->latest()->paginate(4),
        ])
                ->extends("fronts.layouts.master")
                ->section("body");
    }
}
