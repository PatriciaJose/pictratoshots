<nav x-data="{ open: false }" class="p-2" id="headerNav">
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

        .rate {
            border-bottom-right-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: start
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 1em;
            font-size: 30px;
            font-weight: 300;
            color: #FFD600;
            cursor: pointer
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }
    </style>
    <div class="max-w-10xl">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="hidden space-x-8 ps-5 sm:-my-px sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('gallery')" :active="request()->routeIs('gallery')">
                        {{ __('Gallery') }}
                    </x-nav-link>
                    <x-nav-link :href="route('packages')" :active="request()->routeIs('packages')">
                        {{ __('Services') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="hidden space-x-6 sm:-my-px sm:ml-7 sm:flex">
                <a href="{{ route('home') }}" class="text-decoration-none text-dark">
                    <x-application-logo class="block w-auto fill-current" />
                </a>
            </div>
            <div class="hidden space-x-8 sm:flex sm:items-center pe-5">
                <x-nav-link>
                    <a class="nav-link notification-bell" href="#">
                        <i class="fa-regular fa-bell"></i>
                        <span class="badge"></span>
                    </a>
                </x-nav-link>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('my-bookings') }}">{{ __('My Bookings') }}</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<div id="notificationPanel" class="notification-panel d-none">
    <div class="notification-panel-header">
        <h5 class="mb-0">Notification</h5>
    </div>
    <div class="notification-items">
    </div>
</div>

<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModalLabel">Rate Our Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('feedback.submit') }}" method="post">
                    @csrf
                    <input type="hidden" name="ratingFormID">
                    <label for="feedbackMessage">Feedback:</label>
                    <textarea name="message" id="feedbackMessage" class="form-control" placeholder="Write your experience..."></textarea>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function fetchNotifications() {
        $.ajax({
            url: "{{ route('fetch-notifications') }}",
            method: 'GET',
            success: function(data) {
                data.notifications.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                $('#notificationPanel .notification-items').html('');

                if (data.notifications.length > 0) {
                    data.notifications.forEach(function(notification) {
                        var notificationContent = "";
                        var notificationTitle = "";

                        if (notification.notification_type === 'booking-approved') {
                            notificationTitle = "<i class=\"fa-solid fa-calendar-check\"></i> Booking Update";
                            notificationContent = "You have successfully reserved a photoshoot session";
                            addNotificationItem(notificationTitle, notificationContent, notification.created_at);
                        } else if (notification.notification_type === 'canceled') {
                            notificationTitle = "<i class=\"fa-solid fa-ban\"></i> Booking Canceled";
                            notificationContent = "You have successfully canceled a pending photoshoot session.";
                            addNotificationItem(notificationTitle, notificationContent, notification.created_at)
                        } else if (notification.notification_type === 'booking-disapproved') {
                            fetchBookingDetails(notification);
                        } else if (notification.notification_type === 'weather') {
                            fetchWeatherDetails(notification);
                        } else if (notification.notification_type === 'rating') {
                            var bookingID = getBookingIDFromRatingFormID(notification.ratingFormID);
                            if (!isBookingIDInFeedback(bookingID, data.feedback)) {
                                notificationTitle = "<i class=\"fa-solid fa-star\"></i> Rate Us";
                                notificationContent = "Thank you for a wonderful collaboration. Kindly rate our services"
                                var ratingButton = `<button class="btn btn-secondary w-100 mt-3" onclick="showRatingModal(${notification.ratingFormID})">Write Review</button>`;
                                notificationContent += ratingButton;
                                addNotificationItem(notificationTitle, notificationContent, notification.created_at);
                            } else {
                                notificationTitle = "<i class=\"fa-solid fa-circle-check\"></i> Session Finished";
                                notificationContent = "We hope you enjoy our service, 'Till next time!"
                                addNotificationItem(notificationTitle, notificationContent, notification.created_at);
                            }
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

    function getBookingIDFromRatingFormID(ratingFormID) {
        var bookingID;
        $.ajax({
            url: "{{ url('fetch-rating-form') }}/" + ratingFormID,
            method: 'GET',
            async: false,
            success: function(data) {
                bookingID = data.bookingID;
            },
            error: function(error) {
                console.log('Error fetching booking ID');
            }
        });
        return bookingID;
    }

    function isBookingIDInFeedback(bookingID, feedbackData) {
        var exists;
        $.ajax({
            url: "{{ url('check-booking-feedback') }}/" + bookingID,
            method: 'GET',
            async: false,
            success: function(data) {
                exists = data.exists;
            },
            error: function(error) {
                console.log('Error checking booking feedback');
            }
        });
        return exists;
    }



    function fetchBookingDetails(notification) {
        $.ajax({
            url: "{{ route('fetch-booking-details') }}",
            method: 'GET',
            data: {
                bookingID: notification.bookingID
            },
            success: function(bookingData) {
                var notificationContent = "Booking Rejected: <br> Reason: " + bookingData.disapproval_reason;
                var notificationTitle = "<i class=\"fa-regular fa-calendar-xmark\"></i> Booking Update";
                addNotificationItem(notificationTitle, notificationContent, notification.created_at);
            },
            error: function(error) {
                console.log('Error fetching booking details');
            }
        });
    }

    function fetchWeatherDetails(notification) {
        $.ajax({
            url: "{{ route('fetch-weather-details') }}",
            method: 'GET',
            data: {
                weatherID: notification.weatherID
            },
            success: function(weatherData) {
                var notificationTitle = "<i class=\"fa-solid fa-cloud-sun\"></i> Weather Update";
                var notificationContent = "Temperature: " + weatherData.temperature + "<br>Description: " + weatherData.weather_description + "<br> Notes: " + weatherData.notes;
                addNotificationItem(notificationTitle, notificationContent, notification.created_at);
            },
            error: function(error) {
                console.log('Error fetching weather details');
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

    function showRatingModal(ratingFormID) {
        $('#ratingModal input[name="ratingFormID"]').val(ratingFormID);
        $('#ratingModal').modal('show');
    }

    function updateNotificationBadge() {
        $.ajax({
            url: "{{ route('fetch-notification-count') }}",
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
                url: "{{ route('markAsViewed') }}",
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