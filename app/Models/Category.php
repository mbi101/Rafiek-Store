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
    protected $fillable = array('name', 'slug', 'image', 'parent', 'status');
    // protected $translatable = ['name'];
    protected $casts = [
        'name' => 'array',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name.en')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    // _________ accessores _________
    public function getStatusLabelAttribute()
    {
        return $this->status == 1 ? 'active' : 'inactive';
    }

    //________ relations___________
    public function products()
    {
        return $this->hasMany(Product::class, 'country_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent');
    }


}