<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;


class ImageUploadComponent extends Component
{
    use WithFileUploads;
    public $image;

    public function upload()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);

        $this->image->store('images', 'public');
    }
    public function render()
    {
        return view('livewire.image-upload-component');
    }
}
