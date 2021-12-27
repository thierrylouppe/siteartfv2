<?php

namespace App\Http\Livewire\Front\Publications;

use App\Models\Publication;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Bulletinsregulateurs extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");
        $bulletinregulateurQuery = Publication::query();

        if($this->search != ""){
            $bulletinregulateurQuery->where('typepublication', 'bulletinsduregulateur')->where('status', 1)->where('titre', "LIKE", "%". $this->search ."%");
        }

        return view('fronts.publications.bulletins-regulateur', [
            "nbrebulletinregulateurs" => count(Publication::where('typepublication', 'bulletinsduregulateur')->where('status', 1)->get()),
            "bulletinregulateurs" => $bulletinregulateurQuery->where('typepublication', 'bulletinsduregulateur')->where('status', 1)->latest()->paginate(4),
        ])
                ->extends("fronts.layouts.master")
                ->section("body");
    }
}
