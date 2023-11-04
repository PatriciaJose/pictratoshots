    <div class="dashboard-pg text-grey-blue">
        <nav class="navigation-bar d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="navigation-bar-left col-6 d-flex align-items-center">
                        <button type="button" class="navbar-open-btn text-grey-blue me-3">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="navbar-logo">
                            <div class="inline-flex items-center">
                                <span><img src="{{ asset('storage/images/Picture1.png') }}"></span>
                                <p>&nbsp;</p>
                                <h6 style="font-family: 'Orbitron', sans-serif;font-size:30px;">Pictratoshots</h6>
                            </div>
                        </div>
                    </div>

                    <div class="navigation-bar-right col-6 d-flex align-items-center justify-content-end">
                        <button type="button" class="notification-btn text-grey-blue">
                            <i class="fa-regular fa-bell"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <div class="navigation-overlay position-fixed"></div>

        <div class="navigation-sidebar bg-light-grey">
            <div class="navbar-sb-head d-flex justify-content-between align-items-center px-4">
                <div class="inline-flex items-center">
                    <span><img src="{{ asset('storage/images/Picture1.png') }}" width="40"></span>
                    <p>&nbsp;</p>
                    <h6 class="mt-2" style="font-family: 'Orbitron', sans-serif;font-size:20px;">Pictratoshots</h6>
                </div>
                <button class="navbar-close-btn text-grey-blue">
                    <i class='fas fa-arrow-left'></i>
                </button>
            </div>

            <div class="navbar-sb-list p-4">
                <div class="navbar-sb-item mb-5">
                    <h5 class="text-uppercase text-grey navbar-sb-item-title fs-12 ls-1">Management</h5>
                    <ul class="navbar-sb-links p-0 list-unstyled">
                        <li class="navbar-sb-link my-3">
                            <a href="{{ route('booking-management') }}" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="text-light-blue d-flex align-items-center">
                                    <span class="navbar-sb-icon me-3">
                                        <i class="fa-solid fa-book"></i>
                                    </span>
                                    <span class="navbar-sb-text fs-14 fw-5 text-capitalize">Bookings</span>
                                </div>
                            </a>
                        </li>
                        <li class="navbar-sb-link my-3">
                            <a href="{{ route('admin.gallery') }}" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="text-light-blue d-flex align-items-center">
                                    <span class="navbar-sb-icon me-3">
                                        <i class="fa-solid fa-image"></i>
                                    </span>
                                    <span class="navbar-sb-text fs-14 fw-5 text-capitalize">Gallery</span>
                                </div>
                            </a>
                        </li>
                        <li class="navbar-sb-link my-3">
                            <a href="{{ route('package-management') }}" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="text-light-blue d-flex align-items-center">
                                    <span class="navbar-sb-icon me-3">
                                        <i class="fa-solid fa-box"></i>
                                    </span>
                                    <span class="navbar-sb-text fs-14 fw-5 text-capitalize">Packages</span>
                                </div>
                            </a>
                        </li>
                        <li class="navbar-sb-link my-3">
                            <a href="{{ route('event.index') }}" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="text-light-blue d-flex align-items-center">
                                    <span class="navbar-sb-icon me-3">
                                        <i class="fa-solid fa-gift"></i>
                                    </span>
                                    <span class="navbar-sb-text fs-14 fw-5 text-capitalize">Event Type</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-sb-item mb-5">
                    <h5 class="text-uppercase text-grey navbar-sb-item-title fs-12 ls-1">priority</h5>
                    <ul class="navbar-sb-links p-0 list-unstyled">
                        <li class="navbar-sb-link my-3">
                            <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="text-light-blue d-flex align-items-center">
                                    <span class="navbar-sb-icon me-3">
                                        <i class="fa-solid fa-gauge"></i>
                                    </span>
                                    <span class="navbar-sb-text fs-14 fw-5 text-capitalize">dashboard</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-sb-item mb-5">
                    <h5 class="text-uppercase text-grey navbar-sb-item-title fs-12 ls-1">account</h5>
                    <ul class="navbar-sb-links p-0 list-unstyled">
                        <li class="navbar-sb-link my-3">
                            <a href="#" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="text-light-blue d-flex align-items-center">
                                    <span class="navbar-sb-icon me-3">
                                        <i class="fa-regular fa-circle-user"></i>
                                    </span>
                                    <span class="navbar-sb-text fs-14 fw-5 text-capitalize">profile</span>
                                </div>
                            </a>
                        </li>
                        <li class="navbar-sb-link my-3">
                            <a href="#" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="text-light-blue d-flex align-items-center">
                                    <span class="navbar-sb-icon me-3">
                                        <i class="fa-solid fa-users"></i>
                                    </span>
                                    <span class="navbar-sb-text fs-14 fw-5 text-capitalize">users</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-sb-item mb-5">
                    <h5 class="text-uppercase text-grey navbar-sb-item-title fs-12 ls-1"></h5>
                    <ul class="navbar-sb-links p-0 list-unstyled">
                        <li class="navbar-sb-link my-3">
                            <a href="#" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="text-light-blue d-flex align-items-center">
                                    <span class="navbar-sb-icon me-3">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit">
                                            <span class="navbar-sb-text fs-14 fw-5 text-capitalize">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>