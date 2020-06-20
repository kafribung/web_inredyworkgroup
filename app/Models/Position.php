<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['position'];

     // Relation  Many to One (user)
     public function users() 
     {
         return $this->hasMany('App\Models\User');
     }
}
