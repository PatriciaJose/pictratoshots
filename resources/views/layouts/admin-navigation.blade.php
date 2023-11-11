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
                        <a class="nav-link notification-bell" href="#">
                            <i class="fa-regular fa-bell"></i>
                            <span class="badge"></span>
                        </a>
                        <a href="{{ route('admin.edit') }}"><button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md  bg-transparent hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>Hi, {{ Auth::user()->name }}!</div>
                            </button></a>
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
                        <li class="navbar-sb-link my-3">
                            <a href="{{ route('feedback.index') }}" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="text-light-blue d-flex align-items-center">
                                    <span class="navbar-sb-icon me-3">
                                        <i class="fa-solid fa-gauge"></i>
                                    </span>
                                    <span class="navbar-sb-text fs-14 fw-5 text-capitalize">Feedback</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-sb-item mb-5">
                    <h5 class="text-uppercase text-grey navbar-sb-item-title fs-12 ls-1">account</h5>
                    <ul class="navbar-sb-links p-0 list-unstyled">
                        <li class="navbar-sb-link my-3">
                            <a href="{{ route('admin.edit') }}" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="text-light-blue d-flex align-items-center">
                                    <span class="navbar-sb-icon me-3">
                                        <i class="fa-regular fa-circle-user"></i>
                                    </span>
                                    <span class="navbar-sb-text fs-14 fw-5 text-capitalize">profile</span>
                                </div>
                            </a>
                        </li>
                        <li class="navbar-sb-link my-3">
                            <a href="{{ route('user.index') }}" class="text-decoration-none d-flex align-items-center justify-content-between">
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

    <div id="notificationPanel" class="notification-panel d-none">
        <div class="notification-panel-header">
            <h5 class="mb-0">Notification</h5>
        </div>
        <div class="notification-items">
        </div>
    </div>
    <script>
        function fetchNotifications() {
            $.ajax({
                url: "{{ route('fetch-notifications-admin') }}",
                method: 'GET',
                success: function(data) {
                    data.notifications.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                    $('#notificationPanel .notification-items').html('');
                    fetchBookingsForCurrentDate();
                    if (data.notifications.length > 0) {
                        data.notifications.forEach(function(notification) {
                            var notificationContent = "";
                            var notificationTitle = "";

                            if (notification.notification_type === 'new-bookings') {
                                notificationTitle = "<i class=\"fa-solid fa-calendar-check\"></i> New Booking";
                                notificationContent = `<a href="{{ route('booking-management') }}"><button class="btn btn-secondary w-100 mt-3">View Bookings</button></a>`;
                                addNotificationItem(notificationTitle, notificationContent, notification.created_at);
                            } else if (notification.notification_type === 'session-today') {
                                var notificationTitle = "<i class=\"fa-solid fa-business-time\"></i> Session Today";
                                var notificationContent = `<a href="{{ route('booking-management') }}"><button class="btn btn-secondary w-100 mt-3">View Calendar</button></a>`;
                                addNotificationItem(notificationTitle, notificationContent, new Date());
                            } else if (notification.notification_type === 'new-feedback') {
                                notificationTitle = "<i class=\"fa-solid fa-star\"></i> New Feedback";
                                notificationContent = `<a href="{{ route('feedback.index') }}"><button class="btn btn-secondary w-100 mt-3">View Feedbacks</button><a/>`;
                                addNotificationItem(notificationTitle, notificationContent, notification.created_at);
                            } else {
                                addNotificationItem(notification.notification_type, notificationContent, notification.created_at);
                            }
                        });
                    } else {
                        $('#notificationPanel .notification-items').html('<p>No notifications found.</p>');
                    }
                },
                error: function(error) {
                    console.log('Error fetching notifications');
                }
            });
        }

        function addNotificationItem(type, content, created_at) {
            const createdAtDate = new Date(created_at);

            const formattedDate = createdAtDate.toLocaleString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });

            var notificationItem = `
        <div class="notification-item">
            <div class="notification-item-header">
                <h6 class="mb-0 text-capitalize">${type}</h6>
            </div>
            <p class="notification-content text-sm">${content}</p>
            <span class="notification-date text-muted"style="font-size:11px">${formattedDate}</span>
        </div>
    `;
            $('#notificationPanel .notification-items').append(notificationItem);
        }

        function fetchBookingsForCurrentDate() {
            $.ajax({
                url: "{{ route('fetch-bookings-for-current-date') }}",
                method: 'GET',
                success: function(bookings) {
                    if (bookings.length > 0) {

                    }
                },
                error: function(error) {
                    console.log('Error fetching bookings for the current date');
                }
            });
        }

        function updateNotificationBadge() {
            $.ajax({
                url: "{{ route('fetch-notification-count-admin') }}",
                method: 'GET',
                success: function(data) {
                    if (data.count > 0) {
                        $('.badge').text(data.count).show();
                    } else {
                        $('.badge').hide();
                    }
                },
                error: function(error) {
                    console.log('Error fetching notification count');
                }
            });
        }

        setInterval(updateNotificationBadge, 60000);

        $(document).ready(function() {
            updateNotificationBadge();

            $('.notification-bell').click(function(e) {
                e.preventDefault();
                $('#notificationPanel').toggleClass('d-none');
                fetchNotifications();
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('#notificationPanel, .notification-bell').length) {
                    $('#notificationPanel').addClass('d-none');
                }
            });

            $('#notificationPanel').on('click', 'a, button', function() {
                $('#notificationPanel').addClass('d-none');
            });
        });

        $(document).ready(function() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            function marksAsViewed() {
                $.ajax({
                    url: "{{ route('markAsViewedAdmin') }}",
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            }

            $('.notification-bell').click(function(e) {
                e.preventDefault();
                $('.badge').remove();
                marksAsViewed();
            });
        });
    </script>
    <style>
        .notification-bell {
            position: relative;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 10px;
        }

        .notification-panel {
            position: fixed;
            top: 60px;
            right: 20px;
            z-index: 9999;
            width: 300px;
            max-height: 400px;
            overflow-y: auto;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .notification-panel-header {
            border-bottom: 1px solid #ccc;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: #fff;
        }

        .notification-items {
            padding: 20px;
        }

        .notification-item {
            border-bottom: 1px solid #eee;
            padding: 15px;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item-header {
            margin-bottom: 10px;
        }

        .notification-item-header h6 {
            font-weight: 600;
        }

        .notification-date {
            color: #999;
        }
    </style>