<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','first_name','last_name','dob','age','gender','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cate(){
        return $this->hasMany('App\Categories', 'user_id', 'id');
    }

    public function store(){
        return $this->hasMany('App\Store','user_id','id');
    }
    public function product(){
        return $this->hasMany('App\Product','user_id','id');
    }
}
