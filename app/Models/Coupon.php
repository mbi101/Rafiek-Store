<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $table = 'coupons';
    public $timestamps = true;
    protected $fillable = array('code', 'discount_type', 'discount', 'expire_at', 'limit', 'time_used', 'available', 'note');

}
