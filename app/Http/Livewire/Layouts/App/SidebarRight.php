<?php

namespace App\Http\Livewire\Layouts\App;

use App\Models\Event;
use Livewire\Component;

class SidebarRight extends Component
{
    public $event;

    public function render()
    {
        $this->event = Event::where('default', 1)->first();

        return view('livewire.layouts.app.sidebar-right', [
            'event' => $this->event,
        ]);
    }
}
