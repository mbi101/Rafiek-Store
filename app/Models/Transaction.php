<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model 
{

    protected $table = 'transactions';
    public $timestamps = true;
    protected $fillable = array('order_id', 'payment_method');

    public function order()
    {
        return $this->belongsTo('App\Model\Order', 'order_id');
    }

}