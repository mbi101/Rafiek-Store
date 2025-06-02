<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model 
{

    protected $table = 'product_reviews';
    public $timestamps = true;
    protected $fillable = array('product_id', 'user_id', 'comment');

    public function product()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

}