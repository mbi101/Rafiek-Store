<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('user_id', 'city_id', 'street', 'email', 'phone', 'shipping_price', 'price', 'total_price', 'status');

    public function items()
    {
        return $this->hasMany('App\Model\OrderItem', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function transaction()
    {
        return $this->hasMany('App\Model\Transaction', 'order_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Model\City', 'city_id');
    }

}