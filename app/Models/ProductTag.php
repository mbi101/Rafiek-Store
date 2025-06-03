<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTag extends Model
{

    protected $table = 'product_tag';
    public $timestamps = true;
    protected $fillable = array('product_id', 'tag_id');

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
