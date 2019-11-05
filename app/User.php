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
    public function very_permission_integrity()
    {
        $permissions = $this->permissions;
        foreach ($permissions as $permission) {
            if (!$this->has_role($permission->role->id)) {
                $this->permission->detach($permission->id);
            }
        }
    }
}
