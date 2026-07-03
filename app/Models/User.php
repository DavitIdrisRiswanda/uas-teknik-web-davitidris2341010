<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Mass Assignment
     */
    protected $fillable = [

        'name',
        'username',
        'email',
        'password',
        'role',
        'phone',
        'gender',
        'birth_date',
        'address',
        'city',
        'province',
        'postal_code',
        'photo',

    ];

    /**
     * Hidden Attributes
     */
    protected $hidden = [

        'password',
        'remember_token',

    ];

    /**
     * Attribute Casting
     */
    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',
            'birth_date' => 'date',
            'password' => 'hashed',

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Seller memiliki satu toko
    public function store(): HasOne
    {
        return $this->hasOne(Store::class);
    }

    // Seller memiliki banyak produk
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'seller_id');
    }

    // Buyer memiliki banyak pesanan
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }

    // Buyer memiliki banyak keranjang
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'buyer_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Helper
    |--------------------------------------------------------------------------
    */

    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {

            return asset('storage/' . $this->photo);

        }

        return asset('images/default-user.png');
    }
}