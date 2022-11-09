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
                Contest Now
            </a>
        </div>
    </div>

    <!-- Card body -->
    <div class="card-body">
        @if ($count = $event->contestants->count())
            <div class="tiny-slider arrow-hover">
                <div class="tiny-slider-inner {{ $count > 1 ? 'ms-n4' : '' }}" data-arrow="true" data-dots="false"
                    data-items-xl="3" data-items-lg="2" data-items-md="2" data-items-sm="2" data-items-xs="1"
                    data-gutter="12" data-edge="30">
                    <!-- Slider items -->
                    @foreach ($event->contestants as $contestant)
                        <div>
                            <div class="card shadow-none text-center">
                                <div class="card-body p-2 pb-0">
                                    <div class="avatar avatar-xl">
                                        <a href="#!">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/09.jpg" alt=""></a>
                                    </div>
                                    <h6 class="card-title mb-1 mt-3">
                                        <a href="#!">
                                            {{ Str::limit($contestant->user->first_name . ' ' . $contestant->user->last_name, 16) }}
                                        </a>
                                    </h6>
                                    <p class="mb-0 small lh-sm">
                                        <i class="fas fa-thumbs-up text-success"></i>
                                        1
                                    </p>
                                </div>

                                <!-- Card footer -->
                                <div class="card-footer p-2 border-0">
                                    <button class="btn btn-sm btn-primary-soft w-100">
                                        Vote
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            Processing...
        @endif
    </div>
</div>
