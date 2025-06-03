<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $table = 'tags';
    public $timestamps = true;
    protected $fillable = array('slug');

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

}
