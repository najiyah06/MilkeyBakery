<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','order_code','name','email','phone',
        'address','city','postal_code',
        'subtotal','tax','delivery_fee','total','status', 'payment_method'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
