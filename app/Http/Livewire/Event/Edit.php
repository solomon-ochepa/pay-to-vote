<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use Livewire\WithFileUploads;
use Plank\Mediable\HandlesMediaUploadExceptions;

class Edit extends Component
{
    use WithFileUploads;
    use HandlesMediaUploadExceptions;

    public $event;

    public $image;
    public $media;
    public $max = (1024 * 1000); // KB * MB Max

    public function render()
    {
        return view('livewire.event.edit');
    }

    protected $rules = [
        'event.name'          => ['bail', 'required', 'string', 'max:120'],
        'event.started_at'    => ['bail', 'required', 'date'],
        'event.ended_at'      => ['bail', 'required', 'date'],
        'event.about'         => ['bail', 'required', 'string', 'max:800'],
        'event.default'       => ['bail', 'nullable', 'string'],
    ];

    public function updated()
    {
        $this->validate();
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => ['required', 'image', "max:{$this->max}", "mimes:jpg,jpeg,png,svg,webp"],
        ]);
    }
}
