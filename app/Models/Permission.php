<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Permission extends Model
{
    use HasTranslations;

    protected $table = 'permissions';
    public $timestamps = true;
    public array $translatable = ['name'];
    protected $fillable = array('key', 'options');
    protected $casts = [
        'options' => 'array',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('allowed_options')->withTimestamps();
    }
}
