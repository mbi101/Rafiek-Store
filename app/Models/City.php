<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('governorate_id', 'name');

    public function governorate()
    {
        return $this->belongsTo('App\Model\Governorate', 'governorate_id');
    }

    public function users()
    {
        return $this->hasMany('App\Model\User', 'city_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Model\Order', 'city_id');
    }

}