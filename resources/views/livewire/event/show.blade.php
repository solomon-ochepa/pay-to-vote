<div class="col-md-8 col-lg-9 vstack gap-4">
    <div class="card card-body card-overlay-bottom border-0"
        style="background-image:url({{ asset('app') }}/images/events/06.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
        {{-- Stert at date --}}
        <div class="row g-3 justify-content-between opacity-75">
            <div class="col-lg-2">
                <div class="bg-mode text-center rounded overflow-hidden p-1 d-inline-block">
                    <div class="bg-primary p-2 text-white rounded-top small lh-1">
                        {{ $event->start_at->gt(now()) ? 'Starting' : 'Started' }}
                    </div>
                    <h5 class="mb-0 py-2 lh-1">{{ $event->start_at->format('M d, Y') }}</h5>
                </div>
            </div>
        </div>

        {{-- Name --}}
        <div class="row g-3 justify-content-between align-items-center mt-5 pt-5 position-relative z-index-9">
            <div class="col-lg-9">
                <h1 class="h3 mb-1 text-white">{{ Str::limit($event->name, 32) }}</h1>
                <a class="text-white" href="https://themes.getbootstrap.com/store/webestica" target="_blank">
                    #{{ $event->slug }}
                </a>
            </div>

            {{-- Action button --}}
            <div class="col-lg-3 text-lg-end">
                <a class="btn btn-primary" href="{{ route('event.contestant.create', ['event' => $event->slug]) }}">
                    <i class="fas fa-user-plus me-1"></i>
                    Contest
                </a>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-lg-6"></div>

            <div class="col-lg-6">
                <!-- Avatar group END -->
                <div class="row g-2">
                    <div class="col-sm-4">
                        <!-- Registred -->
                        <div class="d-flex">
                            <i class="bi bi-person-plus fs-4"></i>
                            <div class="ms-3">
                                <h5 class="mb-0">{{ $event->contestants->count() }}</h5>
                                <p class="mb-0">Contestants</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <!-- Attendance -->
                        <div class="d-flex">
                            <i class="bi bi-people fs-4"></i>
                            <div class="ms-3">
                                <h5 class="mb-0">{{ $event->votes->count() }}</h5>
                                <p class="mb-0">Votes</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <!-- Visitors -->
                        <div class="d-flex">
                            <i class="bi bi-trophy fs-4"></i>
                            <div class="ms-3">
                                <h5 class="mb-0">{{ $event->voters->count() }}</h5>
                                <p class="mb-0">Voters</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        @forelse ($event->contestants as $contestant)
            <div class="col-sm-6 col-xl-4">
                <div class="card h-100">
                    <div class="position-relative">
                        {{-- <a href="{{ route('event.show', ['event' => $event->slug]) }}"> --}}
                        <img class="img-fluid rounded-top"
                            src="{{ $event->media ?? asset('app') . '/images/events/01.jpg' }}" alt="">
                        {{-- </a> --}}
                        <div class="badge bg-success text-white mt-2 me-2 position-absolute top-0 end-0 shadow">
                            # {{ $contestant->number }}
                        </div>
                    </div>

                    <div class="card-body position-relative pt-0">
                        <!-- Tag -->
                        <span class="btn btn-xs btn-primary mt-n3 shadow">
                            <i class="fas fa-trophy me-1"></i>
                            {{ $contestant->votes->count() }}
                        </span>
                        <h6 class="mt-3">
                            <a href="{{ route('event.show', ['event' => $event->slug]) }}">
                                <i class="fas fa-user-tie me-1"></i>
                                {{ Str::limit($contestant->user->first_name . ' ' . $contestant->user->last_name, 16) }}
                            </a>
                        </h6>

                        <!-- Button -->
                        <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                                <button type="button" wire:click="$emit('contestant', {{ $contestant->id }})"
                                    class="btn btn-sm btn-outline-success d-block" data-bs-toggle="modal"
                                    data-bs-target="#vote-modal">
                                    <i class="bi bi-hand-thumbs-up-fill me-1"></i>
                                    Vote
                                </button>
                            </div>

                            {{-- {{ $contestant }} --}}

                            <!-- Share -->
                            <div class="dropdown ms-3">
                                <a href="#" class="btn btn-sm btn-primary-soft" id="eventActionShare"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-share-fill"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="eventActionShare">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-whatsapp fa-fw pe-1"></i>
                                            WhatsApp
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            No contestants
        @endforelse
    </div>
</div>

@push('modals')
    <livewire:vote-modal :contestant="$contestant" />
@endpush
