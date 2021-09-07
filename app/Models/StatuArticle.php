<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatuArticle extends Model
{
    use HasFactory;

    public function article(){
        return $this->hasMany(Article::class);
    }
}
