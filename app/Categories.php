<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'user_id', 'name', 'slug', 'description',
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function product(){
        return $this->hasMany('App\Product', 'cat_id', 'id');
    }
}
