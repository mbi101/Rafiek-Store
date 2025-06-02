<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model 
{

    protected $table = 'product_variations';
    public $timestamps = true;
    protected $fillable = array('product_id', 'type', 'price', 'quantity');

    public function product()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

}