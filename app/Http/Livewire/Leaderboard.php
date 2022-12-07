<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class Leaderboard extends Component
{
    public $event;

    public function render()
    {
        $this->event = Event::where('default', 1)->first();

        return view('livewire.leaderboard', [
            'event' => $this->event
        ]);
    }

    public function modal($id)
    {
        return $this->emit('modal_id', $id);
    }
}
