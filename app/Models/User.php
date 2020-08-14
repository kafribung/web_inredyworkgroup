<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $touches = ['concentration', 'position'];

    //
    protected $guarded = [
        'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relation One to One (Concentration)
    public function concentration()
    {
        return $this->belongsTo('App\Models\Concentration');
    }

    // Relation one to one (position)
    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    // Relation one to many (position)
    public function articles()
    {
        return $this->hasMany('App\Models\article');
    }

    // Relation one to many(Creation)
    public function creations()
    {
        return $this->hasMany('App\Models\Creation');
    }

    // Relation one to many(Inventory)
    public function inventories()
    {
        return $this->hasMany('App\Models\Inventory');
    }

    // Mutator
    public function getTakeImgAttribute()
    {
        return url('img_users', $this->img);
    }
}
