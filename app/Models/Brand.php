<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model 
{

    protected $table = 'brands';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'status');

    public function products()
    {
        return $this->hasMany('App\Model\Product', 'brand_id');
    }

}