<?php

namespace App\Http\Livewire\Event\Feed;

use Livewire\Component;

class Card extends Component
{
    public $event;

    public function render()
    {
        return view('livewire.event.feed.card');
    }
}
