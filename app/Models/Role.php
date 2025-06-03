<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps = true;
    protected $fillable = array('name', 'permissions');

    public function admins()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }
}
