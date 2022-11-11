<div class="card">
    {{-- Preview --}}
    <div class="card-img">
        @if ($image and !empty($image->temporaryUrl()))
            <img src="{{ $image->temporaryUrl() }}" class="rounded mb-2" width="auto"
                style="max-width: 100%; height: 100%; max-height: 250px;">
            {{-- @elseif($media)
            <img src="{{ $media->getUrl() }}" class="rounded mb-2" width="auto" style="max-width: 100%"> --}}
        @endif
    </div>

    <div class="card-body">
        <livewire:alerts />

        <form method="POST" action="{{ route('event.contestant.store', ['event' => $event->slug]) }}"
            enctype="multipart/form-data">
            @csrf

            <div class="row  g-3">
                <h4 class="border-bottom">Contestant Information</h4>
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

                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder=""
                        :value="old('first_name')" required autofocus autocomplete="first_name">
                </div>

                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder=""
                        :value="old('last_name')" required autocomplete="last_name">
                </div>

                {{-- Note --}}
                <div class="col-md-12">
                    <label for="about" class="form-label">Comment (optional)</label>
                    <textarea class="form-control" id="about" name="about" placeholder="What's on your mind?" :value="old('about')"></textarea>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
