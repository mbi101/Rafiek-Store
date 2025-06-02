<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model 
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('country_id', 'name', 'shipping_amount');

    public function country()
    {
        return $this->belongsTo('App\Model\Country', 'country_id');
    }

    public function cities()
    {
        return $this->hasMany('App\Model\City', 'governorate_id');
    }

}