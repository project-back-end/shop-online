<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'products';
    protected $fillable = [
        'user_id',
        'cat_id',
        'st_id',
        'name',
        'description',
        'type',
        'url',
        'printable',
        'code',
        'end_date',
        'start_date',
        'exclusive_coupon',
        'view',
        'slug',
    ];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function store(){
        return $this->belongsTo('App\Store','st_id');
    }

    public function cat(){
        return $this->belongsTo('App\Categories','cat_id');
    }
}