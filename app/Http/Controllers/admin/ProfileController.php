<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the profile page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = auth()->user();
        return view('admin.profile.show', compact('user'));
    }

    /**
     * Update basic user information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'bio' => 'nullable|string|max:1000',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->bio = $request->bio;

            if ($request->hasFile('profile_photo')) {
                $this->updateProfilePhoto($user, $request->file('profile_photo'));
            }

            $user->save();

            return back()->with('success', 'Profile updated successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while updating the profile: ' . $e->getMessage());
        }
    }

    /**
     * Show the change password form.
     *
     * @return \Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        return view('admin.profile.change-password');
    }

    /**
     * Change the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            $validator->errors()->add('current_password', 'The current password is incorrect');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return back()->with('success', 'Password changed successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while changing the password: ' . $e->getMessage());
        }
    }

    /**
     * Update the user's profile photo.
     *
     * @param  \App\Models\User  $user
     * @param  \Illuminate\Http\UploadedFile  $image
     * @return void
     */
    protected function updateProfilePhoto($user, $image)
    {
        $this->deleteOldImage($user->profile_photo_path);
        $user->profile_photo_path = $this->storeProfileImage($image, $user->id);
    }

    /**
     * Delete the old image from storage.
     *
     * @param  string|null  $path
     * @return void
     */
    protected function deleteOldImage($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * Store the new image in storage.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     * @param  int  $userId
     * @return string
     */
    protected function storeProfileImage($image, $userId)
    {
        $filename = 'profile-' . $userId . '-' . time() . '.webp';
        $directory = 'profile-photos';
        $path = $directory . '/' . $filename;

        Storage::disk('public')->makeDirectory($directory, 0755, true);

        $img = Image::make($image)
            ->fit(300, 300)
            ->encode('webp', 90);

        Storage::disk('public')->put($path, (string) $img);

        return $path;
    }

    /**
     * Delete the user account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAccount(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if (!Hash::check($request->password, $user->password)) {
            $validator->errors()->add('password', 'The password is incorrect');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Delete profile photo if exists
            $this->deleteOldImage($user->profile_photo_path);

            // Log the user out
            auth()->logout();

            // Delete account
            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('success', 'Your account has been successfully deleted.');

        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while trying to delete the account: ' . $e->getMessage());
        }
    }
}
