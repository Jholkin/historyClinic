<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    //RELATIONSHIP
    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    //STORAGE

    //VALIDATION

    //BACKUP OF INFORMATION

    //OTHER OPERATIONS
}
