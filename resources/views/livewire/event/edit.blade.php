<div class="card">
    <x-alert />
    <livewire:alerts />

    {{-- Preview --}}
    <div class="card-img">
        @if ($image and !empty($image->temporaryUrl()))
            <img src="{{ $image->temporaryUrl() }}" class="rounded mb-2" width="auto"
                style="max-width: 100%; height: 100%">
        @elseif($event->media)
            <img src="{{ $event->firstMedia(['image', 'profile'])->getUrl() }}" class="rounded mb-2" width="auto"
                style="max-width: 100%">
        @endif
    </div>

    <div class="card-header">
        <h4 class="m-0">Edit: <span class="fw-normal">{{ $event->name }}</span></h4>
    </div>

    <div class="card-body">
        <form action="{{ route('event.update', $event->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row  g-3">
                {{-- Image --}}
                <div class="col-md-12" style="max-height: 250px; height: auto;">
                    <div class="input-group input-group-sm">
                        <label for="image" class="input-group-text pe-1">Update </label>
                        <input type="file" class="form-control" name="image" id="image"
                            aria-label="Upload Picture" title="Upload Picture" wire:model="image" tooltip />
                    </div>
                    @error('image')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" required
                        :value="{{ $event->name }}" wire:model.lazy="event.name" />
                    @error('event.name')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="about" class="form-label">About</label>
                    <textarea class="form-control" id="about" name="about" placeholder="Write a short description for this event."
                        required wire:model.lazy="event.about">{{ $event->about }}</textarea>
                    @error('event.about')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="min-vote" class="form-label">Min Vote</label>
                    <input type="number" class="form-control" id="min-vote" placeholder="1" step="1"
                        min="1" name="min_vote" required wire:model.lazy="event.min_vote">
                    @error('event.min_vote')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="vote-cost" class="form-label">Cost per Vote</label>
                    <input type="number" class="form-control" id="vote-cost" placeholder="1.00" step="0.01"
                        min="1.00" name="vote_cost" required wire:model.lazy="event.vote_cost">
                    @error('event.vote_cost')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="started_at" class="form-label">Starting</label>
                    <input type="_datetime-local" class="form-control" id="started_at" name="started_at" required
                        wire:model="event.started_at">
                    @error('event.started_at')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="ended_at" class="form-label">Ending</label>
                    <input type="_datetime-local" class="form-control" id="ended_at" name="ended_at" required
                        wire:model.lazy="event.ended_at">
                    @error('event.ended_at')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" @if ($event->default) checked @endif type="checkbox"
                            id="default" name="default">
                        <label class="form-check-label" for="default">
                            Default?
                        </label>
                        <div class="form-text">
                            Used for Leaderboard and other default actions.
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button _disabled type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
