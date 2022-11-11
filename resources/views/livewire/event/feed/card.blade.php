<div class="card mb-3">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center border-0 pb-0">
        <h6 class="card-title mb-0">
            <a href="{{ route('event.show', ['event' => $event->slug]) }}">
                {{ $event->name }}
            </a>
        </h6>
        <div>
            <a href="{{ route('event.contestant.create', ['event' => $event->slug]) }}"
                class="btn btn-sm btn-primary-soft me-1_">
                <i class="fas fa-user-tie me-1"></i>
                Contest
            </a>
        </div>
    </div>

    <!-- Card body -->
    <div class="card-body">
        @php
            $image = ($event->media->first() and $event->media->first()->getUrl()) ? $event->media->first()->getUrl() : asset('app/images/events/06.jpg');
        @endphp
        <div class="card card-body card-overlay-bottom border-0"
            style="background-image:url({{ $image }}); background-position: center; background-size: cover; background-repeat: no-repeat;">
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
                    <h1 class="h3 mb-1 text-white">
                        <a class="text-white" href="{{ route('event.show', ['event' => $event->slug]) }}">
                            {{ Str::limit($event->name, 32) }}
                        </a>
                    </h1>
                    #{{ $event->slug }}
                </div>

                {{-- Action button --}}
                <div class="col-lg-3 text-lg-end">
                    ...
                </div>
            </div>
        </div>

        @if ($count = $event->contestants->count())
            <div class="tiny-slider arrow-hover mt-1">
                <div class="tiny-slider-inner {{ $count > 3 ? 'ms-n4' : '' }}" data-arrow="true" data-dots="false"
                    data-items-xl="3" data-items-lg="2" data-items-md="2" data-items-sm="2" data-items-xs="1"
                    data-gutter="12" data-edge="30">
                    <!-- Slider items -->
                    @foreach ($event->contestants as $contestant)
                        <div>
                            <div class="card shadow-none text-center">
                                <div class="card-body p-2 pb-0">
                                    <div class="avatar avatar-xl">
                                        <a
                                            href="{{ route('event.contestant.show', ['event' => $contestant->event->slug, 'contestant' => $contestant->slug]) }}">
                                            @if ($contestant->media->first())
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ $contestant->media->first()->getUrl() }}" alt="">
                                            @else
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/09.jpg" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <h6 class="card-title mb-1 mt-3">
                                        <div># {{ $contestant->number }}</div>
                                        <hr class="my-1" />
                                        <a
                                            href="{{ route('event.contestant.show', ['event' => $contestant->event->slug, 'contestant' => $contestant->slug]) }}">
                                            {{ Str::limit($contestant->first_name . ' ' . $contestant->last_name, 14) }}
                                        </a>
                                    </h6>
                                    <p class="mb-0 small lh-sm">
                                        <i class="fas fa-trophy text-success"></i>
                                        {{ $contestant->votes->where('active', 1)->sum('total') }}
                                    </p>
                                </div>

                                <!-- Card footer -->
                                <div class="card-footer p-2 border-0">
                                    <a href="#" wire:click="modal('{{ $contestant->id }}')"
                                        class="btn btn-sm btn-outline-success w-100 d-block" data-bs-toggle="modal"
                                        data-bs-target="#vote-modal">
                                        <i class="bi bi-hand-thumbs-up-fill me-1"></i>
                                        Vote
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
        @endif
    </div>
</div>
