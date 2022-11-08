<x-app-sidebar-layout>
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
                    <a class="btn btn-primary" href="#!">
                        <i class="fas fa-user-plus me-1"></i>
                        Contest
                    </a>
                </div>
            </div>
        </div>

        <div class="card card-body">
            {{-- <div class="row g-4">
                <!-- info -->
                @isset($event->description)
                    <div class="col-12">
                        <p class="mb-0">
                            {!! $event->description ?? '' !!}
                        </p>
                    </div>
                @endisset

                <!-- Timings -->
                <div class="col-sm-6 col-lg-4">
                    <h5>Timings</h5>
                    <p class="small mb-0">
                        <!-- Date -->
                        {{ $event->start_at->format('D, M d') }} &middot;
                        <!-- Time -->
                        {{ $event->start_at->format('h:i A') }}
                    </p>
                    <p class="small mb-0">
                        <!-- Date -->
                        {{ $event->end_at->format('D, M d') }} &middot;
                        <!-- Time -->
                        {{ $event->end_at->format('h:i A') }}
                    </p>
                </div>

                <!-- Entry Fees -->
                <div class="col-sm-6 col-lg-4">
                    <h5>Entry fees</h5>
                    <p class="_small mb-0">
                        <big class="">{{ $event->currency ?? 'N' }} {{ $event->entry_fee ?? '0.00' }} </big>
                    </p>
                </div>

                <!-- Interested -->
                <div class="col-sm-6 col-lg-4">
                    <div class="d-flex">
                        <h6><i class="fas fa-users text-success"></i> 99+</h6>
                        <p class="small">People have shown interest recently</p>
                    </div>
                </div>
            </div>
            <hr class="mt-4"> --}}

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h5>Attendees</h5>
                    <!-- Avatar group START -->
                    <ul class="avatar-group list-unstyled align-items-center">
                        <li class="avatar avatar-xs">
                            <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/01.jpg"
                                alt="avatar">
                        </li>
                        <li class="avatar avatar-xs">
                            <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/03.jpg"
                                alt="avatar">
                        </li>
                        <li class="avatar avatar-xs">
                            <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/04.jpg"
                                alt="avatar">
                        </li>
                        <li class="avatar avatar-xs">
                            <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/05.jpg"
                                alt="avatar">
                        </li>
                        <li class="avatar avatar-xs">
                            <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/06.jpg"
                                alt="avatar">
                        </li>
                        <li class="ms-4">
                            <small> 148.9K people responded</small>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6">
                    <!-- Avatar group END -->
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <!-- Registred -->
                            <div class="d-flex">
                                <i class="bi bi-person-plus fs-4"></i>
                                <div class="ms-3">
                                    <h5 class="mb-0">356</h5>
                                    <p class="mb-0">Registred</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <!-- Visitors -->
                            <div class="d-flex">
                                <i class="bi bi-globe fs-4"></i>
                                <div class="ms-3">
                                    <h5 class="mb-0">125</h5>
                                    <p class="mb-0">Visitors</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <!-- Attendance -->
                            <div class="d-flex">
                                <i class="bi bi-people fs-4"></i>
                                <div class="ms-3">
                                    <h5 class="mb-0">350</h5>
                                    <p class="mb-0">Attendance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            {{-- @foreach ($events as $event) --}}
            <div class="col-sm-6 col-xl-4">
                <div class="card h-100">
                    <div class="position-relative">
                        <a href="{{ route('office.event.show', ['event' => $event->slug]) }}">
                            <img class="img-fluid rounded-top"
                                src="{{ $event->media ?? asset('app') . '/images/events/01.jpg' }}" alt="">
                        </a>
                        {{-- <div class="badge bg-danger text-white mt-2 me-2 position-absolute top-0 end-0">
                            {{ $event->status ?? 'Active' }}
                        </div> --}}
                    </div>
                    <!-- Card body START -->
                    <div class="card-body position-relative pt-0">
                        <!-- Tag -->
                        <a class="btn btn-xs btn-primary mt-n3"
                            href="{{ route('office.event.show', ['event' => $event->slug]) }}">
                            {{ $event->tag ?? '#123456' }}
                        </a>
                        <h6 class="mt-3">
                            <a href="{{ route('office.event.show', ['event' => $event->slug]) }}">
                                {{ Str::limit($event->name, 16) }}
                            </a>
                        </h6>

                        <!-- Date time -->
                        {{-- <p class="mb-0 small">
                            <i class="bi bi-calendar-check pe-1"></i>
                            <small>{{ $event->start_at->format('D, M d, Y - h:i A') }}</small>
                        </p>
                        <p class="small">
                            <i class="bi bi-geo-alt pe-1"></i>
                            {{ $event->location ?? '...' }}
                        </p> --}}

                        <!-- Avatar group START -->
                        {{-- <ul class="avatar-group list-unstyled align-items-center mb-0">
                            <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/01.jpg"
                                    alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/03.jpg"
                                    alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="{{ asset('app') }}/images/avatar/04.jpg"
                                    alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                                <div class="avatar-img rounded-circle bg-primary"><span
                                        class="smaller text-white position-absolute top-50 start-50 translate-middle">+78</span>
                                </div>
                            </li>
                            <li class="ms-3">
                                <small> has voted</small>
                            </li>
                        </ul> --}}

                        <!-- Button -->
                        <div class="d-flex mt-3 justify-content-between">
                            <!-- Interested button -->
                            <div class="w-100">
                                <input type="checkbox" class="btn-check d-block" id="Interested1">
                                <label class="btn btn-sm btn-outline-success d-block" for="Interested1">
                                    <i class="bi bi-hand-thumbs-up-fill me-1"></i>
                                    Vote
                                </label>
                            </div>

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
            {{-- @endforeach --}}
        </div>

        {{-- <div class="row g-4">
            <div class="col-lg-6">
                <!-- Card START -->
                <div class="card">
                    <div class="card-header border-0">
                        <h5 class="card-title">Related events</h5>
                        <!-- Button modal -->
                    </div>
                    <!-- Card body START -->
                    <div class="card-body pt-0">
                        <!-- Related events item -->
                        <div class="d-sm-flex flex-wrap align-items-center mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-md">
                                <img class="avatar-img rounded-circle border border-white border-3"
                                    src="{{ asset('app') }}/images/logo/01.svg" alt="">
                            </div>
                            <!-- info -->
                            <div class="ms-sm-2 my-2 my-sm-0">
                                <h6 class="mb-0">Bone thugs-n-harmony</h6>
                                <p class="small mb-0"> <i class="bi bi-geo-alt pe-1"></i>San francisco
                                </p>
                            </div>
                            <!-- Button -->
                            <div class="ms-sm-auto mt-2 mt-sm-0">
                                <!-- Interested button -->
                                <input type="checkbox" class="btn-check" id="Interested1">
                                <label class="btn btn-sm btn-outline-success" for="Interested1"><i
                                        class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                        </div>
                        <!-- Related events item -->
                        <div class="d-sm-flex flex-wrap align-items-center mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-md">
                                <img class="avatar-img rounded-circle border border-white border-3"
                                    src="{{ asset('app') }}/images/logo/02.svg" alt="">
                            </div>
                            <!-- info -->
                            <div class="ms-sm-2 my-2 my-sm-0">
                                <h6 class="mb-0">Decibel magazine</h6>
                                <p class="small mb-0"> <i class="bi bi-geo-alt pe-1"></i>London </p>
                            </div>
                            <!-- Button -->
                            <div class="ms-sm-auto mt-2 mt-sm-0">
                                <!-- Interested button -->
                                <input type="checkbox" class="btn-check" id="Interested2">
                                <label class="btn btn-sm btn-outline-success" for="Interested2"><i
                                        class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                        </div>
                        <!-- Related events item -->
                        <div class="d-sm-flex flex-wrap align-items-center mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-md">
                                <img class="avatar-img rounded-circle border border-white border-3"
                                    src="{{ asset('app') }}/images/logo/06.svg" alt="">
                            </div>
                            <!-- info -->
                            <div class="ms-sm-2 my-2 my-sm-0">
                                <h6 class="mb-0">Illenium: fallen embers</h6>
                                <p class="small mb-0"> <i class="bi bi-geo-alt pe-1"></i>Mumbai </p>
                            </div>
                            <!-- Button -->
                            <div class="ms-sm-auto mt-2 mt-sm-0">
                                <!-- Interested button -->
                                <input type="checkbox" class="btn-check" id="Interested3" checked>
                                <label class="btn btn-sm btn-outline-success" for="Interested3"><i
                                        class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                        </div>
                        <!-- Related events item -->
                        <div class="d-sm-flex flex-wrap align-items-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-md">
                                <img class="avatar-img rounded-circle border border-white border-3"
                                    src="{{ asset('app') }}/images/logo/04.svg" alt="">
                            </div>
                            <!-- info -->
                            <div class="ms-sm-2 my-2 my-sm-0">
                                <h6 class="mb-0">Comedy on the green</h6>
                                <p class="small mb-0"> <i class="bi bi-geo-alt pe-1"></i>Miami </p>
                            </div>
                            <!-- Button -->
                            <div class="ms-sm-auto mt-2 mt-sm-0">
                                <!-- Interested button -->
                                <input type="checkbox" class="btn-check" id="Interested4">
                                <label class="btn btn-sm btn-outline-success" for="Interested4"><i
                                        class="fa-solid fa-thumbs-up me-1"></i> Interested</label>
                            </div>
                        </div>
                    </div>
                    <!-- Card body END -->
                </div>
                <!-- Card END -->
            </div>
            <div class="col-lg-6">
                <!-- Card START -->
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h5 class="card-title mb-0">Event location</h5>
                        <p class="small"> <i class="bi bi-geo-alt pe-1"></i>750 Sing Sing Rd,
                            Horseheads, NY, 14845 </p>
                        <!-- Button modal -->
                    </div>
                    <!-- Card body START -->
                    <div class="card-body pt-0">
                        <!-- Google map -->
                        <iframe class="w-100 d-block rounded-bottom grayscale" height="230"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878428698!3d40.74076684379132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bf5c1654f3%3A0xc80f9cfce5383d5d!2sGoogle!5e0!3m2!1sen!2sin!4v1586000412513!5m2!1sen!2sin"
                            style="border:0;" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <!-- Card body END -->
                </div>
                <!-- Card END -->
            </div>
        </div> --}}
    </div>
</x-app-sidebar-layout>
