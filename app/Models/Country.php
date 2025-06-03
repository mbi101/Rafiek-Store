<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';
    public $timestamps = true;
    protected $fillable = array('name');

    public function governorates()
    {
        return $this->hasMany(Governorate::class, 'country_id');
    }

}
