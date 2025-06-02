<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model 
{

    protected $table = 'admins';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'role_id');

    public function role()
    {
        return $this->belongsTo('App\Model\Role', 'role_id');
    }

}