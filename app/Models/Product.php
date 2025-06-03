<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('category_id', 'brand_id', 'name', 'slug', 'short_description', 'description', 'sku', 'available_for', 'views', 'status', 'manage_stock', 'quantity', 'available_in_stock', 'price', 'discount', 'discount_type', 'discount_date', 'discount_start', 'discount_end');

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'country_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
