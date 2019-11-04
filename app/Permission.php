<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    //ASIGNATION MASIVE
    protected $fillable = [
        'name', 'slug', 'description', 'role_id'
    ];

    //RELATIONSHIP
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    //STORAGE
    public function store($request)
    {
        $slug = Str::slug($request->name, '-');
        // falta implementar show alert
        return self::create($request->all() + [
            'slug' => $slug
        ]);
    }

    public function my_update($request)
    {
        $slug = Str::slug($request->name, '-');
        return self::update($request->all() + [
            'slug' => $slug
        ]);
        // falta implementar show alert
    }
}
