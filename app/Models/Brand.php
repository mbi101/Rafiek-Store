<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Brand extends Model
{
    use HasTranslations;
    protected $table = 'brands';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'status', 'category_id');

    protected $casts = [
        'name' => 'array'
    ];



    // accessores
    public function getStatusLabelAttribute()
    {
        return $this->status == 1 ? 'active' : "inactive";
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

}
