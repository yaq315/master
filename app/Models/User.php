<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_photo_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }
    
    public function isAdmin()
    {
        return $this->role === 'admin' || $this->isSuperAdmin();
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

//     public function getProfilePhotoUrlAttribute()
// {
//     return $this->profile_photo_path 
//         ? asset('storage/' . $this->profile_photo_path)
//         : $this->defaultProfilePhotoUrl();
// }

// protected function defaultProfilePhotoUrl()
// {
//     return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=FFFFFF&background=4e73df';
// }

public function reviews()
{
    return $this->hasMany(Review::class);
}


public function cartItems()
{
    return $this->hasMany(\App\Models\Cart::class);
}



}