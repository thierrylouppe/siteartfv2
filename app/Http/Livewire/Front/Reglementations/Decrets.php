<?php

namespace App\Http\Livewire\Front\Reglementations;

use App\Models\Reglementation;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Decrets extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");
        $reglementationQuery = Reglementation::query();

        if($this->search != ""){
            $reglementationQuery->where('typereglementation', 'decret')->where('status', 1)->where('titre', "LIKE", "%". $this->search ."%");
        }

        return view('fronts.reglementations.decret', [
            "nbredecrets" => count(Reglementation::where('typereglementation', 'decret')->where('status', 1)->get()),
            "decrets" => $reglementationQuery->where('typereglementation', 'decret')->where('status', 1)->latest()->paginate(4),
        ])
                ->extends("fronts.layouts.master")
                ->section("body");
    }
}
