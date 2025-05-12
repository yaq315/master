<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Coupon;
use App\Models\Order;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];
    
        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo_path) {
                Storage::delete($user->profile_photo_path);
            }
            
            // Store new photo
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $updateData['profile_photo_path'] = $path;
        }
    
        $user->update($updateData);
    
        // Change this line to use the correct route name
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');

    }

    public function userProfile()
    {
        $user = Auth::user();
        
        // Get order count
        $orderCount = Order::where('user_id', $user->id)->count();
          $orders = Order::where('user_id', $user->id)->latest()->get();
        // Get purchased plants (unique products from all orders)
        $purchasedPlants = $user->orders()
            ->with('items.product')
            ->get()
            ->flatMap(function ($order) {
                return $order->items->map(function ($item) {
                    return $item->product;
                });
            })
            ->unique('id');
            
        $plantCount = $purchasedPlants->count();
        
        // Get active coupons
  $activeCoupons = Coupon::where('is_active', true)
    ->where(function($query) {
        $query->whereNull('valid_from')
              ->orWhere('valid_from', '<=', now());
    })
    ->where(function($query) {
        $query->whereNull('valid_to')
              ->orWhere('valid_to', '>=', now());
    })
    ->get()
    ->map(function ($coupon) {
        $coupon->valid_to = \Carbon\Carbon::parse($coupon->valid_to); // ✅ هنا التحويل
        return $coupon;
    });

            
        $activeCouponsCount = $activeCoupons->count();

        return view('user.profile', compact(
            'user',
            'orderCount',
            'plantCount',
            'purchasedPlants',
            'activeCoupons',
            'activeCouponsCount',
            'orders'
        ));
    }

    public function updateUserProfile(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string|max:500'
        ]);

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'bio' => $validated['bio'] ?? null,
        ];

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path) {
                Storage::delete($user->profile_photo_path);
            }
            
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $updateData['profile_photo_path'] = $path;
        }

        $user->update($updateData);

       return redirect()->route('profile')->with('success', 'Profile updated successfully');

    }

public function editUserProfile()
{
    $user = Auth::user();
    return view('user.profile-edit', compact('user'));
}

public function changePasswordAjax(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|confirmed|min:6',
    ]);

    if (!Hash::check($request->current_password, auth()->user()->password)) {
        return response()->json(['success' => false, 'message' => 'Current password is incorrect']);
    }

    auth()->user()->update([
        'password' => Hash::make($request->new_password),
    ]);

    return response()->json(['success' => true, 'message' => 'Password updated successfully']);
}


public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    if (!\Hash::check($request->current_password, Auth::user()->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect']);
    }

    $user = Auth::user();
    $user->password = bcrypt($request->new_password);
    $user->save();

    return redirect()->route('profile')->with('success', 'Password changed successfully!');
}



}