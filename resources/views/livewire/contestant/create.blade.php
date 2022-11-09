<div wire:ignore.self class="col-md-8 col-lg-6 vstack gap-4">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                action="{{ route('event.contestant.store', ['event' => $event->slug]) }}">
                @csrf

                <div class="row  g-3">
                    <h4 class="border-bottom">Personal Information</h4>

                    {{-- Pictures --}}
                    <div class="col-md-12" style="max-height: 250px;">
                        @if ($file and !empty($file->temporaryUrl()))
                            <img src="{{ $file->temporaryUrl() }}" class="rounded mb-2" width="auto"
                                style="max-width: 100%; height: 100%">
                        @elseif($media)
                            <img src="{{ $media->getUrl() }}" class="rounded mb-2" width="auto"
                                style="max-width: 100%">
                        @endif

                        <div class="input-group input-group-sm">
                            <input type="file" name="file" class="form-control" id="file"
                                aria-label="Upload Proof of payment" title="Upload your picture here" required
                                wire:model="file" tooltip />
                        </div>
                    </div>
                    {{-- <div class="col-md-6"></div> --}}

                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder=""
                            @if (request()->user()->first_name) value="{{ request()->user()->first_name }}" @else :value="old('first_name')" @endif
                            required autofocus autocomplete="first_name">
                    </div>

                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder=""
                            @if (request()->user()->last_name) value="{{ request()->user()->last_name }}" @else :value="old('last_name')" @endif
                            required autocomplete="last_name">
                    </div>

                    <div class="col-md-5">
                        <label for="username" class="form-label">Userame</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder=""
                            @if (request()->user()->username) value="{{ request()->user()->username }}" @else :value="old('username')" @endif
                            required autocomplete="username">
                    </div>

                    <div class="col-md-7">
                        <label for="phone" class="form-label">Telephone</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                            @if (request()->user()->phone) value="{{ request()->user()->phone }}" @else :value="old('phone')" @endif
                            placeholder="" required autocomplete="phone">
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder=""
                            @if (request()->user()->email) value="{{ request()->user()->email }}" @else :value="old('email')" @endif
                            required autocomplete="email">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
