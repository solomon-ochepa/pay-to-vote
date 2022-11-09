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

    public function modal($id)
    {
        return $this->emit('modal_id', $id);
    }
}
