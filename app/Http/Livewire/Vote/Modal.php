<?php

namespace App\Http\Livewire\Vote;

use App\Models\Contestant;
use App\Models\Vote;
use App\Models\Voter;
use Livewire\Component;

class Modal extends Component
{
    public $voter;
    public $amount = 0;
    public $votes = 0;

    /**
     * Amount per vote
     * @var
     */
    public $vote_amount = 50;

    public $modal;

    public function mount()
    {
        if (!$this->modal) {
            $this->modal = new Contestant();
        }
    }

    protected $listeners = ['modal_id'];

    public function modal_id($id)
    {
        return $this->modal = Contestant::find($id);
    }

    public function render()
    {
        return view('livewire.vote.modal');
    }

    /**
     * Set amount by amount
     */
    public function votes()
    {
        return $this->amount = ((int) $this->votes ?? 1) * $this->vote_amount;
    }

    /**
     * Set amount by vote
     */
    public function amount()
    {
        return $this->votes = ((int) $this->amount ?? $this->vote_amount) / $this->vote_amount;
    }

    public function save()
    {
        if (!$this->modal) {
            session()->flash('status', "Please wait for the page to finish loading before voting.");
            return back();
        }

        $min_vote = $this->modal->event->min_vote;
        $min_amount = $this->modal->event->vote_cost * $min_vote;

        $this->validate([
            'voter.name' => ['required', 'min:3'],
            'voter.phone' => ['required'],
            'amount' => ['required', 'integer', "min:{$min_amount}"],
            'votes' => ['required', 'integer', "min:{$min_vote}"],
        ]);

        // Save Voter
        $voter = Voter::firstOrCreate([
            'phone' => $this->voter['phone'],
        ], [
            'name' => $this->voter['name'],
        ]);

        // Save Vote (pending) & session
        $pending_vote = Vote::where([
            'event_id' => $this->modal->event->id,
            'contestant_id' => $this->modal->id,
            'voter_id' => $voter->id,
            'status_code' => 1, // pending
        ])->first();

        if ($pending_vote)
            $pending_vote->delete();

        $vote = Vote::create([
            'event_id'      => $this->modal->event->id,
            'contestant_id' => $this->modal->id,
            'voter_id'      => $voter->id,
            'total'         => $this->votes,
            'amount'        => $this->amount,
        ]);

        session()->flash('status', "Your vote is processing...");

        return redirect()->route('vote.show', ['vote' => $vote->id]);
    }
}
