<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function fichierJoint(){
        return $this->hasOne(FichierJoint::class);
    }

    public function typePublication(){
        return $this->belongsTo(TypePublication::class);
    }
}
