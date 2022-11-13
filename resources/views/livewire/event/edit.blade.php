<div class="card">
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
                    <input type="text" class="form-control" id="name" name="name" placeholder="" required
                        :value="{{ $event->name }}" wire:model.lazy="event.name" />
                    @error('event.name')
                        <span class="form-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="about" class="form-label">About</label>
                    <textarea class="form-control" id="about" name="about" placeholder="Write a short description for the event."
                        required wire:model.lazy="event.about">{{ $event->about }}</textarea>
                </div>

                <div class="col-md-6">
                    <label for="started_at" class="form-label">Starting</label>
                    <input type="datetime-local" class="form-control" id="started_at" name="started_at" required
                        :value="{{ $event->started_at->format('m/d/Y h:i A') }}" wire:model="event.started_at">
                </div>
                <div class="col-md-6">
                    <label for="ended_at" class="form-label">Ending</label>
                    <input type="datetime-local" class="form-control" id="ended_at" name="ended_at" required
                        :value="{{ $event->ended_at }}" wire:model.lazy="event.ended_at">
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
                    <button disabled type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
