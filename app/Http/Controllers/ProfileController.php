<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function profile(){
        

        $user_info = Auth::user();
        return view('user.profile_page', compact('user_info'));

     }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
    
        if ($request->hasFile('picture')) {
            // Validate the image (optional)
            $request->validate([
                'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Limit file types and size
            ]);

            // Store the new image
            $path = $request->file('picture')->store('profile_photos', 'public');
            $user->picture = $path;  // Save the new image path to the user record
        }
    
        // Update the user with validated data
        $user->fill($request->only(['name', 'dob', 'about_me']));
    
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        $user->save();
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    
}
