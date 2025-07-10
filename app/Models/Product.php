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

    public function getStatusTranslated()
    {
        return $this->status == 1 ? __('dashboard.active') : __('dashboard.inactive');
    }

    public function hasVariantsTranslated()
    {
        return $this->has_variants == 1 ? __('dashboard.yes_variants') : __('dashboard.no_variants');
    }

    public function isSimple()
    {
        return !$this->has_variants;
    }

    // accessores

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i a', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y H:i a', strtotime($value));
    }

    public function PriceAttribute()
    {
        return $this->has_variants == 0 ? number_format($this->price, 2) : __("dashboard.has_variants");
    }

    public function quantityAttribute()
    {
        return $this->has_variants == 0 ? $this->quantity : __("dashboard.has_variants");
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

}
