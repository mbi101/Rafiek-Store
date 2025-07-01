<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use Notifiable;

    protected $table = 'admins';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'role_id');

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
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

    public function getStatusAttribute($value): string
    {
        return $value == 1 ? 'Active' : 'Inactive';
    }

    public function hasAccess($entity, $action = null)
    {
        $role = $this->role;
        if (!$role) return false;

        foreach ($role->permissions as $permission) {
            if ($permission->key === $entity) {
                $allowedOptions = json_decode($permission->pivot->allowed_options ?? '[]', true);
                if (is_null($action)) return true;
                return in_array($action, $allowedOptions);
            }
        }

        return false;
    }
}
