<div>
    <!-- Advanced filter responsive toggler START -->
    <div class="d-flex align-items-center d-lg-none">
        <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
            <i class="btn btn-primary fw-bold fa-solid fa-sliders-h"></i>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
        </button>
    </div>

    <!-- Navbar START-->
    <nav class="navbar navbar-expand-lg mx-0">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
            <!-- Offcanvas header -->
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>

            <!-- Offcanvas body -->
            <div class="offcanvas-body d-block px-2 px-lg-0">
                <!-- Card START -->
                <div class="card overflow-hidden">
                    <!-- Cover image -->
                    <div class="h-50px"
                        style="background-image:url({{ asset('app') }}/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                    </div>

                    <!-- Card body START -->
                    <div class="card-body pt-0">
                        @auth
                            <div class="text-center">
                                <!-- Avatar -->
                                <div class="avatar avatar-lg mt-n5 mb-3">
                                    <a href="#!">
                                        <img class="avatar-img rounded border border-white border-3"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="">
                                    </a>
                                </div>

                                <!-- Info -->
                                <h5 class="mb-0">
                                    <a href="#!">
                                        {{ request()->user()->first_name }} {{ request()->user()->last_name }}
                                    </a>
                                </h5>
                                <small>{{ request()->user()->username ?? 'User' }}</small>

                                @isset(request()->user->about)
                                    <p class="mt-3">{{ request()->user->about ?? '' }}</p>
                                @endisset

                                <!-- User stat START -->
                                <div class="hstack gap-2 gap-xl-3 justify-content-center">
                                    <!-- User stat item -->
                                    <div>
                                        <h6 class="mb-0">0</h6>
                                        <small>Voted</small>
                                    </div>
                                    <!-- Divider -->
                                    <div class="vr"></div>
                                    <!-- User stat item -->
                                    <div>
                                        <h6 class="mb-0">0</h6>
                                        <small>Contested</small>
                                    </div>
                                    <!-- Divider -->
                                    {{-- <div class="vr"></div>
                                <!-- User stat item -->
                                <div>
                                    <h6 class="mb-0">365</h6>
                                    <small>Following</small>
                                </div> --}}
                                </div>
                                <!-- User stat END -->
                            </div>

                            <!-- Divider -->
                            <hr>

                        @endauth
                        <!-- Side Nav START -->
                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="my-profile.html"> <img class="me-2 h-20px fa-fw"
                                        src="/app/images/icon/home-outline-filled.svg" alt=""><span>Feed
                                    </span></a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="my-profile-connections.html"> <img class="me-2 h-20px fa-fw"
                                        src="/app/images/icon/person-outline-filled.svg"
                                        alt=""><span>Connections </span></a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="blog.html"> <img class="me-2 h-20px fa-fw"
                                        src="/app/images/icon/earth-outline-filled.svg" alt=""><span>Latest
                                        News </span></a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('event.index') }}">
                                    <img class="me-2 h-20px fa-fw" src="/app/images/icon/calendar-outline-filled.svg"
                                        alt="">
                                    <span>Events</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="groups.html"> <img class="me-2 h-20px fa-fw"
                                        src="/app/images/icon/chat-outline-filled.svg" alt=""><span>Groups
                                    </span></a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="notifications.html"> <img class="me-2 h-20px fa-fw"
                                        src="/app/images/icon/notification-outlined-filled.svg"
                                        alt=""><span>Notifications </span></a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="settings.html"> <img class="me-2 h-20px fa-fw"
                                        src="/app/images/icon/cog-outline-filled.svg" alt=""><span>Settings
                                    </span></a>
                            </li> --}}
                        </ul>
                        <!-- Side Nav END -->
                    </div>
                    <!-- Card body END -->

                    @auth
                        <div class="card-footer text-center py-2">
                            <a class="btn btn-link btn-sm" href="{{ route('profile.show') }}">View Profile </a>
                        </div>
                    @endauth
                </div>
                <!-- Card END -->

                {{-- <!-- Helper link START -->
                <ul class="nav small mt-4 justify-content-center lh-1">
                    <li class="nav-item">
                        <a class="nav-link" href="my-profile-about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.html">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://support.webestica.com/login">Support </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="docs/index.html">Docs </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="help.html">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="privacy-and-terms.html">Privacy & terms</a>
                    </li>
                </ul>
                <!-- Helper link END --> --}}
                <!-- Copyright -->
                {{-- <p class="small text-center mt-1">©2022 <a class="text-body" target="_blank"
                        href="https://www.webestica.com/"> Webestica </a></p> --}}
            </div>
        </div>
    </nav>
</div>
