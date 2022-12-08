<div class="col-lg-8 vstack gap-4">
    <div class="card">
        <div class="h-200px rounded-top"
            style="background-image:url({{ $contestant->event->media->first()->getUrl() ?? asset('app/images/bg/05.jpg') }}); background-position: center; background-size: cover; background-repeat: no-repeat;">
        </div>

        <div class="card-body py-0">
            <div class="d-sm-flex align-items-start text-center text-sm-start">
                <div>
                    <!-- Avatar -->
                    <div class="avatar avatar-xxl mt-n5 mb-3">
                        <img class="avatar-img rounded-circle border border-white border-3"
                            src="{{ $contestant->firstMedia(['image', 'profile'])->getUrl() }}" alt="">
                    </div>
                </div>
                <div class="ms-sm-4 mt-sm-3">
                    <!-- Info -->
                    <h1 class="mb-0 h5">
                        {{ $contestant->first_name }} {{ $contestant->last_name }}
                        <i class="bi bi-patch-check-fill text-success small"></i>
                    </h1>
                    <p><i class="fas fa-thumbs-up text-success me-1"></i>
                        {{ $contestant->votes->where('active', 1)->sum('total') }} votes</p>
                </div>

                <!-- Button -->
                <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                    <!-- Vote -->
                    <button class="btn btn-success-soft me-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#vote-modal" wire:click="modal('{{ $contestant->id }}')">
                        <i class="fas fa-thumbs-up pe-1"></i>
                        Vote Now
                    </button>

                    @can('contestant.edit')
                        <!-- Edit -->
                        <button class="btn btn-danger-soft me-2" type="button"> <i class="bi bi-pencil-fill pe-1"></i>
                            Edit profile
                        </button>
                    @endcan

                    <!-- Actions -->
                    <div class="dropdown">
                        <!-- Card share action menu -->
                        <button class="icon-md btn btn-light" type="button" id="profileAction2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileAction2">
                            <!-- Share -->
                            <li>
                                @php
                                    $title = Str::upper($contestant->event->name);
                                    $link = route('event.contestant.show', ['event' => $contestant->event->slug, 'contestant' => $contestant->slug]);
                                    $text = "*{$title}*\n\nPlease vote *{$contestant->first_name} {$contestant->last_name}* for the *{$title}* event.\nI'm counting on YOU!\n\nContestant ID: {$contestant->number}\nVote Now: {$link}\n\nBest wishes *{$contestant->user->first_name} {$contestant->user->last_name}*.";
                                    $url = 'https://wa.me/?text=' . urlencode($text);
                                @endphp
                                <a class="dropdown-item" href="{{ $url }}" target="__blank">
                                    <i class="bi bi-whatsapp fa-fw pe-1"></i>
                                    WhatsApp
                                </a>
                            </li>
                            {{-- <li>
                                    <a class="dropdown-item" href="#"> <i class="bi bi-lock fa-fw pe-2"></i>Lock
                                        profile</a>
                                </li> --}}
                            {{-- <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-gear fa-fw pe-2"></i>Profile
                                        settings
                                    </a>
                                </li> --}}
                        </ul>
                    </div>
                </div>
            </div>

            @if ($contestant->about)
                <p>{{ $contestant->about }}</p>
            @endif

            <!-- List profile -->
            <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                <li class="list-inline-item">
                    <i class="bi bi-calendar2-plus me-1"></i>
                    Joined on {{ $contestant->created_at->format('M d, Y') }}
                </li>
                {{-- <li class="list-inline-item">
                        <i class="bi bi-briefcase me-1"></i>
                        Lead Developer
                    </li> --}}
                {{-- <li class="list-inline-item">
                        <i class="bi bi-geo-alt me-1"></i>
                        New Hampshire
                    </li> --}}
            </ul>
        </div>

        <div class="card-footer mt-3 pt-2 pb-0">
            <ul
                class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
                <li class="nav-item"> <a class="nav-link active" href="my-profile-activity.html">
                        Activity</a> </li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header border-0 pb-0">
            <h5 class="card-title"> Activity feed</h5>
        </div>

        <div class="card-body">
            <div class="timeline">
                @forelse ($contestant->votes->sortbyDesc('created_at') ?? [] as $vote)
                    <!-- Timeline item -->
                    <div class="timeline-item align-items-center">
                        <!-- Timeline icon -->
                        <div class="timeline-icon">
                            <div class="avatar text-center">
                                <div class="avatar-img rounded-circle bg-success">
                                    <span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">
                                        @php
                                            $names = explode(' ', $vote->voter->name);
                                            $code = Str::limit($names[0], 1, '');
                                            if (isset($names[1])) {
                                                $code .= Str::limit($names[1], 1, '');
                                            }
                                        @endphp
                                        {{ $code }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Timeline content -->
                        <div class="timeline-content">
                            <div class="d-sm-flex justify-content-between">
                                <div>
                                    <p class="small mb-0">
                                        <b>{{ $vote->voter->name }}</b> voted
                                        <b>{{ $vote->contestant->first_name }} {{ $vote->contestant->last_name }}</b>
                                    </p>
                                    <p class="small mb-0">
                                        {{ $vote->created_at->format('D, M d, Y - h:i A') }}
                                    </p>
                                    @isset($vote->note)
                                        <p class="small mb-0 mt-1">
                                            {{ Str::limit($vote->note, 50) }}
                                        </p>
                                    @endisset
                                </div>
                                <p class="small mb-0 ms-sm-3">
                                    <i class="fas fa-thumbs-up"></i>
                                    {{ $vote->total }}
                                </p>
                            </div>
                        </div>
                    </div>

                @empty
                    ...no recent activities.
                @endforelse
            </div>
        </div>

        <div class="card-footer border-0 py-3 text-center position-relative d-grid pt-0">
            <!-- Load more button -->
            <a href="#!" role="button" class="disabled btn btn-sm btn-loader btn-primary-soft"
                data-bs-toggle="button" aria-pressed="true">
                <span class="load-text"> Load more activity </span>
                <div class="load-icon">
                    <div class="spinner-grow spinner-grow-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
