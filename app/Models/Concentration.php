<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concentration extends Model
{
    protected $fillable = ['concentration'];

    // Relation One to many (user)
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    // Relation one to many (creation)
    public function creations()
    {
        return $this->hasMany('App\Models\Creation');
    }
}
