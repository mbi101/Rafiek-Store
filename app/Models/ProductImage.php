<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{

    protected $table = 'product_images';
    public $timestamps = true;
    protected $fillable = array('product_id', 'name', 'type', 'path', 'size');

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
