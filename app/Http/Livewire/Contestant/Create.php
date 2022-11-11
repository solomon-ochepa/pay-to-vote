<?php

namespace App\Http\Livewire\Contestant;

use Livewire\Component;
use Livewire\WithFileUploads;
use Plank\Mediable\HandlesMediaUploadExceptions;

class Create extends Component
{
    use WithFileUploads;
    use HandlesMediaUploadExceptions;

    public $event;
    public $image;
    public $max = (1024 * 1000); // KB * MB Max

    public function render()
    {
        return view('livewire.contestant.create');
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => ['required', 'image', "max:{$this->max}", "mimes:jpg,jpeg,png,svg,webp"],
        ]);
    }
}
