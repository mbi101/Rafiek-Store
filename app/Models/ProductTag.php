<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model 
{

    protected $table = 'product_tag';
    public $timestamps = true;
    protected $fillable = array('product_id', 'tag_id');

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }

    public function tag()
    {
        return $this->belongsTo('App\Model\Tag');
    }

}