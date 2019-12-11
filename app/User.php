<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    // RELATIONSHIP
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    // STORAGE
    public function role_assignment($request)
    {
        $this->permission_more_assignment($request->roles);
        $this->roles()->sync($request->roles);
        $this->very_permission_integrity($request->roles);
        // falta implementar mensaje de alerta
    }

    // VALIDATIONS
    public function is_admin()
    {
        $admin = config('app.admin_role');
        return $this->has_role($admin) ? true : false;    
    }

    public function has_role($id)
    {
        foreach ($this->roles as $role) {
            if ($role->id == $id || $role->slug == $id) {
                return true;
            }
        }

        return false;
    }

    public function has_permission($id)
    {
        foreach ($this->permissions as $permission) {
            if ($permission->id == $id || $permission->slug == $id) {
                return true;
            }
        }

        return false;
    }

    //OTHER OPERATIONS
    public function very_permission_integrity(array $roles)
    {
        $permissions = $this->permissions; //almacenamos todos los permisos del usuario
        foreach ($permissions as $permission) {
            //verifica si el usuario tiene el rol del permiso en cuestion, si no se cumple quita los permisos al usuario
            if (!in_array($permission->role->id, $roles)) {
                $this->permissions()->detach($permission->id);
            }
        }
    }

    //función para recibir un arreglo de todos los roles nuevos que tiene el usuario
    public function permission_more_assignment(array $roles)
    {
        foreach ($roles as $role) {
            if (!$this->has_role($role)) {
                $role_obj = \App\Role::findOrFail($role);
                $permissions = $role_obj->permissions;
                $this->permissions()->syncWithoutDetaching($permissions);
            }
        }
    }
}
