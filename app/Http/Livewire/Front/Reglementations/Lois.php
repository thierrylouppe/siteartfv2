<?php

namespace App\Http\Livewire\Front\Reglementations;

use App\Models\Reglementation;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Lois extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");
        $reglementationQuery = Reglementation::query();

        if($this->search != ""){
            $reglementationQuery->where('typereglementation', 'lois')->where('status', 1)->where('titre', "LIKE", "%". $this->search ."%");
        }

        return view('fronts.reglementations.lois', [
            "nbrelois" => count(Reglementation::where('typereglementation', 'lois')->where('status', 1)->get()),
            "lois" => $reglementationQuery->where('typereglementation', 'lois')->where('status', 1)->latest()->paginate(4),
        ])
                ->extends("fronts.layouts.master")
                ->section("body");
    }
}
