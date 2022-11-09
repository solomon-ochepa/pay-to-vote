<x-app-sidebar-layout>
    <div class="col-md-8 col-lg-6 vstack gap-4">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('event.contestant.store', ['event' => $event->slug]) }}">
                    @csrf

                    <div class="row  g-3">
                        <h4 class="border-bottom">Personal Information</h4>

                        <div class="col-md-12">
                            <div>
                                <label class="form-label">Upload photo</label>
                                <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":1}'>
                                    <div class="dz-message">
                                        <i class="bi bi-file-earmark-text display-3"></i>
                                        <p>Drop your recent picture here or click to upload.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- <livewire:upload button="Upload" mediable_type="Event" mediable_id="{{ $event->id }}"
                                status /> --}}
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
</x-app-sidebar-layout>
