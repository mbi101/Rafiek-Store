<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{

    protected $table = 'admins';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'role_id');

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}
