<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;

    protected $table = 'roles';
    public $timestamps = true;
    public array $translatable = ['name'];
    protected $fillable = array('name', 'permissions');

    public function admins()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }
}
