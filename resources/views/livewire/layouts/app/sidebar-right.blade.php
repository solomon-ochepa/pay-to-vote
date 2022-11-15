<div class="row g-4" wire:pull.10s>
    <!-- Card follow START -->
    <div class="col-sm-6 col-lg-12">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header pb-0 border-0">
                <h5 class="card-title mb-0_">Leaderboard</h5>
                @if ($event)
                    <strong class="card-subtitle mb-0 d-block border-bottom">
                        <a class="text-dark" href="{{ route('event.show', ['event' => $event->slug]) }}">
                            <i class="fas fa-trophy me-1"></i>
                            {{ $event->name }}
                        </a>
                    </strong>
                @endif
            </div>

            <div class="card-body">
                @isset($event->contestants)
                    <!-- Contestants item -->
                    @forelse ($event->contestants->take(20) ?? [] as $contestant)
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

                            <!-- Button -->
                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#">
                                {{ $contestant->votes->where('active', 1)->sum('total') }}
                            </a>
                        </div>

                    @empty
                        ...contestants coming soon
                    @endforelse

                    <div class="d-grid mt-3">
                        <a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
                    </div>
                @endisset
            </div>
        </div>
    </div>

    <!-- Card News START -->
    {{-- <div class="col-sm-6 col-lg-12">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header pb-0 border-0">
                <h5 class="card-title mb-0">Today’s news</h5>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <!-- News item -->
                <div class="mb-3">
                    <h6 class="mb-0"><a href="blog-details.html">Ten questions you should answer
                            truthfully</a></h6>
                    <small>2hr</small>
                </div>
                <!-- News item -->
                <div class="mb-3">
                    <h6 class="mb-0"><a href="blog-details.html">Five unbelievable facts about
                            money</a></h6>
                    <small>3hr</small>
                </div>
                <!-- News item -->
                <div class="mb-3">
                    <h6 class="mb-0"><a href="blog-details.html">Best Pinterest Boards for
                            learning about business</a></h6>
                    <small>4hr</small>
                </div>
                <!-- News item -->
                <div class="mb-3">
                    <h6 class="mb-0"><a href="blog-details.html">Skills that you can learn from
                            business</a></h6>
                    <small>6hr</small>
                </div>
                <!-- Load more comments -->
                <a href="#!" role="button"
                    class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center"
                    data-bs-toggle="button" aria-pressed="true">
                    <div class="spinner-dots me-2">
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                    </div>
                    View all latest news
                </a>
            </div>
            <!-- Card body END -->
        </div>
    </div> --}}
    <!-- Card News END -->
</div>
