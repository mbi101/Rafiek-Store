<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;

    protected $table = 'cities';
    public $timestamps = true;
    public array $translatable = ['name'];
    protected $fillable = array('country_id', 'name', 'code');

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'city_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'city_id');
    }

}
