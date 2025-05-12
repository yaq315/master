<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Order;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*', function($view) {
            $todaySales = Order::whereDate('created_at', today())
                             ->where('status', '!=', 'cancelled')
                             ->sum('total');
            
            $todayOrders = Order::whereDate('created_at', today())->count();
            
            $view->with([
                'todaySales' => $todaySales,
                'todayOrders' => $todayOrders
            ]);
        });
    }
}