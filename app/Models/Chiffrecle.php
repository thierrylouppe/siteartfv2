<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chiffrecle extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'impor',
        'expor',
        'mre',
        'voyages',
        'flux',
        'percentImpor',
        'percentExpor',
        'percentMre',
        'percentVoyage',
        'percentFlux',
        'user_id',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
