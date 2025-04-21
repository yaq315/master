<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image; 

class ProfileController extends Controller
{
    public function show()
    {
        return view('admin.profile.show');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        try {
            // معالجة الصورة
            if ($request->hasFile('profile_photo')) {
                // حذف الصورة القديمة إذا كانت موجودة
                $this->deleteOldImage($user->profile_photo_path);
                
                // حفظ الصورة الجديدة
                $path = $this->storeProfileImage($request->file('profile_photo'), $user->id);
                $user->profile_photo_path = $path;
            }

            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->save();

            return back()->with('success', 'Profile updated successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error updating profile: '.$e->getMessage());
        }
    }

    protected function deleteOldImage($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    protected function storeProfileImage($image, $userId)
    {
        $filename = 'profile-'.$userId.'-'.time().'.'.$image->getClientOriginalExtension();
        $path = 'profile-photos/'.$filename;
        
        // إنشاء المجلد إذا لم يكن موجوداً
        if (!Storage::disk('public')->exists('profile-photos')) {
            Storage::disk('public')->makeDirectory('profile-photos');
        }

        // معالجة الصورة وحفظها
        $img = Image::make($image->getRealPath());
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(storage_path('app/public/'.$path));

        return $path;
    }
}