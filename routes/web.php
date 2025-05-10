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
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;


// صفحات ثابتة
Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/dash', fn() => view('dashboard'))->name('dashboard');
Route::get('/shop', fn() => view('shop'))->name('shop');
Route::get('/cart', fn() => view('cart'))->name('cart');
Route::get('/checkout', fn() => view('checkout'))->name('checkout');
Route::get('/blog', fn() => view('blog'))->name('blog');
Route::get('/blog-details', fn() => view('blog-details'))->name('blog-details');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/tabeles', fn() => view('tabeles'))->name('tabeles');

// مسارات التوثيق
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// راوتات بروفايل اليوزر العادي
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'userProfile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'editUserProfile'])->name('user.profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'updateUserProfile'])->name('user.profile.update');
});

// راوتات الأدمن
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    // المستخدمين
    Route::resource('users', UserController::class)->except(['show']);

    // راوت خاص بالسوبر أدمن
    Route::middleware('superadmin')->group(function () {
        Route::put('users/{user}/special', 'Admin\UserController@specialUpdate');


        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('reviews', ProductReviewController::class);
        Route::prefix('settings')->group(function () {
            Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
            Route::put('/', [SettingsController::class, 'update'])->name('settings.update');
        });
    });

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');



    // ✅ تم تعديل هذا السطر
    Route::get('profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // رسائل التواصل
    Route::resource('contacts', ContactController::class)->except(['create', 'store']);
    Route::post('contacts/{contact}/mark-as-read', [ContactController::class, 'markAsRead'])->name('contacts.markAsRead');
    Route::post('contacts/{contact}/mark-as-unread', [ContactController::class, 'markAsUnread'])->name('contacts.markAsUnread');
});

// نموذج التواصل
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Route::resource('products', 'Admin\ProductController')->except(['show']);

// المتجر
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/shop/{product:slug}', [ProductController::class, 'show'])->name('shop-details');


Route::resource('products', 'Admin\ProductController')->except(['show']);

// تقييمات المنتجات
Route::post('/products/{product_id}/reviews', [ProductReviewController::class, 'store'])->name('reviews.store');

// الكارت
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('cart.items');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/delete/{id}', [CartController::class, 'deleteItem'])->name('cart.delete');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/update-totals', [CartController::class, 'updateTotals'])->name('cart.updateTotals');
Route::get('/cart/count', function() {
    if (auth()->check()) {
        return response()->json([
            'total' => \App\Models\Cart::where('user_id', auth()->id())->sum('quantity')
        ]);
    }
    return response()->json(['total' => 0]);
})->name('cart.count');

// الطلبات والكوبونات
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
    Route::get('/order-success/{order}', [OrderController::class, 'orderSuccess'])->name('order.success');
    Route::post('/apply-coupon', [CouponController::class, 'apply'])->name('apply.coupon');
});

// ملف PDF للطلب
Route::get('/orders/{order}/pdf', [PdfController::class, 'generateOrderPdf'])
    ->name('orders.pdf')
    ->middleware('auth');

// اختبار السيشن
Route::get('/test-session', function() {
    session(['test' => 'value']);
    return session('test');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/orders', [\App\Http\Controllers\Admin\OrderManagementController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{order}/status', [\App\Http\Controllers\Admin\OrderManagementController::class, 'updateStatus'])->name('orders.updateStatus');

    // إذا بدك عمليات CRUD كاملة للسوبر أدمن فقط:
    Route::middleware('superadmin')->group(function () {
        Route::resource('products', AdminProductController::class)->except(['index']);
    });
});


Route::get('/test-images', function() {
    $path = 'C:/xampp/htdocs/external_images';
    return scandir($path);
});



