<header class="navbar-light fixed-top header-static bg-mode">
    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo START -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="light-mode-item navbar-brand-item" src="/app/images/logo.svg" alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="/app/images/logo.svg" alt="logo">
            </a>

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-animation">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <!-- Main navbar START -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Nav Search START -->
                <livewire:search />

                <ul class="navbar-nav navbar-nav-scroll ms-auto">
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="events"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Events
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="events">
                            <li>
                                <a class="dropdown-item active" href="{{ route('event.index') }}">All Events</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('event.create') }}">Create Events</a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="https://themes.getbootstrap.com/store/webestica/"
                                    target="_blank">
                                    <i class="text-success fa-fw bi bi-cloud-download-fill me-2"></i>Buy Social!
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu" aria-labelledby="pagesMenu">
                            <li> <a class="dropdown-item" href="albums.html">Albums</a></li>
                            <li> <a class="dropdown-item" href="celebration.html">Celebration</a></li>
                            <li> <a class="dropdown-item" href="messaging.html">Messaging</a></li>
                            <!-- Dropdown submenu -->
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle" href="#!">Profile</a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="my-profile.html">Feed</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-about.html">About</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-connections.html">Connections</a>
                                    </li>
                                    <li> <a class="dropdown-item" href="my-profile-media.html">Media</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-videos.html">Videos</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-events.html">Events</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-activity.html">Activity</a>
                                    </li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item" href="events.html">Events</a></li>
                            <li> <a class="dropdown-item" href="events-2.html">Events 2</a></li>
                            <li> <a class="dropdown-item" href="event-details.html">Event details</a></li>
                            <li> <a class="dropdown-item" href="event-details-2.html">Event details 2</a></li>
                            <li> <a class="dropdown-item" href="groups.html">Groups</a></li>
                            <li> <a class="dropdown-item" href="group-details.html">Group details</a></li>
                            <li> <a class="dropdown-item" href="post-videos.html">Post videos</a></li>
                            <li> <a class="dropdown-item" href="post-video-details.html">Post video details</a>
                            </li>
                            <li> <a class="dropdown-item" href="post-details.html">Post details</a></li>
                            <li> <a class="dropdown-item" href="video-details.html">Video details</a></li>
                            <li> <a class="dropdown-item" href="blog.html">Blog</a></li>
                            <li> <a class="dropdown-item" href="blog-details.html">Blog details</a></li>

                            <!-- Dropdown submenu levels -->
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">Dropdown levels</a>
                                <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                    <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                    <!-- dropdown submenu open left -->
                                    <li class="dropdown-submenu dropstart">
                                        <a class="dropdown-item dropdown-toggle" href="#">Dropdown (start)</a>
                                        <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                            <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                            <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                        </ul>
                                    </li>
                                    <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Account </a>
                        <ul class="dropdown-menu" aria-labelledby="postMenu">
                            <li> <a class="dropdown-item" href="create-page.html">Create a page</a></li>
                            <li> <a class="dropdown-item" href="settings.html">Settings</a> </li>
                            <li> <a class="dropdown-item" href="notifications.html">Notifications</a> </li>
                            <li> <a class="dropdown-item" href="help.html">Help center</a> </li>
                            <li> <a class="dropdown-item" href="help-details.html">Help details</a> </li>
                            <!-- dropdown submenu open left -->
                            <li class="dropdown-submenu dropstart">
                                <a class="dropdown-item dropdown-toggle" href="#">Authentication</a>
                                <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="sign-in.html">Sign in</a> </li>
                                    <li> <a class="dropdown-item" href="sign-up.html">Sing up</a> </li>
                                    <li> <a class="dropdown-item" href="forgot-password.html">Forgot
                                            password</a> </li>
                                    <li class="dropdown-divider"></li>
                                    <li> <a class="dropdown-item" href="sign-in-advance.html">Sign in
                                            advance</a> </li>
                                    <li> <a class="dropdown-item" href="sign-up-advance.html">Sing up
                                            advance</a> </li>
                                    <li> <a class="dropdown-item" href="forgot-password-advance.html">Forgot
                                            password advance</a> </li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item" href="error-404.html">Error 404</a> </li>
                            <li> <a class="dropdown-item" href="offline.html">Offline</a> </li>
                            <li> <a class="dropdown-item" href="privacy-and-terms.html">Privacy & terms</a>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('event.index') }}">Events</a>
                    </li>

                    @can(['event.create'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('event.create') }}">
                                <i class="fas fa-edit me-1"></i>
                                Add Event
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>

            <ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
                {{-- <li class="nav-item ms-2">
                    <a class="nav-link icon-md btn btn-light p-0" href="messaging.html">
                        <i class="bi bi-chat-left-text-fill fs-6"> </i>
                    </a>
                </li> --}}
                {{-- <li class="nav-item ms-2">
                    <a class="nav-link icon-md btn btn-light p-0 disabled" href="javascript://">
                        <i class="bi bi-gear-fill fs-6"> </i>
                    </a>
                </li> --}}
                {{-- <li class="nav-item dropdown ms-2">
                    <a class="nav-link icon-md btn btn-light p-0 disabled" href="#" id="notifDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                        <span class="badge-notif animation-blink"></span>
                        <i class="bi bi-bell-fill fs-6"> </i>
                    </a>

                    <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0"
                        aria-labelledby="notifDropdown">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="m-0">Notifications <span
                                        class="badge bg-danger bg-opacity-10 text-danger ms-2">4 new</span></h6>
                                <a class="small" href="#">Clear all</a>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush list-unstyled p-2">
                                    <!-- Notif item -->
                                    <li>
                                        <div
                                            class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                                            <div class="avatar text-center d-none d-sm-inline-block">
                                                <img class="avatar-img rounded-circle" src="/app/images/avatar/01.jpg"
                                                    alt="">
                                            </div>
                                            <div class="ms-sm-3">
                                                <div class=" d-flex">
                                                    <p class="small mb-2"><b>Judy Nguyen</b> sent you a friend
                                                        request.</p>
                                                    <p class="small ms-3 text-nowrap">Just now</p>
                                                </div>
                                                <div class="d-flex">
                                                    <button class="btn btn-sm py-1 btn-primary me-2">Accept
                                                    </button>
                                                    <button class="btn btn-sm py-1 btn-danger-soft">Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Notif item -->
                                    <li>
                                        <div
                                            class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3 position-relative">
                                            <div class="avatar text-center d-none d-sm-inline-block">
                                                <img class="avatar-img rounded-circle" src="/app/images/avatar/02.jpg"
                                                    alt="">
                                            </div>
                                            <div class="ms-sm-3 d-flex">
                                                <div>
                                                    <p class="small mb-2">Wish <b>Amanda Reed</b> a happy
                                                        birthday (Nov 12)</p>
                                                    <button class="btn btn-sm btn-outline-light py-1 me-2">Say
                                                        happy birthday 🎂</button>
                                                </div>
                                                <p class="small ms-3">2min</p>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Notif item -->
                                    <li>
                                        <a href="#"
                                            class="list-group-item list-group-item-action rounded d-flex border-0 mb-1 p-3">
                                            <div class="avatar text-center d-none d-sm-inline-block">
                                                <div class="avatar-img rounded-circle bg-success"><span
                                                        class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span>
                                                </div>
                                            </div>
                                            <div class="ms-sm-3">
                                                <div class="d-flex">
                                                    <p class="small mb-2">Webestica has 15 like and 1 new
                                                        activity</p>
                                                    <p class="small ms-3">1hr</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- Notif item -->
                                    <li>
                                        <a href="#"
                                            class="list-group-item list-group-item-action rounded d-flex border-0 p-3 mb-1">
                                            <div class="avatar text-center d-none d-sm-inline-block">
                                                <img class="avatar-img rounded-circle" src="/app/images/logo/12.svg"
                                                    alt="">
                                            </div>
                                            <div class="ms-sm-3 d-flex">
                                                <p class="small mb-2"><b>Bootstrap in the news:</b> The search
                                                    giant’s parent company, Alphabet, just joined an exclusive
                                                    club of tech stocks.</p>
                                                <p class="small ms-3">4hr</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#" class="btn btn-sm btn-primary-soft">See all incoming activity</a>
                            </div>
                        </div>
                    </div>
                </li> --}}

                <li class="nav-item ms-2 dropdown">
                    <a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button"
                        data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @auth
                            <img class="avatar-img rounded-2" src="{{ Auth::user()->profile_photo_url }}" alt="">
                        @else
                            <img class="avatar-img rounded-2" src="{{ asset('user.svg') }}" alt="">
                        @endauth
                    </a>

                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3"
                        aria-labelledby="profileDropdown">
                        @auth
                            <!-- Profile info -->
                            <li class="px-3">
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <img class="avatar-img rounded-circle" src="{{ asset('user.svg') }}" alt="avatar">
                                    </div>
                                    <div>
                                        <a class="h6 stretched-link" href="#">
                                            {{ request()->user()->first_name }} {{ request()->user()->last_name }}
                                        </a>
                                        {{-- <p class="small m-0">{{ request()->user()->role }}</p> --}}
                                    </div>
                                </div>

                                <a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center"
                                    href="{{ route('profile.show') }}">View profile</a>
                            </li>

                            <!-- Links -->
                            {{-- <li>
                            <a class="dropdown-item" href="settings.html"><i
                                    class="bi bi-gear fa-fw me-2"></i>Settings & Privacy</a>
                        </li> --}}
                            {{-- <li>
                            <a class="dropdown-item" href="https://support.webestica.com/" target="_blank">
                                <i class="fa-fw bi bi-life-preserver me-2"></i>Support
                            </a>
                        </li> --}}
                            {{-- <li>
                            <a class="dropdown-item" href="docs/index.html" target="_blank">
                                <i class="fa-fw bi bi-card-text me-2"></i>Documentation
                            </a>
                        </li> --}}
                            <li class="dropdown-divider"></li>
                            <!-- Authentication: Logout -->
                            <li>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    <a class="dropdown-item bg-danger-soft-hover" href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                        <i class="bi bi-power fa-fw me-2"></i>
                                        {{ __('Sign Out') }}
                                    </a>

                                    @csrf
                                </form>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">
                                    <i class="fas fa-user-tie me-2"></i>Login
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus me-2"></i>Register
                                </a>
                            </li>
                        @endauth

                        <!-- Dark mode -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <div class="modeswitch-wrap" id="darkModeSwitch">
                                <div class="modeswitch-item">
                                    <div class="modeswitch-icon"></div>
                                </div>
                                <span>Dark mode</span>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
