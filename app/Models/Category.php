<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{

    use HasTranslations, HasSlug;
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name', 'slug', 'parent', 'status');
    protected $translatable = ['name'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    // accessores
    public function getStatusLabelAttribute()
    {
        return $this->status == 1 ? 'active' : 'inactive';
    }
    // relations
    public function products()
    {
        return $this->hasMany(Product::class, 'country_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'country_id');
    }



}
