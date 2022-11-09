<?php

namespace App\Http\Livewire\Event;

use App\Models\Contestant;
use Livewire\Component;

class Show extends Component
{
    public $event;
    public $contestant;

    public function mount()
    {
        $this->contestant = new Contestant();
    }

    public function render()
    {
        return view('livewire.event.show');
    }

    protected $listeners = ['contestant'];

    public function contestant($contestant)
    {
        $this->contestant = Contestant::find($contestant);
    }
}
