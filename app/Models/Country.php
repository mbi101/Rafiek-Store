<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model 
{

    protected $table = 'countries';
    public $timestamps = true;
    protected $fillable = array('name');

    public function governorates()
    {
        return $this->hasMany('App\Model\Governorate', 'country_id');
    }

}