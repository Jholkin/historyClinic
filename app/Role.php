<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
    public function store($request)
    {
        $slug = Str::slug($request->name, '-');
        alert('Éxito', 'El rol se ha guardado', 'success');
        return  self::create($request->all() + [
            'slug' => $slug
        ]);
    }

    public function my_update($request)
    {
        $slug = Str::slug($request->name, '-');
        self::update($request->all() + [
            'slug' => $slug
        ]);
    }

    //VALIDATION

    //BACKUP OF INFORMATION

    //OTHER OPERATIONS
}
