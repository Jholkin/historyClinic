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
    public function permission()
    {
        return $this->hasMany('App\Permission');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    //STORAGE

    //VALIDATION

    //BACKUP OF INFORMATION

    //OTHER OPERATIONS
}
