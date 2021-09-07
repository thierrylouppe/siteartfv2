<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function imageArticle(){
        return $this->hasOne(ImageArticle::class);
    }

    public function statutarticle(){
        return $this->belongsTo(StatuArticle::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
