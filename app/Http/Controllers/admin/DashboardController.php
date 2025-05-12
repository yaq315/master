<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
  use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Category;
use App\Models\Review;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

  public function index()
{
    // Basic Stats
    $contactsCount = Contact::count();
    $unreadContactsCount = Contact::whereNull('read_at')->count();
    $usersCount = User::count();
    $productsCount = Product::count();
        $unreadMessagesCount = Contact::whereNull('read_at')->count();
    
    // Sales Statistics
    $todaySales = Order::whereDate('created_at', today())
                      ->where('status', '!=', 'cancelled')
                      ->sum('total');
    
    $todayOrders = Order::whereDate('created_at', today())->count();
    
    // Recent Data
    $recentContacts = Contact::latest()->take(5)->get();
    $users = User::where('role', '!=', 'super_admin')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
    
    // Categories Data
    $categories = Category::select('name', 'image', 'is_active')
                         ->withCount('products')
                         ->get();
    
    // Reviews Data
    $recentReviews = Review::with(['user', 'product'])
                          ->latest()
                          ->take(7)
                          ->get();
    
    // Sales Chart Data
    $salesData = Order::select(
            DB::raw('SUM(total) as total'),
            DB::raw('MONTH(created_at) as month')
        )
        ->whereYear('created_at', now()->year)
        ->where('status', '!=', 'cancelled')
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy(DB::raw('MONTH(created_at)'))
        ->pluck('total', 'month')
        ->toArray();
     $unreadCount = Contact::whereNull('read_at')->count(); // أو where('is_read', false)
    $pendingOrders = Order::where('status', 'pending')->count(); 
    $chartLabels = [];
    $chartValues = [];
    
    for ($i = 1; $i <= 12; $i++) {
        $chartLabels[] = Carbon::create()->month($i)->format('M');
        $chartValues[] = $salesData[$i] ?? 0;
    }
    
    return view('admin.dashboard', compact(
        'contactsCount',
        'unreadContactsCount',
        'usersCount',
        'productsCount',
        'todaySales',
        'todayOrders',
        'recentContacts',
        'users',
        'categories',
        'recentReviews',
        'chartLabels',
        'chartValues',
         'unreadMessagesCount',
         'unreadCount', 
         'pendingOrders'
     
    ));
}
  
// public function dashboard()
// {
//     $salesData = Order::select(
//             DB::raw('SUM(total) as total'),
//             DB::raw('MONTH(created_at) as month')
//         )
//         ->whereYear('created_at', now()->year)
//         ->where('status', '!=', 'cancelled')
//         ->groupBy(DB::raw('MONTH(created_at)'))
//         ->orderBy(DB::raw('MONTH(created_at)'))
//         ->pluck('total', 'month')
//         ->toArray();

//     $chartLabels = [];
//     $chartValues = [];

//     for ($i = 1; $i <= 12; $i++) {
//         $chartLabels[] = Carbon::create()->month($i)->format('M');
//         $chartValues[] = $salesData[$i] ?? 0;
//     }

//     return view('admin.users.dashboard', [
//         'chartLabels' => json_encode($chartLabels),
//         'chartValues' => json_encode($chartValues),
//     ]);
// }


}