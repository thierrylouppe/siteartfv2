<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'author', 'parent_id'];

    /**
     * Relation avec l'utilisateur (un commentaire appartient à un utilisateur)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }

    /**
     * Relation avec les commentaires enfants (un commentaire peut avoir plusieurs commentaires enfants)
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    /**
     * Relation avec le commentaire parent (un commentaire appartient à un commentaire parent)
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
