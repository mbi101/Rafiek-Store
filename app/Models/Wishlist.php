<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model 
{

    protected $table = 'wishlist';
    public $timestamps = true;
    protected $fillable = array('user_id', 'product_id');

    public function product()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

}