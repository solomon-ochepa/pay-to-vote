<div class="card mb-3">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center border-0 pb-0">
        <h6 class="card-title mb-0">{{ $event->name }}</h6>
        <a href="{{ route('office.event.show', ['event' => $event->slug]) }}" class="btn btn-sm btn-primary-soft">
            See all
        </a>
    </div>

    <!-- Card body -->
    <div class="card-body">
        <div class="tiny-slider arrow-hover">
            <div class="tiny-slider-inner ms-n4" data-arrow="true" data-dots="false" data-items-xl="3" data-items-lg="2"
                data-items-md="2" data-items-sm="2" data-items-xs="1" data-gutter="12" data-edge="30">
                <!-- Slider items -->
                <div>
                    <!-- Card add friend item START -->
                    <div class="card shadow-none text-center">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                            <div class="avatar avatar-xl">
                                <a href="#!">
                                    <img class="avatar-img rounded-circle"
                                        src="{{ asset('app') }}/images/avatar/09.jpg" alt=""></a>
                            </div>
                            <h6 class="card-title mb-1 mt-3"> <a href="#!"> Amanda Reed </a>
                            </h6>
                            <p class="mb-0 small lh-sm">50 mutual connections</p>
                        </div>

                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                            <button class="btn btn-sm btn-primary-soft w-100"> Vote
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <!-- Card add friend item START -->
                    <div class="card shadow-none text-center">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                            <div class="avatar avatar-story avatar-xl">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="{{ asset('app') }}/images/avatar/10.jpg" alt=""></a>
                            </div>
                            <h6 class="card-title mb-1 mt-3"> <a href="#!"> Larry Lawson </a>
                            </h6>
                            <p class="mb-0 small lh-sm">33 mutual connections</p>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                            <button class="btn btn-sm btn-primary-soft w-100"> Vote
                            </button>
                        </div>
                    </div>
                    <!-- Card add friend item END -->
                </div>

                <div>
                    <!-- Card add friend item START -->
                    <div class="card shadow-none text-center">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                            <div class="avatar avatar-xl">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="{{ asset('app') }}/images/avatar/11.jpg" alt=""></a>
                            </div>
                            <h6 class="card-title mb-1 mt-3"> <a href="#!"> Louis Crawford </a>
                            </h6>
                            <p class="mb-0 small lh-sm">45 mutual connections</p>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                            <button class="btn btn-sm btn-primary-soft w-100"> Vote
                            </button>
                        </div>
                    </div>
                    <!-- Card add friend item END -->
                </div>

                <div>
                    <!-- Card add friend item START -->
                    <div class="card shadow-none text-center">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                            <div class="avatar avatar-xl">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="{{ asset('app') }}/images/avatar/12.jpg" alt=""></a>
                            </div>
                            <h6 class="card-title mb-1 mt-3"> <a href="#!"> Dennis Barrett </a>
                            </h6>
                            <p class="mb-0 small lh-sm">21 mutual connections</p>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                            <button class="btn btn-sm btn-primary-soft w-100"> Vote
                            </button>
                        </div>
                    </div>
                    <!-- Card add friend item END -->
                </div>
            </div>
        </div>
    </div>
    <!-- Card body END -->
</div>
