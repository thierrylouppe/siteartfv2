<?php

namespace App\Http\Livewire\Front\Reglementations;

use App\Models\Reglementation;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Arretes extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");
        $reglementationQuery = Reglementation::query();

        if($this->search != ""){
            $reglementationQuery->where('typereglementation', 'arrete')->where('status', 1)->where('titre', "LIKE", "%". $this->search ."%");
        }

        return view('fronts.reglementations.arrete', [
            "nbrearretes" => count(Reglementation::where('typereglementation', 'arrete')->where('status', 1)->get()),
            "arretes" => $reglementationQuery->where('typereglementation', 'arrete')->where('status', 1)->latest()->paginate(4),
        ])
                ->extends("fronts.layouts.master")
                ->section("body");
    }
}
