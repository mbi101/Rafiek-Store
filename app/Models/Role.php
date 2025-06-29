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
    protected $fillable = array('key', 'name');
    protected $casts = [
        'allowed_options' => 'array',
    ];

    public function admins()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withPivot('allowed_options')->withTimestamps();
    }

    public function getAllowedOptions($permissionId)
    {
        $permission = $this->permissions->find($permissionId);
        return $permission ? $permission->pivot->allowed_options : [];
    }

    public function hasPermission($permissionName): bool
    {
        return $this->role?->permissions->contains('name', $permissionName);
    }

    public function hasPermissionOption($permissionName, $option): bool
    {
        $permission = $this->role?->permissions->firstWhere('name', $permissionName);
        return $permission && in_array($option, $permission->pivot->allowed_options ?? []);
    }
}
