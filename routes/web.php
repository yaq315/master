<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PdfController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::get('/dash', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

// Route::get('/shop-details', function () {
//     return view('shop-details');
// })->name('shop-details');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');


Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::get('/tabeles', function () {
    return view('tabeles');
})->name('tabeles');






// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');







// Profile Routes
// راوتات اليوزر العادي
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'userProfile'])->name('user.profile');
    Route::get('/profile/edit', [ProfileController::class, 'editUserProfile'])->name('user.profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'updateUserProfile'])->name('user.profile.update');
});


  

    // Contact Form
    Route::post('/contact', action: [ContactController::class, 'store'])
    ->name('contact.store');

// Admin routes group
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
   // Dashboard
   Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
   
   // Users management

  

   Route::resource('users', UserController::class)->except(['show']);

   
     // مسارات خاصة بالسوبر أدمن فقط
     Route::middleware('superadmin')->group(function () {
        Route::put('users/{user}/special', 'Admin\UserController@specialUpdate');

    });
   
     
        
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
  

 
     // Contacts management routes
     Route::resource('contacts', ContactController::class)->except(['create', 'store']);
    
     // Mark as read/unread routes
     Route::post('contacts/{contact}/mark-as-read', [ContactController::class, 'markAsRead'])
          ->name('contacts.markAsRead');
          
     Route::post('contacts/{contact}/mark-as-unread', [ContactController::class, 'markAsUnread'])
          ->name('contacts.markAsUnread');
});


// في routes/web.php


Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/shop/{product:slug}', [ProductController::class, 'show'])->name('shop-details');
    



use App\Http\Controllers\ProductReviewController;

// Route::middleware(['auth','verified'])->group(function () {
//     Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
  
   
// });


Route::post('/products/{product_id}/reviews', [ProductReviewController::class, 'store'])->name('reviews.store');


// في routes/web.php
Route::get('/test-session', function() {
    session(['test' => 'value']);
    return session('test');
});



Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('cart.items');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/delete/{id}', [CartController::class, 'deleteItem'])->name('cart.delete');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');



Route::middleware(['auth'])->group(function () {
    // الطلبات
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
    Route::get('/order-success/{order}', [OrderController::class, 'orderSuccess'])->name('order.success');
    
    // الكوبونات
    Route::post('/apply-coupon', [CouponController::class, 'apply'])->name('apply.coupon');
});


Route::post('/cart/update-totals', [CartController::class, 'updateTotals'])->name('cart.updateTotals');

Route::get('/orders/{order}/pdf', [PdfController::class, 'generateOrderPdf'])
    ->name('orders.pdf')
    ->middleware('auth');