<x-app-sidebar-layout>
    <!-- Card START -->
    <div class="card h-100">
        <div class="card-header d-sm-flex align-items-center text-center justify-content-sm-between border-0 pb-0">
            <h1 class="h4 card-title">Discover Events</h1>

            @can(['event.create'])
                <a class="btn btn-primary-soft" href="{{ route('event.create') }}" {{-- data-bs-toggle="modal" data-bs-target="#modalCreateEvents" --}}>
                    <i class="fa-solid fa-plus pe-1"></i>
                    Create event
                </a>
            @endcan
        </div>

        <!-- Card body START -->
        <div class="card-body">
            <!-- Tab nav line -->
            <ul class="nav nav-tabs nav-bottom-line justify-content-center justify-content-md-start">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tab-1">
                        Recent
                    </a>
                </li>
                {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2"> Local
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3"> This
                            week </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-4"> Online
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-5">
                            Friends </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-6">
                            Following </a>
                    </li> --}}
            </ul>

            <div class="tab-content mb-0 pb-0">
                <div class="tab-pane fade show active" id="tab-1">
                    <div class="row g-4">
                        @foreach ($events as $event)
                            <div class="col-sm-6 col-xl-4">
                                <div class="card h-100">
                                    <div class="position-relative">
                                        <a href="{{ route('event.show', ['event' => $event->slug]) }}">
                                            <img class="img-fluid rounded-top"
                                                src="{{ $event->media ?? asset('app') . '/images/events/01.jpg' }}"
                                                alt="">
                                        </a>
                                        <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                                            {{ $event->status ?? 'Active' }}
                                        </div>
                                    </div>
                                    <!-- Card body START -->
                                    <div class="card-body position-relative pt-0">
                                        <!-- Tag -->
                                        <a class="btn btn-xs btn-primary mt-n3"
                                            href="{{ route('event.show', ['event' => $event->slug]) }}">
                                            {{ $event->tag ?? 'Event' }}
                                        </a>
                                        <h6 class="mt-3">
                                            <a href="{{ route('event.show', ['event' => $event->slug]) }}">
                                                {{ Str::limit($event->name, 16) }}
                                            </a>
                                        </h6>

                                        <!-- Date time -->
                                        <p class="mb-0 small">
                                            <i class="bi bi-calendar-check pe-1"></i>
                                            <small>{{ $event->started_at->format('D, M d, Y - h:i A') }}</small>
                                        </p>
                                        <p class="small">
                                            <i class="bi bi-geo-alt pe-1"></i>
                                            {{ $event->location ?? '...' }}
                                        </p>

                                        <!-- Avatar group START -->
                                        <ul class="avatar-group list-unstyled align-items-center mb-0">
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/01.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/03.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/04.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <div class="avatar-img rounded-circle bg-primary"><span
                                                        class="smaller text-white position-absolute top-50 start-50 translate-middle">+78</span>
                                                </div>
                                            </li>
                                            <li class="ms-3">
                                                <small> has voted</small>
                                            </li>
                                        </ul>

                                        <!-- Button -->
                                        <div class="d-flex mt-3 justify-content-between">
                                            <!-- Interested button -->
                                            <div class="w-100">
                                                <input type="checkbox" class="btn-check d-block" id="Interested1">
                                                <label class="btn btn-sm btn-outline-success d-block" for="Interested1">
                                                    <i class="fa-solid fa-user-plus me-1"></i>
                                                    Contest
                                                </label>
                                            </div>
                                            <div class="dropdown ms-3">
                                                <a href="#" class="btn btn-sm btn-primary-soft"
                                                    id="eventActionShare" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-share-fill"></i>
                                                </a>
                                                <!-- Dropdown menu -->
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="eventActionShare">
                                                    {{-- <li>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="bi bi-envelope fa-fw pe-1"></i>
                                                                Send via Direct Message
                                                            </a>
                                                        </li> --}}
                                                    {{-- <li>
                                                            <a class="dropdown-item" href="#"> <i
                                                                    class="bi bi-bookmark-check fa-fw pe-1"></i>
                                                                Share to News Feed </a>
                                                        </li> --}}
                                                    {{-- <li>
                                                            <a class="dropdown-item" href="#"> <i
                                                                    class="bi bi-people fa-fw pe-1"></i>
                                                                Share to a group</a>
                                                        </li> --}}
                                                    {{-- <li>
                                                            <a class="dropdown-item" href="#"> <i
                                                                    class="bi bi-share fa-fw pe-1"></i>
                                                                Share post via …</a>
                                                        </li> --}}
                                                    {{-- <li>
                                                            <hr class="dropdown-divider">
                                                        </li> --}}
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="bi bi-whatsapp fa-fw pe-1"></i>
                                                            WhatsApp
                                                        </a>
                                                    </li>
                                                    {{-- <li>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="bi bi-person fa-fw pe-1"></i>
                                                                Share on a friend's profile
                                                            </a>
                                                        </li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card body END -->
                                </div>
                                <!-- Event item END -->
                            </div>
                        @endforeach

                        {{-- <div class="col-sm-6 col-xl-4">
                                <!-- Event item START -->
                                <div class="card h-100">
                                    <div class="position-relative">
                                        <img class="img-fluid rounded-top"
                                            src="{{ asset('app') }}/images/events/02.jpg" alt="">
                                        <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                                            Hotel
                                        </div>
                                    </div>
                                    <!-- Card body START -->
                                    <div class="card-body position-relative pt-0">
                                        <!-- Tag -->
                                        <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Photography
                                            Workshop</a>
                                        <h6 class="mt-3"> <a href="event-details.html"> Decibel magazine
                                            </a> </h6>
                                        <!-- Date time -->
                                        <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i>
                                            Mon, Aug 10, 2022 at 9:30 AM </p>
                                        <p class="small"> <i class="bi bi-geo-alt pe-1"></i> London </p>
                                        <!-- Avatar group START -->
                                        <ul class="avatar-group list-unstyled align-items-center mb-0">
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/05.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/06.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <div class="avatar-img rounded-circle bg-primary"><span
                                                        class="smaller text-white position-absolute top-50 start-50 translate-middle">+34</span>
                                                </div>
                                            </li>
                                            <li class="ms-3">
                                                <small> are attending</small>
                                            </li>
                                        </ul>
                                        <!-- Avatar group END -->
                                        <!-- Button -->
                                        <div class="d-flex mt-3 justify-content-between">
                                            <!-- Interested button -->
                                            <div class="w-100">
                                                <input type="checkbox" class="btn-check d-block" id="Interested2"
                                                    checked>
                                                <label class="btn btn-sm btn-outline-success d-block"
                                                    for="Interested2"><i class="fa-solid fa-thumbs-up me-1"></i>
                                                    Interested</label>
                                            </div>
                                            <div class="dropdown ms-3">
                                                <a href="#" class="btn btn-sm btn-primary-soft"
                                                    id="eventActionShare2" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-share-fill"></i>
                                                </a>
                                                <!-- Dropdown menu -->
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="eventActionShare2">
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-envelope fa-fw pe-1"></i>
                                                            Send via Direct Message</a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-bookmark-check fa-fw pe-1"></i>
                                                            Share to News Feed </a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-people fa-fw pe-1"></i>
                                                            Share to a group</a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-share fa-fw pe-1"></i>
                                                            Share post via …</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-person fa-fw pe-1"></i>
                                                            Share on a friend's profile</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card body END -->
                                </div>
                                <!-- Event item END -->
                            </div> --}}

                        {{-- <div class="col-sm-6 col-xl-4">
                                <!-- Event item START -->
                                <div class="card h-100">
                                    <div class="position-relative">
                                        <img class="img-fluid rounded-top"
                                            src="{{ asset('app') }}/images/events/03.jpg" alt="">
                                        <div
                                            class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                                            Online
                                        </div>
                                    </div>
                                    <!-- Card body START -->
                                    <div class="card-body position-relative pt-0">
                                        <!-- Tag -->
                                        <a class="btn btn-xs btn-primary mt-n3"
                                            href="event-details.html">Conference</a>
                                        <h6 class="mt-3"> <a href="event-details.html"> Illenium: fallen
                                                embers tour </a> </h6>
                                        <!-- Date time -->
                                        <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i>
                                            Sun, Sep 23, 2022 at 12:00 PM </p>
                                        <p class="small"> <i class="bi bi-geo-alt pe-1"></i> Mumbai </p>
                                        <!-- Avatar group START -->
                                        <ul class="avatar-group list-unstyled align-items-center mb-0">
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/06.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/07.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/08.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/09.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <div class="avatar-img rounded-circle bg-primary"><span
                                                        class="smaller text-white position-absolute top-50 start-50 translate-middle">+65</span>
                                                </div>
                                            </li>
                                            <li class="ms-3">
                                                <small> are attending</small>
                                            </li>
                                        </ul>
                                        <!-- Avatar group END -->
                                        <!-- Button -->
                                        <div class="d-flex mt-3 justify-content-between">
                                            <!-- Interested button -->
                                            <div class="w-100">
                                                <input type="checkbox" class="btn-check d-block" id="Interested3">
                                                <label class="btn btn-sm btn-outline-success d-block"
                                                    for="Interested3"><i class="fa-solid fa-thumbs-up me-1"></i>
                                                    Interested</label>
                                            </div>
                                            <div class="dropdown ms-3">
                                                <a href="#" class="btn btn-sm btn-primary-soft"
                                                    id="eventActionShare3" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-share-fill"></i>
                                                </a>
                                                <!-- Dropdown menu -->
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="eventActionShare3">
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-envelope fa-fw pe-1"></i>
                                                            Send via Direct Message</a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-bookmark-check fa-fw pe-1"></i>
                                                            Share to News Feed </a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-people fa-fw pe-1"></i>
                                                            Share to a group</a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-share fa-fw pe-1"></i>
                                                            Share post via …</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-person fa-fw pe-1"></i>
                                                            Share on a friend's profile</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card body END -->
                                </div>
                                <!-- Event item END -->
                            </div> --}}

                        {{-- <div class="col-sm-6 col-xl-4">
                                <!-- Event item START -->
                                <div class="card h-100">
                                    <div class="position-relative">
                                        <img class="img-fluid rounded-top"
                                            src="{{ asset('app') }}/images/events/04.jpg" alt="">
                                    </div>
                                    <!-- Card body START -->
                                    <div class="card-body position-relative pt-0">
                                        <!-- Tag -->
                                        <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Live
                                            show</a>
                                        <h6 class="mt-3"> <a href="event-details.html"> Comedy on the
                                                green </a> </h6>
                                        <!-- Date time -->
                                        <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i>
                                            Fri, Oct 05, 2022 at 1:00 AM </p>
                                        <p class="small"> <i class="bi bi-geo-alt pe-1"></i> Miami </p>
                                        <!-- Avatar group START -->
                                        <ul class="avatar-group list-unstyled align-items-center mb-0">
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/06.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/02.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/04.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <div class="avatar-img rounded-circle bg-primary"><span
                                                        class="smaller text-white position-absolute top-50 start-50 translate-middle">+56</span>
                                                </div>
                                            </li>
                                            <li class="ms-3">
                                                <small> are attending</small>
                                            </li>
                                        </ul>
                                        <!-- Avatar group END -->
                                        <!-- Button -->
                                        <div class="d-flex mt-3 justify-content-between">
                                            <!-- Interested button -->
                                            <div class="w-100">
                                                <input type="checkbox" class="btn-check d-block" id="Interested4"
                                                    checked>
                                                <label class="btn btn-sm btn-outline-success d-block"
                                                    for="Interested4"><i class="fa-solid fa-thumbs-up me-1"></i>
                                                    Interested</label>
                                            </div>
                                            <div class="dropdown ms-3">
                                                <a href="#" class="btn btn-sm btn-primary-soft"
                                                    id="eventActionShare4" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-share-fill"></i>
                                                </a>
                                                <!-- Dropdown menu -->
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="eventActionShare4">
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-envelope fa-fw pe-1"></i>
                                                            Send via Direct Message</a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-bookmark-check fa-fw pe-1"></i>
                                                            Share to News Feed </a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-people fa-fw pe-1"></i>
                                                            Share to a group</a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-share fa-fw pe-1"></i>
                                                            Share post via …</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-person fa-fw pe-1"></i>
                                                            Share on a friend's profile</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card body END -->
                                </div>
                                <!-- Event item END -->
                            </div> --}}

                        {{-- <div class="col-sm-6 col-xl-4">
                                <!-- Event item START -->
                                <div class="card h-100">
                                    <div class="position-relative">
                                        <img class="img-fluid rounded-top"
                                            src="{{ asset('app') }}/images/events/05.jpg" alt="">
                                        <div
                                            class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                                            Beach
                                        </div>
                                    </div>
                                    <!-- Card body START -->
                                    <div class="card-body position-relative pt-0">
                                        <!-- Tag -->
                                        <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Meeting</a>
                                        <h6 class="mt-3"> <a href="event-details.html"> Beach event </a>
                                        </h6>
                                        <!-- Date time -->
                                        <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i>
                                            Wen, Dec 16, 2022 at 5:00 AM </p>
                                        <p class="small"> <i class="bi bi-geo-alt pe-1"></i> London </p>
                                        <!-- Avatar group START -->
                                        <ul class="avatar-group list-unstyled align-items-center mb-0">
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/05.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('app') }}/images/avatar/06.jpg" alt="avatar">
                                            </li>
                                            <li class="avatar avatar-xs">
                                                <div class="avatar-img rounded-circle bg-primary"><span
                                                        class="smaller text-white position-absolute top-50 start-50 translate-middle">+36</span>
                                                </div>
                                            </li>
                                            <li class="ms-3">
                                                <small> are attending</small>
                                            </li>
                                        </ul>
                                        <!-- Avatar group END -->
                                        <!-- Button -->
                                        <div class="d-flex mt-3 justify-content-between">
                                            <!-- Interested button -->
                                            <div class="w-100">
                                                <input type="checkbox" class="btn-check d-block" id="Interested5">
                                                <label class="btn btn-sm btn-outline-success d-block"
                                                    for="Interested5"><i class="fa-solid fa-thumbs-up me-1"></i>
                                                    Interested</label>
                                            </div>
                                            <div class="dropdown ms-3">
                                                <a href="#" class="btn btn-sm btn-primary-soft"
                                                    id="eventActionShare5" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-share-fill"></i>
                                                </a>
                                                <!-- Dropdown menu -->
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="eventActionShare5">
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-envelope fa-fw pe-1"></i>
                                                            Send via Direct Message</a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-bookmark-check fa-fw pe-1"></i>
                                                            Share to News Feed </a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-people fa-fw pe-1"></i>
                                                            Share to a group</a></li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-share fa-fw pe-1"></i>
                                                            Share post via …</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"> <i
                                                                class="bi bi-person fa-fw pe-1"></i>
                                                            Share on a friend's profile</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card body END -->
                                </div>
                                <!-- Event item END -->
                            </div> --}}
                    </div>
                </div>
                <!-- Event top tab END -->

                <!-- Event local tab START -->
                <div class="tab-pane fade" id="tab-2">
                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-4">
                            <!-- Event item START -->
                            <div class="card h-100">
                                <div class="position-relative">
                                    <img class="img-fluid rounded-top" src="{{ asset('app') }}/images/events/04.jpg"
                                        alt="">
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <!-- Tag -->
                                    <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Live
                                        show</a>
                                    <h6 class="mt-3"> <a href="event-details.html"> America 50th
                                            anniversary </a> </h6>
                                    <!-- Date time -->
                                    <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i>
                                        Fri, Oct 05, 2022 at 1:00 AM </p>
                                    <p class="small"> <i class="bi bi-geo-alt pe-1"></i> Miami </p>
                                    <!-- Avatar group START -->
                                    <ul class="avatar-group list-unstyled align-items-center mb-0">
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/06.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/02.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/04.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <div class="avatar-img rounded-circle bg-primary"><span
                                                    class="smaller text-white position-absolute top-50 start-50 translate-middle">+20</span>
                                            </div>
                                        </li>
                                        <li class="ms-3">
                                            <small> are attending</small>
                                        </li>
                                    </ul>
                                    <!-- Avatar group END -->
                                    <!-- Button -->
                                    <div class="d-flex mt-3 justify-content-between">
                                        <!-- Interested button -->
                                        <div class="w-100">
                                            <input type="checkbox" class="btn-check d-block" id="Interested6"
                                                checked>
                                            <label class="btn btn-sm btn-outline-success d-block" for="Interested6"><i
                                                    class="fa-solid fa-thumbs-up me-1"></i>
                                                Interested</label>
                                        </div>
                                        <div class="dropdown ms-3">
                                            <a href="#" class="btn btn-sm btn-primary-soft"
                                                id="eventActionShare6" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-share-fill"></i>
                                            </a>
                                            <!-- Dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="eventActionShare6">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-envelope fa-fw pe-1"></i>
                                                        Send via Direct Message</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-bookmark-check fa-fw pe-1"></i>
                                                        Share to News Feed </a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-people fa-fw pe-1"></i>
                                                        Share to a group</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-share fa-fw pe-1"></i>
                                                        Share post via …</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-person fa-fw pe-1"></i>
                                                        Share on a friend's profile</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card body END -->
                            </div>
                            <!-- Event item END -->
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <!-- Event item START -->
                            <div class="card h-100">
                                <div class="position-relative">
                                    <img class="img-fluid rounded-top" src="{{ asset('app') }}/images/events/05.jpg"
                                        alt="">
                                    <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                                        Beach
                                    </div>
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <!-- Tag -->
                                    <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Meeting</a>
                                    <h6 class="mt-3"> <a href="event-details.html"> Back to abnormal
                                        </a> </h6>
                                    <!-- Date time -->
                                    <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i>
                                        Wen, Dec 16, 2022 at 5:00 AM </p>
                                    <p class="small"> <i class="bi bi-geo-alt pe-1"></i> London </p>
                                    <!-- Avatar group START -->
                                    <ul class="avatar-group list-unstyled align-items-center mb-0">
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/05.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/06.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <div class="avatar-img rounded-circle bg-primary"><span
                                                    class="smaller text-white position-absolute top-50 start-50 translate-middle">+45</span>
                                            </div>
                                        </li>
                                        <li class="ms-3">
                                            <small> are attending</small>
                                        </li>
                                    </ul>
                                    <!-- Avatar group END -->
                                    <!-- Button -->
                                    <div class="d-flex mt-3 justify-content-between">
                                        <!-- Interested button -->
                                        <div class="w-100">
                                            <input type="checkbox" class="btn-check d-block" id="Interested7">
                                            <label class="btn btn-sm btn-outline-success d-block" for="Interested7"><i
                                                    class="fa-solid fa-thumbs-up me-1"></i>
                                                Interested</label>
                                        </div>
                                        <div class="dropdown ms-3">
                                            <a href="#" class="btn btn-sm btn-primary-soft"
                                                id="eventActionShare7" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-share-fill"></i>
                                            </a>
                                            <!-- Dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="eventActionShare7">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-envelope fa-fw pe-1"></i>
                                                        Send via Direct Message</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-bookmark-check fa-fw pe-1"></i>
                                                        Share to News Feed </a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-people fa-fw pe-1"></i>
                                                        Share to a group</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-share fa-fw pe-1"></i>
                                                        Share post via …</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-person fa-fw pe-1"></i>
                                                        Share on a friend's profile</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card body END -->
                            </div>
                            <!-- Event item END -->
                        </div>
                    </div>
                </div>
                <!-- Event local tab END -->

                <!-- Event This week tab START -->
                <div class="tab-pane fade" id="tab-3">
                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-4">
                            <!-- Event item START -->
                            <div class="card h-100">
                                <div class="position-relative">
                                    <img class="img-fluid rounded-top" src="{{ asset('app') }}/images/events/03.jpg"
                                        alt="">
                                    <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                                        Beach
                                    </div>
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <!-- Tag -->
                                    <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Meeting</a>
                                    <h6 class="mt-3"> <a href="event-details.html"> Old dominion
                                        </a> </h6>
                                    <!-- Date time -->
                                    <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i>
                                        Wen, Dec 16, 2022 at 5:00 AM </p>
                                    <p class="small"> <i class="bi bi-geo-alt pe-1"></i> London </p>
                                    <!-- Avatar group START -->
                                    <ul class="avatar-group list-unstyled align-items-center mb-0">
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/05.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/06.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <div class="avatar-img rounded-circle bg-primary"><span
                                                    class="smaller text-white position-absolute top-50 start-50 translate-middle">+85</span>
                                            </div>
                                        </li>
                                        <li class="ms-3">
                                            <small> are attending</small>
                                        </li>
                                    </ul>
                                    <!-- Avatar group END -->
                                    <!-- Button -->
                                    <div class="d-flex mt-3 justify-content-between">
                                        <!-- Interested button -->
                                        <div class="w-100">
                                            <input type="checkbox" class="btn-check d-block" id="Interested8">
                                            <label class="btn btn-sm btn-outline-success d-block" for="Interested8"><i
                                                    class="fa-solid fa-thumbs-up me-1"></i>
                                                Interested</label>
                                        </div>
                                        <div class="dropdown ms-3">
                                            <a href="#" class="btn btn-sm btn-primary-soft"
                                                id="eventActionShare8" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-share-fill"></i>
                                            </a>
                                            <!-- Dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="eventActionShare8">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-envelope fa-fw pe-1"></i>
                                                        Send via Direct Message</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-bookmark-check fa-fw pe-1"></i>
                                                        Share to News Feed </a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-people fa-fw pe-1"></i>
                                                        Share to a group</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-share fa-fw pe-1"></i>
                                                        Share post via …</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-person fa-fw pe-1"></i>
                                                        Share on a friend's profile</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card body END -->
                            </div>
                            <!-- Event item END -->
                        </div>
                    </div>
                </div>
                <!-- Event This week tab END -->

                <!-- Event Online tab START -->
                <div class="tab-pane fade" id="tab-4">
                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-4">
                            <!-- Event item START -->
                            <div class="card h-100">
                                <div class="position-relative">
                                    <img class="img-fluid rounded-top" src="{{ asset('app') }}/images/events/01.jpg"
                                        alt="">
                                    <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                                        Online
                                    </div>
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <!-- Tag -->
                                    <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Spa training
                                    </a>
                                    <h6 class="mt-3"> <a href="event-details.html"> Beach event </a>
                                    </h6>
                                    <!-- Date time -->
                                    <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i>
                                        Mon, Sep 25, 2020 at 9:30 AM </p>
                                    <p class="small"> <i class="bi bi-geo-alt pe-1"></i> San
                                        francisco </p>
                                    <!-- Avatar group START -->
                                    <ul class="avatar-group list-unstyled align-items-center mb-0">
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/01.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/03.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/04.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <div class="avatar-img rounded-circle bg-primary"><span
                                                    class="smaller text-white position-absolute top-50 start-50 translate-middle">+46</span>
                                            </div>
                                        </li>
                                        <li class="ms-3">
                                            <small> are attending</small>
                                        </li>
                                    </ul>
                                    <!-- Avatar group END -->
                                    <!-- Button -->
                                    <div class="d-flex mt-3 justify-content-between">
                                        <!-- Interested button -->
                                        <div class="w-100">
                                            <input type="checkbox" class="btn-check d-block" id="Interested9"
                                                checked>
                                            <label class="btn btn-sm btn-outline-success d-block" for="Interested9"><i
                                                    class="fa-solid fa-thumbs-up me-1"></i>
                                                Interested</label>
                                        </div>
                                        <div class="dropdown ms-3">
                                            <a href="#" class="btn btn-sm btn-primary-soft"
                                                id="eventActionShare9" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-share-fill"></i>
                                            </a>
                                            <!-- Dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="eventActionShare9">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-envelope fa-fw pe-1"></i>
                                                        Send via Direct Message</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-bookmark-check fa-fw pe-1"></i>
                                                        Share to News Feed </a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-people fa-fw pe-1"></i>
                                                        Share to a group</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-share fa-fw pe-1"></i>
                                                        Share post via …</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-person fa-fw pe-1"></i>
                                                        Share on a friend's profile</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card body END -->
                            </div>
                            <!-- Event item END -->
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <!-- Event item START -->
                            <div class="card h-100">
                                <div class="position-relative">
                                    <img class="img-fluid rounded-top" src="{{ asset('app') }}/images/events/04.jpg"
                                        alt="">
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <!-- Tag -->
                                    <a class="btn btn-xs btn-primary mt-n3" href="event-details.html">Live
                                        show</a>
                                    <h6 class="mt-3"> <a href="event-details.html"> Lewis black
                                            tickets </a> </h6>
                                    <!-- Date time -->
                                    <p class="mb-0 small"> <i class="bi bi-calendar-check pe-1"></i>
                                        Fri, Oct 05, 2022 at 1:00 AM </p>
                                    <p class="small"> <i class="bi bi-geo-alt pe-1"></i> Miami </p>
                                    <!-- Avatar group START -->
                                    <ul class="avatar-group list-unstyled align-items-center mb-0">
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/06.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/02.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('app') }}/images/avatar/04.jpg" alt="avatar">
                                        </li>
                                        <li class="avatar avatar-xs">
                                            <div class="avatar-img rounded-circle bg-primary"><span
                                                    class="smaller text-white position-absolute top-50 start-50 translate-middle">+75</span>
                                            </div>
                                        </li>
                                        <li class="ms-3">
                                            <small> are attending</small>
                                        </li>
                                    </ul>
                                    <!-- Avatar group END -->
                                    <!-- Button -->
                                    <div class="d-flex mt-3 justify-content-between">
                                        <!-- Interested button -->
                                        <div class="w-100">
                                            <input type="checkbox" class="btn-check d-block" id="Interested10">
                                            <label class="btn btn-sm btn-outline-success d-block"
                                                for="Interested10"><i class="fa-solid fa-thumbs-up me-1"></i>
                                                Interested</label>
                                        </div>
                                        <div class="dropdown ms-3">
                                            <a href="#" class="btn btn-sm btn-primary-soft"
                                                id="eventActionShare10" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-share-fill"></i>
                                            </a>
                                            <!-- Dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="eventActionShare10">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-envelope fa-fw pe-1"></i>
                                                        Send via Direct Message</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-bookmark-check fa-fw pe-1"></i>
                                                        Share to News Feed </a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-people fa-fw pe-1"></i>
                                                        Share to a group</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-share fa-fw pe-1"></i>
                                                        Share post via …</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-person fa-fw pe-1"></i>
                                                        Share on a friend's profile</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card body END -->
                            </div>
                            <!-- Event item END -->
                        </div>
                    </div>
                </div>
                <!-- Event Online tab END -->

                <!-- Event Friends tab START -->
                <div class="tab-pane fade text-center" id="tab-5">
                    <!-- Add events -->
                    <div class="my-sm-5 py-sm-5">
                        <i class="display-1 text-muted bi bi-calendar2-event"> </i>
                        <h4 class="mt-2 mb-3 text-body">No events found</h4>
                        <button class="btn btn-primary-soft btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalCreateEvents"> Click here to add </button>
                    </div>
                </div>
                <!-- Event Friends tab END -->

                <!-- Event Following tab START -->
                <div class="tab-pane fade text-center" id="tab-6">
                    <!-- Add events -->
                    <div class="my-sm-5 py-sm-5">
                        <i class="display-1 text-muted bi bi-calendar2-event"> </i>
                        <h4 class="mt-2 mb-3 text-body">No events found</h4>
                        <button class="btn btn-primary-soft btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalCreateEvents"> Click here to add </button>
                    </div>
                </div>
                <!-- Event Following tab END -->
            </div>
            <!-- Tab content END -->
        </div>
        <!-- Card body END -->
    </div>
</x-app-sidebar-layout>
