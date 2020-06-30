<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    protected $touches = ['user', 'concentration'];
    protected $guarded = ['created_at', 'update_at'];

    // Relation many to one (User)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Relation  many to One  (Concentration)
    public function concentration() 
    {
        return $this->belongsTo('App\Models\Concentration');
    }

    // Author
    public function author()
    {
        $user = Auth::check();

        if ($user) {
            return Auth::user()->id == $this->user->id;
        } else false;
    }
}
