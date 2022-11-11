<?php

namespace App\Http\Livewire;

use App\Models\Contestant;
use Livewire\Component;

class Search extends Component
{
    public $number;

    protected $rules = [
        "number" => ['required', 'numeric', 'min:1000']
    ];

    protected $listeners = ['refreshSearch' => '$refresh'];

    public function render()
    {
        return view('livewire.search');
    }

    public function updated()
    {
        if ($this->number > 0)
            $this->validate();
        else {
            $this->emit('refreshSearch');
            $this->reset();
        }
    }

    public function submit()
    {
        $this->validate();

        $contestant = Contestant::where('number', $this->number)->first();

        if ($contestant) {
            return redirect()->route('event.contestant.show', ['event' => $contestant->event->slug, 'contestant' => $contestant->slug]);
        } else {
            // dd('none');
            session()->flash('status', "Contestatnt ({$this->number}) not found.");

            return back(); //->withInput();
        }
    }
}
