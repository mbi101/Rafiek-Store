<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Scopes\ActiveScope;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = array(
        'name',
        'email',
        'phone',
        'password',
        'image',
        'country_id',
        'governorate_id',
        'city_id',
        'status',
        'active'
    );

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
    public function getStatusLabelAttribute()
    {
        return $this->status == 1 ? 'active' : 'inactive';

    }
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }
    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('status', 0);
    }


    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function reviews(): User|HasMany
    {
        return $this->hasMany(ProductReview::class, 'user_id');
    }

    public function orders(): User|HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function wishlists(): User|HasMany
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }
}
