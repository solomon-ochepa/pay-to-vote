<?php

namespace App\Http\Livewire\Event;

use App\Models\Contestant;
use Livewire\Component;

class Show extends Component
{
    public $event;
    public $modal_id;

    public function modal($id)
    {
        return $this->emit('modal_id', $id);
    }

    public function render()
    {
        return view('livewire.event.show');
    }
}
