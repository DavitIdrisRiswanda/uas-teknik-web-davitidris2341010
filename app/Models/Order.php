<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'buyer_id',

        'receiver_name',
        'receiver_phone',
        'receiver_address',
        'city',
        'province',
        'postal_code',

        'shipping_method',
        'shipping_cost',

        'payment_method',

        'notes',

        'total',

        'status',

    ];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}