<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $touches = ['user'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relation many to one (User)    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation one to many(Acitivty)
    public function activity_imgs()
    {
        return $this->hasMany(ActivityImg::class);
    }
}
