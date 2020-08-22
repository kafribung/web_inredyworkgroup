<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
    protected $touches = ['user'];
    protected $guarded = ["id", "created_at", "updated_at",];

    // Relation many to one (User)    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Relation many to one (Concentration)    
    public function concentration()
    {
        return $this->belongsTo('App\Models\Concentration');
    }

    // Custome Route Name
    public function getRouteKeyName()
    {
        return 'created_at';
    }

    // Mutator
    public function getTakeImgAttribute()
    {
        return url('img_learnings', $this->img);
    }
}
