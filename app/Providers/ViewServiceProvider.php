<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Order;
use App\Models\Contact;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('admin.*', function ($view) {
    $pendingOrdersCount = Order::where('status', 'pending')->count();
    $newMessagesCount = Contact::whereNull('read_at')->count();

    $view->with(compact('pendingOrdersCount', 'newMessagesCount'));
});

    }

    public function register(): void
    {
        //
    }
}

