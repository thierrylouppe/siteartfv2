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
        'image',
    ];

    //scopeStatus pour filtrer les articles dans les status = 1 pour en lige 
    public function scopeArticleenligne($query)
    {
        return $query->where('status', 1)->orderBy('created_at', 'DESC')->paginate(6); 
    }
    // recuperation des 3 articles recents 
    public function scopeRecent($query)
    {
        return $query->where('status', 1)->orderBy('created_at', 'DESC')->paginate(3); 
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
