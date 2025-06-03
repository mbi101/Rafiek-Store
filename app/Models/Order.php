<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('user_id', 'city_id', 'street', 'email', 'phone', 'shipping_price', 'price', 'total_price', 'status');

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'order_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
