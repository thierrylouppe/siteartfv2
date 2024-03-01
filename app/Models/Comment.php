<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'author', 'parent_id', 'article_id'];

    /**
     * Relation avec l'utilisateur (un commentaire appartient à un utilisateur)
     */
    public function auteur()
    {
        return $this->belongsTo(User::class, 'author');
    }

    /**
     * Relation avec les commentaires enfants (un commentaire peut avoir plusieurs commentaires enfants)
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public function repliesRecursive()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('repliesRecursive');
    }

    public function replies_recursive()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id')->with('replies_recursive');
    }

    /**
     * Relation avec le commentaire parent (un commentaire appartient à un commentaire parent)
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
