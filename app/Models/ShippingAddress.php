<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $table = 'shipping_address';

    protected $fillable = [
        'country',
        'firstname',
        'lastname',
        'phone',
        'address',
        'zipcode',
        'city',
        'email'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
