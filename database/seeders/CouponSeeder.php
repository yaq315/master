<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coupons = [
            [
                'code' => 'LEAFY10',
                'type' => 'percentage',
                'value' => 10,
                'valid_from' => Carbon::now(),
                'valid_to' => Carbon::now()->addMonth(),
                'usage_limit' => 100,
                'min_order' => 20,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'FREESHIP',
                'type' => 'fixed',
                'value' => 5,
                'valid_from' => Carbon::now(),
                'valid_to' => Carbon::now()->addMonth(),
                'usage_limit' => 50,
                'min_order' => 30,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'WELCOME20',
                'type' => 'percentage',
                'value' => 20,
                'valid_from' => Carbon::now(),
                'valid_to' => Carbon::now()->addWeek(),
                'usage_limit' => 30,
                'min_order' => 50,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'PLANT5',
                'type' => 'fixed',
                'value' => 5,
                'valid_from' => Carbon::now(),
                'valid_to' => Carbon::now()->addYear(),
                'usage_limit' => null, // لا يوجد حد للاستخدام
                'min_order' => 10,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'BIGSALE',
                'type' => 'percentage',
                'value' => 15,
                'valid_from' => Carbon::now(),
                'valid_to' => Carbon::now()->addDays(15),
                'usage_limit' => 200,
                'min_order' => null, // لا يوجد حد أدنى للطلب
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // إدخال الكوبونات إلى قاعدة البيانات
        Coupon::insert($coupons);

        $this->command->info('Successfully added ' . count($coupons) . ' coupons!');
    }
}