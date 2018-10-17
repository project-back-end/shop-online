<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillable =[
        'name',
        'slug',
        'description',
        'home_url',
        'image',
        'feature_store',
        'street',
        'village',
        'sangkat',
        'city',
        'capital',
        'country',
        'latitude',
        'longitude',
        'telephone',
        'email',
        'url_facebook',
        'url_instagram',
        'url_linked',
        'url_website',
        'user_id',
    ];

    public function store(){
        return $this->belongsTo('App\User','user_id');
    }

    public function product(){
        return $this->hasMany('App\Product', 'st_id', 'id');
    }
}
