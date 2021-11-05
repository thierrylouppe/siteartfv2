<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatuArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomStatut',
    ];

    // public function article(){
    //     return $this->hasMany(Article::class);
    // }

    public function articles(){
        return $this->hasMany(Article::class);
    }
}
