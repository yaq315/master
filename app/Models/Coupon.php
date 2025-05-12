<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
     protected $fillable = [
        'code',
        'type',
        'value',
        'valid_from',
        'valid_to',
        'is_active',
        'used_count'
    ];
    protected $casts = [
    'valid_to' => 'datetime',
    'valid_from' => 'datetime',
];
    public function scopeValid($query)
{
    return $query->where('is_active', true)
                ->where('valid_from', '<=', now())
                ->where('valid_to', '>=', now());
}
}
