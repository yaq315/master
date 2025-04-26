<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('admin.profile.show');
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        try {
            // Update basic info
            $user->name = $validated['name'];
            $user->email = $validated['email'];

            // Handle profile photo upload
            if ($request->hasFile('profile_photo')) {
                $this->updateProfilePhoto($user, $request->file('profile_photo'));
            }

            $user->save();

            return back()->with('success', 'Profile updated successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error updating profile: '.$e->getMessage());
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
        // Delete old image if exists
        $this->deleteOldImage($user->profile_photo_path);
        
        // Store new image
        $path = $this->storeProfileImage($image, $user->id);
        
        // Update profile photo path in database
        $user->profile_photo_path = $path;
    }

    /**
     * Delete the user's old profile photo from storage.
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
     * Store the user's profile photo in storage.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     * @param  int  $userId
     * @return string
     */
    protected function storeProfileImage($image, $userId)
    {
        $filename = 'profile-'.$userId.'-'.time().'.webp'; // Using webp for better performance
        $directory = 'profile-photos';
        $path = $directory.'/'.$filename;
        
        // Create directory if it doesn't exist
        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory, 0755, true);
        }

        // Process and save the image in webp format
        $img = Image::make($image)
            ->fit(300, 300) // Crop the image to fixed size
            ->encode('webp', 90); // Compress image with 90% quality

        Storage::disk('public')->put($path, $img);

        return $path;
    }
}