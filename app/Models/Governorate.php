<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('country_id', 'name', 'shipping_amount');

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'governorate_id');
    }
}
