<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        // Get all dashboard statistics
        $contactsCount = Contact::count();
        $unreadContactsCount = Contact::whereNull('read_at')->count();
        $usersCount = User::count();
        $productsCount = Product::count();
        
        // Get recent data
        $recentContacts = Contact::latest()->take(5)->get();
        $users = User::where('role', '!=', 'super_admin')
                   ->orderBy('created_at', 'desc')
                   ->take(5)
                   ->get();

        return view('admin.dashboard', compact(
            'contactsCount',
            'unreadContactsCount',
            'usersCount',
            'productsCount',
            'recentContacts',
            'users'  
        ));
    }
}