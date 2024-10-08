<x-app-layout>
    <livewire:contestant.show :contestant="$contestant" />

    <div class="col-lg-4">
        <div class="row g-4">
            <!-- About -->
            <div class="_col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header _border-0 pb-0">
                        <h5 class="_card-title">
                            <a class="text-secondary"
                                href="{{ route('event.show', ['event' => $contestant->event->slug]) }}">
                                <i class="fas fa-trophy me-1"></i>
                                {{ $contestant->event->name }}
                            </a>
                        </h5>
                    </div>

                    <div class="card-body position-relative pt-0">
                        {{-- <strong class="card-subtitle d-block border-bottom">

                        </strong> --}}
                        <!-- More Details -->
                        <p>{{ $contestant->event->about ?? '... more details coming soon!' }}</p>

                        <!-- Date time -->
                        <ul class="list-unstyled mt-3 mb-0">
                            <li class="mb-2">
                                <i class="bi bi-calendar-date fa-fw pe-1"></i>
                                Started: <strong>{{ $contestant->event->started_at->format('M d, Y') }}</strong>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-calendar-date fa-fw pe-1"></i>
                                Ending: <strong>{{ $contestant->event->ended_at->format('M d, Y') }}</strong>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-people fa-fw pe-1"></i>
                                Contestants:
                                <strong>{{ $contestant->event->contestants->count() }}</strong>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-heart fa-fw pe-1"></i>
                                Votes:
                                <strong>{{ $contestant->event->votes->where('active', 1)->sum('total') }}</strong>
                            </li>
                            {{-- <li>
                                <i class="bi bi-envelope fa-fw pe-1"></i>
                                Share: <strong>webestica@gmail.com </strong>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Photo -->
            <div class="_col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header d-sm-flex justify-content-between border-0">
                        <h5 class="card-title">Photo</h5>
                        <a class="btn btn-primary-soft btn-sm"
                            href="{{ route('event.show', ['event' => $contestant->event->slug]) }}"> See all photo</a>
                    </div>

                    <div class="card-body position-relative pt-0">
                        <div class="row g-2">
                            <div class="col-12">
                                <a href="{{ $contestant->media->first()->getUrl() }}" data-gallery="image-popup"
                                    data-glightbox="">
                                    <img class="rounded img-fluid" src="{{ $contestant->media->first()->getUrl() }}"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card START -->
            <div class="col-sm-6 col-lg-12 d-none">
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
            <div class="col-sm-6 col-lg-12 d-none">
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
            <div class="col-sm-6 col-lg-12 d-none">
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
</x-app-layout>
