<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model 
{

    protected $table = 'order_items';
    public $timestamps = true;
    protected $fillable = array('product_id', 'order_id', 'quantity', 'price', 'data');

    public function order()
    {
        return $this->belongsTo('App\Model\Order', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

}