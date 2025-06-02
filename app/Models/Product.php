<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('category_id', 'brand_id', 'name', 'slug', 'short_description', 'description', 'sku', 'available_for', 'views', 'status', 'manage_stock', 'quantity', 'available_in_stock', 'price', 'discount', 'discount_type', 'discount_date', 'discount_start', 'discount_end');

    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'country_id');
    }

    public function images()
    {
        return $this->hasMany('App\Model\ProductImage', 'product_id');
    }

    public function variations()
    {
        return $this->hasMany('App\Model\ProductVariation', 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Model\ProductReview', 'product_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag');
    }

    public function items()
    {
        return $this->hasMany('App\Model\OrderItem', 'product_id');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Model\Wishlist', 'product_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Model\Brand', 'brand_id');
    }

}