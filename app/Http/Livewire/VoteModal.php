<?php

namespace App\Http\Livewire;

use App\Models\Contestant;
use App\Models\Vote;
use App\Models\Voter;
use Livewire\Component;

class VoteModal extends Component
{
    public $contestant;

    public $voter;
    public $amount = 0;
    public $votes = 0;

    /**
     * Amount per vote
     * @var
     */
    public $vote_amount = 50;

    public function mount()
    {
        if (!$this->contestant)
            $this->contestant = new Contestant;
    }

    protected $listeners = ['contestant'];

    public function contestant($contestant)
    {
        $this->contestant = Contestant::find($contestant);
    }

    public function render()
    {
        return view('livewire.vote-modal');
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

    protected $rules = [
        'voter.name' => ['required', 'min:3'],
        'voter.phone' => ['required'],
        'amount' => ['required', 'integer'],
        'votes' => ['required', 'integer'],
    ];

    public function save()
    {
        $this->validate();

        // Save Voter
        $voter = Voter::firstOrCreate([
            'phone' => $this->voter['phone'],
        ], [
            'name' => $this->voter['name'],
        ]);

        // Save Vote (pending) & session
        $pending_vote = Vote::where([
            'contestant_id' => $this->contestant->id,
            'voter_id' => $voter->id,
            'active' => 0,
        ])->first();

        if ($pending_vote) {
            $vote = $pending_vote->update([
                'total'     => $this->votes,
                'amount'    => $this->amount,
            ]);
        } else {
            $vote = Vote::create([
                'contestant_id' => $this->contestant->id,
                'voter_id'      => $voter->id,
                'total'         => $this->votes,
                'amount'        => $this->amount,
            ]);
        }

        session()->flash('status', "Your vote is processing...");

        return redirect()->route('vote.show', ['vote' => $vote->id]);
    }
}
