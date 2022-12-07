<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="card-title mb-0_ fw-bolder">Leaderboard</h5>
        @isset($event)
            <strong class="card-subtitle mb-0 d-block border-bottom">
                <a class="text-dark" href="{{ route('event.show', ['event' => $event->slug]) }}">
                    <i class="fas fa-trophy me-1"></i>
                    {{ $event->name }}
                </a>
            </strong>
        @endisset
    </div>

    <div class="card-body">
        @isset($event->leaderboard)
            <!-- Event leaderboard -->
            @forelse ($event->leaderboard->take(20) ?? [] as $contestant)
                {{-- {{ dd($contestant) }} --}}
                <div class="hstack gap-2 mb-3">
                    <!-- Avatar -->
                    <div class="avatar">
                        <a href="#!">
                            <img class="avatar-img rounded-circle"
                                src="{{ $contestant->firstMedia(['image', 'profile'])->getUrl() }}" alt="">
                        </a>
                    </div>

                    <!-- Name -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="#!">
                            {{ $contestant->first_name }} {{ $contestant->last_name }}
                        </a>
                        <p class="mb-0 small text-truncate">
                            <strong>ID:</strong> {{ $contestant->number }}
                        </p>
                    </div>

                    <!-- Votes -->
                    <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#">
                        {{ $contestant->voted > 1000 ? number_format($contestant->voted / 1000, 2) . 'k' : $contestant->voted }}
                    </a>
                </div>

            @empty
                ...coming soon!
            @endforelse

            <div class="d-grid mt-3">
                <a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
            </div>
        @else
            ...coming soon!
        @endisset
    </div>
</div>
