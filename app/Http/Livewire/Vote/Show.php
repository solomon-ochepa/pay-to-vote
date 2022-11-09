<?php

namespace App\Http\Livewire\Vote;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Show extends Component
{
    public $vote;
    public $api;
    public $data = [];

    public function mount()
    {
        $this->data = [
            'ref'       => $this->vote->id,
            'total'     => intval($this->vote->total),
            'amount'    => intval($this->vote->amount),
            'label'     => number_format($this->vote->total) . " votes",
            'phone'     => $this->vote->contestant->phone,
            'email'     => $this->vote->voter->email ?? env('MERCHANT_EMAIL', 'support@' . env('APP_DOMAIN')),
            'voter'     => $this->vote->voter->only(['name', 'phone']),
            'contestant' => $this->vote->contestant->only([
                'number', 'event', 'user'
            ]),
        ];

        $this->api = [
            'key' => config('paystack.publicKey'),
        ];
    }

    public function render()
    {
        return view('livewire.vote.show');
    }

    protected $listeners = ['processing'];

    public function processing()
    {
        $response = Http::withToken(config('paystack.secretKey'))->get("https://api.paystack.co/transaction/verify/{$this->vote->id}");

        if ($response->failed()) {
            session(['message', 'Payment failed.']);

            // Transaction: update
            $this->vote->update(['status_code' => status('failed')]);
            return;
        }

        // Transaction: update
        $this->vote->update(['active' => status('processing')]);

        $payment = $response->object()->data;

        if ($response->successful() and $payment->status === "success") {
            // Transaction: update
            $this->vote->update([
                'status_code' => status('successful'),
            ]);

            // Notification(site):
            session()->flash('status', "Payment successful.");

            // @todo: refresh the component with ajax instead
            return redirect(route('vote.show', ['vote' => $this->vote->id]));
        }
    }
}
