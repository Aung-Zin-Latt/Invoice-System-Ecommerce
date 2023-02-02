<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;

class EditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $mobile;
    public $image;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $newimage;
    public $url;
    public $logo_url;
    public $company_name;
    public $company_logo;

    public $profile_id;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->profile->mobile;
        $this->image = $user->profile->image;
        $this->line1 = $user->profile->line1;
        $this->line2 = $user->profile->line2;
        $this->city = $user->profile->city;
        $this->province = $user->profile->province;
        $this->country = $user->profile->country;
        $this->zipcode = $user->profile->zipcode;
        $this->company_name = $user->profile->company_name;
    }

    public function updateProfile()
    {
        // $this->validate([
        //     'image' => 'required|mimes:png,jpg,pdf|max:1024'
        // ]);

        $user = User::find(Auth::user()->id);
        $user->name = $this->name;

        $user->profile->mobile = $this->mobile;
        if ($this->newimage) {
            if ($this->image) {
                unlink('assets/images/profile/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('profile', $imageName);
            $user->profile->image = $imageName;
        }
        $user->profile->line1 = $this->line1;
        $user->profile->line2 = $this->line2;
        $user->profile->city = $this->city;
        $user->profile->province = $this->province;
        $user->profile->country = $this->country;
        $user->profile->zipcode = $this->zipcode;
        $user->profile->company_name = $this->company_name;
        $user->profile->save();
        session()->flash('message', 'Profile has been updated successfully!');
    }

    public function render()
    {
        $user = User::find(Auth::user()->id);

        return view('livewire.edit-profile-component', [
            'imgUrl' => $this->url,
            'user' => $user
        ])->layout('layouts.base');
    }
}
