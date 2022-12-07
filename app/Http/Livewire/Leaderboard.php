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
        // $this->event->contestants->each(function ($contestant) {
        //     // $contestant->active = 1;
        //     // $contestant->save();
        // });

        return view('livewire.leaderboard', [
            'event' => $this->event
        ]);
    }
}
