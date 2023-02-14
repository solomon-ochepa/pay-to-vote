<?php

namespace App\Http\Livewire\Event;

use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Illuminate\Http\Request;

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

    protected function rules()
    {
        $request = new EventUpdateRequest([
            'id' => $this->event->id,
        ]);
        return $request->rules();
    }

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
