<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
  use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Order;

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

        // Recent Entries
        $recentContacts = Contact::latest()->take(5)->get();
        $users = User::where('role', '!=', 'super_admin')
                     ->orderBy('created_at', 'desc')
                     ->take(5)
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
            'recentContacts',
            'users',
            'chartLabels',
            'chartValues'
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