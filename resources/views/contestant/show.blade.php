<x-app-layout>
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
                            {{ $contestant->votes->where('active', 1)->count() }} votes</p>
                    </div>

                    <!-- Button -->
                    <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                        @can('contestant.edit')
                            <button class="btn btn-danger-soft me-2" type="button"> <i class="bi bi-pencil-fill pe-1"></i>
                                Edit profile
                            </button>
                        @endcan
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
        <!-- Card END -->

        <!-- Activity feed START -->
        <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <h5 class="card-title"> Activity feed</h5>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                <div class="timeline">

                    <!-- Timeline item START -->
                    <div class="timeline-item">
                        <!-- Timeline icon -->
                        <div class="timeline-icon">
                            <div class="avatar text-center">
                                <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/07.jpg"
                                    alt="">
                            </div>
                        </div>
                        <!-- Timeline content -->
                        <div class="timeline-content">
                            <div class="d-sm-flex justify-content-between">
                                <div>
                                    <p class="small mb-0"><b>Sam Lanson</b> update a playlist on
                                        webestica.</p>
                                    <p class="small mb-0"><i class="bi bi-unlock-fill pe-1"></i>Public
                                    </p>
                                </div>
                                <p class="small ms-sm-3 mt-2 mt-sm-0 text-nowrap">Just now</p>
                            </div>
                        </div>
                    </div>
                    <!-- Timeline item END -->

                    <!-- Timeline item START -->
                    <div class="timeline-item">
                        <!-- Timeline icon -->
                        <div class="timeline-icon">
                            <div class="avatar text-center">
                                <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/01.jpg"
                                    alt="">
                            </div>
                        </div>
                        <!-- Timeline content -->
                        <div class="timeline-content">
                            <div class="d-sm-flex justify-content-between">
                                <div>
                                    <p class="small mb-0"><b>Billy Vasquez</b> save a <a href="#!">link.</a> </p>
                                    <p class="small mb-0"><i class="bi bi-lock-fill pe-1"></i>only me
                                    </p>
                                </div>
                                <p class="small ms-sm-3 mt-2 mt-sm-0">2min</p>
                            </div>
                        </div>
                    </div>
                    <!-- Timeline item END -->

                    <!-- Timeline item START -->
                    <div class="timeline-item align-items-center">
                        <!-- Timeline icon -->
                        <div class="timeline-icon">
                            <div class="avatar text-center">
                                <div class="avatar-img rounded-circle bg-success"><span
                                        class="text-white position-absolute top-50 start-50 translate-middle fw-bold">SM</span>
                                </div>
                            </div>
                        </div>
                        <!-- Timeline content -->
                        <div class="timeline-content">
                            <div class="d-sm-flex justify-content-between">
                                <div>
                                    <p class="small mb-0"> <b>Sam Lanson</b> liked <b> Frances
                                            Guerrero's </b> add comment.</p>
                                    <p class="small mb-0">This is the best picture I have come across
                                        today.... </p>
                                </div>
                                <p class="small mb-0 ms-sm-3">1hr</p>
                            </div>
                        </div>
                    </div>
                    <!-- Timeline item END -->

                    <!-- Timeline item START -->
                    <div class="timeline-item align-items-center">
                        <!-- Timeline icon -->
                        <div class="timeline-icon">
                            <div class="avatar text-center">
                                <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/02.jpg"
                                    alt="">
                            </div>
                        </div>
                        <!-- Timeline content -->
                        <div class="timeline-content">
                            <div class="d-sm-flex justify-content-between">
                                <div>
                                    <p class="small mb-0"><b>Judy Nguyen</b> likes <b>Jacqueline
                                            Miller</b> Photos. </p>
                                    <p class="mb-0">✌️👌👍</p>
                                </div>
                                <p class="small ms-sm-3 mt-2 mt-sm-0">4hr</p>
                            </div>
                        </div>
                    </div>
                    <!-- Timeline item END -->

                    <!-- Timeline item START -->
                    <div class="timeline-item">
                        <!-- Timeline icon -->
                        <div class="timeline-icon">
                            <div class="avatar text-center">
                                <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/03.jpg"
                                    alt="">
                            </div>
                        </div>
                        <!-- Timeline content -->
                        <div class="timeline-content">
                            <div class="d-sm-flex justify-content-between">
                                <div>
                                    <p class="small mb-0"><b>Larry Lawson</b> </p>
                                    <p class="small mb-2">Replied to your comment on Blogzine blog theme
                                    </p>
                                    <small class="bg-light rounded p-2 d-block">
                                        Yes, I am so excited to see it live. 👍
                                    </small>
                                </div>
                                <p class="small ms-sm-3 mt-2 mt-sm-0">10hr</p>
                            </div>
                        </div>
                    </div>
                    <!-- Timeline item END -->

                </div>
            </div>
            <!-- Card body END -->
            <!-- Card footer START -->
            <div class="card-footer border-0 py-3 text-center position-relative d-grid pt-0">
                <!-- Load more button START -->
                <a href="#!" role="button" class="btn btn-sm btn-loader btn-primary-soft"
                    data-bs-toggle="button" aria-pressed="true">
                    <span class="load-text"> Load more activity </span>
                    <div class="load-icon">
                        <div class="spinner-grow spinner-grow-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </a>
                <!-- Load more button END -->
            </div>
            <!-- Card footer END -->
        </div>
        <!-- Activity feed END -->

    </div>
    <!-- Main content END -->

    <!-- Right sidebar START -->
    <div class="col-lg-4">

        <div class="row g-4">

            <!-- Card START -->
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h5 class="card-title">About</h5>
                        <!-- Button modal -->
                    </div>
                    <!-- Card body START -->
                    <div class="card-body position-relative pt-0">
                        <p>He moonlights difficult engrossed it, sportsmen. Interested has all
                            Devonshire difficulty gay assistance joy.</p>
                        <!-- Date time -->
                        <ul class="list-unstyled mt-3 mb-0">
                            <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born:
                                <strong> October 20, 1990 </strong>
                            </li>
                            <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong>
                                    Single </strong> </li>
                            <li> <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong>
                                    webestica@gmail.com </strong> </li>
                        </ul>
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
            <!-- Card END -->

            <!-- Card START -->
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header d-flex justify-content-between border-0">
                        <h5 class="card-title">Experience</h5>
                        <a class="btn btn-primary-soft btn-sm" href="#!"> <i class="fa-solid fa-plus"></i> </a>
                    </div>
                    <!-- Card header END -->
                    <!-- Card body START -->
                    <div class="card-body position-relative pt-0">
                        <!-- Experience item START -->
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar me-3">
                                <a href="#!"> <img class="avatar-img rounded-circle"
                                        src="{{ asset('app') }}/images/logo/08.svg" alt=""> </a>
                            </div>
                            <!-- Info -->
                            <div>
                                <h6 class="card-title mb-0"><a href="#!"> Apple Computer, Inc. </a></h6>
                                <p class="small">May 2015 – Present Employment Duration 8 mos <a
                                        class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                            </div>
                        </div>
                        <!-- Experience item END -->

                        <!-- Experience item START -->
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar me-3">
                                <a href="#!"> <img class="avatar-img rounded-circle"
                                        src="{{ asset('app') }}/images/logo/09.svg" alt=""> </a>
                            </div>
                            <!-- Info -->
                            <div>
                                <h6 class="card-title mb-0"><a href="#!"> Microsoft Corporation </a>
                                </h6>
                                <p class="small">May 2017 – Present Employment Duration 1 yrs 5 mos <a
                                        class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                            </div>
                        </div>
                        <!-- Experience item END -->

                        <!-- Experience item START -->
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar me-3">
                                <a href="#!"> <img class="avatar-img rounded-circle"
                                        src="{{ asset('app') }}/images/logo/10.svg" alt=""> </a>
                            </div>
                            <!-- Info -->
                            <div>
                                <h6 class="card-title mb-0"><a href="#!"> Tata Consultancy Services.
                                    </a></h6>
                                <p class="small mb-0">May 2022 – Present Employment Duration 6 yrs 10
                                    mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a>
                                </p>
                            </div>
                        </div>
                        <!-- Experience item END -->

                    </div>
                    <!-- Card body END -->
                </div>
            </div>
            <!-- Card END -->

            <!-- Card START -->
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header d-sm-flex justify-content-between border-0">
                        <h5 class="card-title">Photos</h5>
                        <a class="btn btn-primary-soft btn-sm" href="#!"> See all photo</a>
                    </div>
                    <!-- Card header END -->
                    <!-- Card body START -->
                    <div class="card-body position-relative pt-0">
                        <div class="row g-2">
                            <!-- Photos item -->
                            <div class="col-6">
                                <a href="{{ asset('app') }}/images/albums/01.jpg" data-gallery="image-popup"
                                    data-glightbox="">
                                    <img class="rounded img-fluid" src="{{ asset('app') }}/images/albums/01.jpg"
                                        alt="">
                                </a>
                            </div>
                            <!-- Photos item -->
                            <div class="col-6">
                                <a href="{{ asset('app') }}/images/albums/02.jpg" data-gallery="image-popup"
                                    data-glightbox="">
                                    <img class="rounded img-fluid" src="{{ asset('app') }}/images/albums/02.jpg"
                                        alt="">
                                </a>
                            </div>
                            <!-- Photos item -->
                            <div class="col-4">
                                <a href="{{ asset('app') }}/images/albums/03.jpg" data-gallery="image-popup"
                                    data-glightbox="">
                                    <img class="rounded img-fluid" src="{{ asset('app') }}/images/albums/03.jpg"
                                        alt="">
                                </a>
                            </div>
                            <!-- Photos item -->
                            <div class="col-4">
                                <a href="{{ asset('app') }}/images/albums/04.jpg" data-gallery="image-popup"
                                    data-glightbox="">
                                    <img class="rounded img-fluid" src="{{ asset('app') }}/images/albums/04.jpg"
                                        alt="">
                                </a>
                            </div>
                            <!-- Photos item -->
                            <div class="col-4">
                                <a href="{{ asset('app') }}/images/albums/05.jpg" data-gallery="image-popup"
                                    data-glightbox="">
                                    <img class="rounded img-fluid" src="{{ asset('app') }}/images/albums/05.jpg"
                                        alt="">
                                </a>
                                <!-- glightbox Albums left bar END  -->
                            </div>
                        </div>
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
            <!-- Card END -->

            <!-- Card START -->
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                        <h5 class="card-title">Friends <span
                                class="badge bg-danger bg-opacity-10 text-danger">230</span>
                        </h5>
                        <a class="btn btn-primary-soft btn-sm" href="#!"> See all friends</a>
                    </div>
                    <!-- Card header END -->
                    <!-- Card body START -->
                    <div class="card-body position-relative pt-0">
                        <div class="row g-3">

                            <div class="col-6">
                                <!-- Friends item START -->
                                <div class="card shadow-none text-center h-100">
                                    <!-- Card body -->
                                    <div class="card-body p-2 pb-0">
                                        <div class="avatar avatar-story avatar-xl">
                                            <a href="#!"><img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/02.jpg"
                                                    alt=""></a>
                                        </div>
                                        <h6 class="card-title mb-1 mt-3"> <a href="#!"> Amanda Reed </a>
                                        </h6>
                                        <p class="mb-0 small lh-sm">16 mutual connections</p>
                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer p-2 border-0">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Send message"> <i
                                                class="bi bi-chat-left-text"></i> </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Remove friend"> <i
                                                class="bi bi-person-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Friends item END -->
                            </div>

                            <div class="col-6">
                                <!-- Friends item START -->
                                <div class="card shadow-none text-center h-100">
                                    <!-- Card body -->
                                    <div class="card-body p-2 pb-0">
                                        <div class="avatar avatar-xl">
                                            <a href="#!"><img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/03.jpg"
                                                    alt=""></a>
                                        </div>
                                        <h6 class="card-title mb-1 mt-3"> <a href="#!"> Samuel Bishop
                                            </a></h6>
                                        <p class="mb-0 small lh-sm">22 mutual connections</p>
                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer p-2 border-0">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Send message"> <i
                                                class="bi bi-chat-left-text"></i> </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Remove friend"> <i
                                                class="bi bi-person-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Friends item END -->
                            </div>

                            <div class="col-6">
                                <!-- Friends item START -->
                                <div class="card shadow-none text-center h-100">
                                    <!-- Card body -->
                                    <div class="card-body p-2 pb-0">
                                        <div class="avatar avatar-xl">
                                            <a href="#!"><img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/04.jpg"
                                                    alt=""></a>
                                        </div>
                                        <h6 class="card-title mb-1 mt-3"> <a href="#"> Bryan Knight </a>
                                        </h6>
                                        <p class="mb-0 small lh-sm">1 mutual connection</p>
                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer p-2 border-0">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Send message"> <i
                                                class="bi bi-chat-left-text"></i> </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Remove friend"> <i
                                                class="bi bi-person-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Friends item END -->
                            </div>

                            <div class="col-6">
                                <!-- Friends item START -->
                                <div class="card shadow-none text-center h-100">
                                    <!-- Card body -->
                                    <div class="card-body p-2 pb-0">
                                        <div class="avatar avatar-xl">
                                            <a href="#!"><img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/05.jpg"
                                                    alt=""></a>
                                        </div>
                                        <h6 class="card-title mb-1 mt-3"> <a href="#!"> Amanda Reed </a>
                                        </h6>
                                        <p class="mb-0 small lh-sm">15 mutual connections</p>
                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer p-2 border-0">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Send message"> <i
                                                class="bi bi-chat-left-text"></i> </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Remove friend"> <i
                                                class="bi bi-person-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Friends item END -->
                            </div>

                        </div>
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
            <!-- Card END -->
        </div>
    </div>
    <!-- Right sidebar END -->
</x-app-layout>
