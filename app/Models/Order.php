<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'order_number',
        'subtotal',
        'shipping',
        'discount',
        'total',
        'payment_method',
        'shipping_address',
        'phone',
        'notes',
        // أي حقول أخرى تحتاج إلى تعيين جماعي
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
