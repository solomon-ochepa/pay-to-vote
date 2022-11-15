<div class="card">
    <div class="card-header">
        <h4 class="m-0">Create Event</h4>
    </div>

    {{-- Preview --}}
    <div class="card-img">
        @if ($image and !empty($image->temporaryUrl()))
            <img src="{{ $image->temporaryUrl() }}" class="rounded mb-2" width="auto"
                style="max-width: 100%; height: 100%">
            {{-- @elseif($media)
            <img src="{{ $media->getUrl() }}" class="rounded mb-2" width="auto" style="max-width: 100%"> --}}
        @endif
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row  g-3">
                {{-- Image --}}
                <div class="col-md-12" style="max-height: 250px; height: auto;">
                    <div class="input-group input-group-sm">
                        <input type="file" class="form-control" name="image" id="image"
                            aria-label="Upload Picture" title="Upload Picture" required wire:model="image" tooltip />
                        @error('image')
                            <small class="input-group-text">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" required />
                </div>

                <div class="col-md-12">
                    <label for="about" class="form-label">About</label>
                    <textarea class="form-control" id="about" name="about" placeholder="Write a short description for the event."
                        required></textarea>
                </div>

                <div class="col-md-6">
                    <label for="min-vote" class="form-label">Min Vote</label>
                    <input type="number" class="form-control" id="min-vote" placeholder="1" step="1"
                        min="1" name="min_vote" required>
                </div>

                <div class="col-md-6">
                    <label for="vote-cost" class="form-label">Cost per Vote</label>
                    <input type="number" class="form-control" id="vote-cost" placeholder="1.00" step="0.01"
                        min="1.00" name="vote_cost" required>
                </div>

                <div class="col-md-6">
                    <label for="started_at" class="form-label">Starting</label>
                    <input type="datetime-local" class="form-control" id="started_at" name="started_at" required>
                </div>

                <div class="col-md-6">
                    <label for="ended_at" class="form-label">Ending</label>
                    <input type="datetime-local" class="form-control" id="ended_at" name="ended_at" required>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="default" name="default">
                        <label class="form-check-label" for="default">
                            Default?
                        </label>
                        <div class="form-text">
                            Used for Leaderboard and other default actions.
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
