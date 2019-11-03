<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //ASIGNATION MASIVE
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    //RELATIONSHIP
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
