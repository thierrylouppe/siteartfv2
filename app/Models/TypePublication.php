<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePublication extends Model
{
    use HasFactory;

    public function publications(){
        return $this->hasMany(Publication::class);
    }
}
