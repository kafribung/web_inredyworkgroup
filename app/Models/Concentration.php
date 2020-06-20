<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concentration extends Model
{
    protected $fillable = ['concentration'];

     // Relation One to One (user)
     public function users() 
     {
         return $this->hasMany('App\Models\User');
     }
}
