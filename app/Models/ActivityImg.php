<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityImg extends Model
{
    protected $touches = ['user', 'activity'];
    protected $fillable = ['img', 'activity_id'];

    // Relation many to one (User)    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation one to many(Acitivty)
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    // Mutator
    public function getTakeImgAttribute()
    {
        return url('img_activities', $this->img);
    }
}
