<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');
    
        // Handle the profile photo upload
        if (isset($input['photo']) && $input['photo']->isValid()) {
            // Delete the old photo if exists
            if ($user->profile_photo_path) {
                \Storage::disk('public')->delete($user->profile_photo_path);
            }
    
            // Store the new photo
            $path = $input['photo']->store('profile-photos', 'public');
            $input['profile_photo_path'] = $path;
        }
    
        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'profile_photo_path' => $input['profile_photo_path'] ?? $user->profile_photo_path, // Update profile photo path if new photo is uploaded
            ])->save();
        }
    }
    
    // Ensure this method exists if the user needs to verify their email
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'profile_photo_path' => $input['profile_photo_path'] ?? $user->profile_photo_path, // Update profile photo path if new photo is uploaded
        ])->save();
    
        $user->sendEmailVerificationNotification();
    }
}
