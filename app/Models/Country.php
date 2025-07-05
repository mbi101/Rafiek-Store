<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;

    protected $table = 'countries';
    public $timestamps = false;
    public array $translatable = ['name'];
    protected $fillable = array('name', 'code', 'status');

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }

    public function users()
    {
        return $this->hasManyThrough(
            \App\Models\User::class,
            \App\Models\City::class,
            'country_id',
            'city_id',
            'id',
            'id'
        );
    }
}
