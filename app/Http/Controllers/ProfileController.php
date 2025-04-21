<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        return redirect()->route('admin.profile.show')->with('success', 'Profile updated successfully');
    }

    public function userProfile()
{
    $user = Auth::user();
    return view('user.profile', compact('user'));
}

public function editUserProfile()
{
    $user = Auth::user();
    return view('user.profile-edit', compact('user'));
}

public function updateUserProfile(Request $request)
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

    if ($request->hasFile('profile_photo')) {
        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
        }
        
        $path = $request->file('profile_photo')->store('profile-photos', 'public');
        $updateData['profile_photo_path'] = $path;
    }

    $user->update($updateData);

    return redirect()->route('user.profile')->with('success', 'تم تحديث الملف الشخصي بنجاح');
}
}