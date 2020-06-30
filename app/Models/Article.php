<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $touches = ['user'];
    protected $guarded = ['created_at', 'updated_at'];

     // Relation many to one (position)
     public function user() 
     {
         return $this->belongsTo('App\Models\user');
     }

    // Mutator
    public function getImgAttribute($value)
    {
        return url('img_articles', $value);
    }
}
