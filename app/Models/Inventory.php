<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $touches = ['user'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relation many to one (User)    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Mutator
    public function getTakeImgAttribute()
    {
        return url('img_inventories', $this->img);
    }
}
