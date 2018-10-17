<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewUser extends Model
{
    protected $fillable = [
        'name','first_name','last_name','dob','age','gender','email', 'password',
    ];
}
