<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // إنشاء سوبر أدمن
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@leafyland.com',
            'password' => Hash::make('password123'),
            'role' => 'super_admin',
            'profile_photo_path' => 'profile-photos/img2.jpg'
        ]);

        // إنشاء أدمن
        User::create([
            'name' => 'Admin ',
            'email' => 'admin@leafyland.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'profile_photo_path' => 'profile-photos/img1.jpg',
        ]);

        // إنشاء مستخدم عادي
        User::create([
            'name' => 'dina',
            'email' => 'dina@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'user',
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'yaqoot',
            'email' => 'yagoutgharaibeh@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'user',
            'profile_photo_path' => null
        ]);


        User::create([
            'name' => 'rama',
            'email' => 'rama@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'user',
            'profile_photo_path' => null
        ]);


        User::create([
            'name' => 'sama',
            'email' => 'sama@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'user',
            'profile_photo_path' => null
        ]);


        User::create([
            'name' => 'raneem',
            'email' => 'raneem@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'user',
            'profile_photo_path' => null
        ]);

       
    }
}