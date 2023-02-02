<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProfileComponent extends Component
{
    public function render()
    {
        $userProfile = Cache::remember("userProfile", now()->addMinute(10), function () {
            return Profile::where('user_id', Auth::user()->id)->first();
        });
        if (!$userProfile) {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }
        $user = Cache::remember("user", now()->addMinute(10), function () {
            return User::find(Auth::user()->id);
        });

        return view('livewire.profile-component', [
            'user' => $user,
        ])->layout('layouts.base');
    }
}
