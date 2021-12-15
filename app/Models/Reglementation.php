<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglementation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'typereglementation',
        'status',
        'user_id',
        'pathfichier',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
