<?php

namespace App\Http\Livewire\Event;

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

    protected $rules = [
        'event.name'          => ['bail', 'required', 'string', 'max:120'],
        'event.started_at'    => ['bail', 'required', 'date'],
        'event.ended_at'      => ['bail', 'required', 'date'],
        'event.about'         => ['bail', 'required', 'string', 'max:800'],
        'event.min_vote'        => ['bail', 'required', 'integer', 'min:1'],
        'event.vote_cost'       => ['bail', 'required', 'numeric', 'min:1'],
        'event.default'       => ['bail', 'nullable', 'string'],
        'image'                 => ['bail', 'nullable', 'image', "mimes:jpg,jpeg,png,svg"],
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

    public function update()
    {
        $user = auth()->user();

        if (!$user->is_admin) {
            return redirect()->route('event.index')->with('status', "You can't create Event!");
        }

        // Reset Default
        $default = Event::where('default', 1)->first();
        if ($default and $this->event->default === "on" and $default->id != $this->event->id) {
            $default->default = 0;
            $default->save();
        }

        $this->event->update();

        return redirect(route('event.show', $this->event->slug));
    }
}
