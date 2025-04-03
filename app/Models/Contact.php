<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read_at'
    ];
    
    protected $casts = [
        'read_at' => 'datetime'
    ];

    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
        return $this;
    }

    public function markAsUnread()
    {
        $this->update(['read_at' => null]);
        return $this;
    }

    protected $dates = ['read_at'];
    
  
}