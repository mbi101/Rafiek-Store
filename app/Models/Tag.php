<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model 
{

    protected $table = 'tags';
    public $timestamps = true;
    protected $fillable = array('slug');

    public function products()
    {
        return $this->belongsToMany('App\Model\Product');
    }

}