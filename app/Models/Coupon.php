<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model 
{

    protected $table = 'coupons';
    public $timestamps = true;
    protected $fillable = array('code', 'descount_type', 'descount', 'expire_at', 'limit', 'time_used', 'available', 'note');

}