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

    protected $rules = [
        "image" => ['required', 'image', "max:5120", "mimes:jpg,jpeg,png,svg,webp"]
    ];

    public function render()
    {
        return view('livewire.contestant.create');
    }

    public function updatedImage()
    {
        $this->validate();
    }
}
