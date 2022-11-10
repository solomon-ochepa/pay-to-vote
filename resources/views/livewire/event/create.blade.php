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
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="start_at" class="form-label">Starting</label>
                    <input type="datetime-local" class="form-control" id="start_at" name="start_at">
                </div>
                <div class="col-md-6">
                    <label for="end_at" class="form-label">Ending</label>
                    <input type="datetime-local" class="form-control" id="end_at" name="end_at">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" checked type="checkbox" id="active" name="active">
                        <label class="form-check-label" for="active">
                            Activate?
                        </label>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
