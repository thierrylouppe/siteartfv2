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
        'author',
        'cover_image',
        'link_video',
        'type_publication',
        'support_contenu',
        'images',
        'category',
    ];

    // protected $casts = [
    //     'images' => 'json',
    // ];

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

    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }

    /**
     * Relation avec les commentaires (un article peut avoir plusieurs commentaires)
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function categori()
    // {
    //     return $this->hasOne(Category::class);
    // }
    public function categorie()
    {
        return $this->belongsTo(Category::class, 'category');
    }
}
