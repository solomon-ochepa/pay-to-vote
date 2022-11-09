<x-app-sidebar-layout>
    <div class="col-md-8 col-lg-9 vstack gap-4">
        <div class="card">
            <div class="card-header">
                <h4>Voting: {{ $vote->contestant->user->first_name }} {{ $vote->contestant->user->last_name }}</h4>
            </div>

            <div class="card-body">
                <p>Votes: {{ $vote->total }}</p>
                <p>Amount: {{ $vote->amount }}</p>

                <button class="btn btn-sm btn-primary">Pay</button>
            </div>
        </div>
    </div>
</x-app-sidebar-layout>
