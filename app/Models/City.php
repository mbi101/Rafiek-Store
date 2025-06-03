<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('governorate_id', 'name');

    public function governorate(): BelongsTo
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
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
