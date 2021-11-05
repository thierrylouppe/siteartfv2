<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenue',
        'slug',
        'status',
        'user_id',
    ];
    

    public function imageArticle(){
        return $this->belongsTo(ImageArticle::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
