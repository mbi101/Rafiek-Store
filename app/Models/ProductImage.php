<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model 
{

    protected $table = 'product_images';
    public $timestamps = true;
    protected $fillable = array('product_id', 'name', 'type', 'path', 'size');

    public function product()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

}