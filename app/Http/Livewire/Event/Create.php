<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use Livewire\WithFileUploads;
use Plank\Mediable\HandlesMediaUploadExceptions;

class Create extends Component
{
    use WithFileUploads;
    use HandlesMediaUploadExceptions;

    public $event;

    public $image;
    public $media;
    public $min_vote;
    public $vote_cost;
    public $max = (1024 * 1000); // KB * MB Max

    public function render()
    {
        return view('livewire.event.create');
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => ['required', 'image', "max:{$this->max}", "mimes:jpg,jpeg,png,svg,webp"],
            'min_vote' => ['required', 'integer', 'min:1'],
            'vote_cost' => ['required', 'decimal', 'min:1'],
        ]);
    }
}
