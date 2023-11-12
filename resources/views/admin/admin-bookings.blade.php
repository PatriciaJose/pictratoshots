<x-admin-layout>
    <div class="dashboard-main">
        <div class="container">
            <div class="card my-3">
                <div class="card-body">
                    <h2>Booking Management</h2>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-body">
                    <table id='table_id' class='display mx'>
                        <thead>
                            <tr>
                                <th>Package Name</th>
                                <th>Client's Email</th>
                                <th>Session Date</th>
                                <th>Session Time</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Reason of Disapproval</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->package->package_name }}</td>
                                <td>{{ $booking->client->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->session_date)->format('F d, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->session_time)->format('h:i A') }}</td>
                                <td>{{ $booking->location }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>{{ $booking->disapproval_reason }}</td>
                                <td>
                                    @if ($booking->status == 'Pending')
                                    <form id="bookingForm" action="{{ route('update-booking-status') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                        <button type="submit" name="status" value="Approved" class="btn btn-primary btn-sm w-100">Accept</button>
                                        <button type="button" id="rejectButton" class="btn btn-danger btn-sm w-100 mt-1">Reject</button>
                                    </form>

                                    <script>
                                        document.getElementById('rejectButton').addEventListener('click', function() {
                                            rejectBooking();
                                        });

                                        function rejectBooking() {
                                            var form = document.getElementById('bookingForm');
                                            var formData = new FormData(form);

                                            formData.append('status', 'Disapproved');

                                            var xhr = new XMLHttpRequest();
                                            xhr.open('POST', form.action, true);

                                            xhr.onload = function() {
                                                if (xhr.status >= 200 && xhr.status < 300) {

                                                    console.log('Booking rejected successfully.');
                                                } else {

                                                    console.log('Error rejecting booking.');
                                                }
                                            };

                                            xhr.onerror = function() {

                                                console.log('Error connecting to the server.');
                                            };

                                            xhr.send(formData);
                                        }
                                    </script>
                                    <script>
                                        document.getElementById('rejectButton').addEventListener('click', function() {
                                            $('#reasonModal').modal('show');
                                        });
                                    </script>
                                    <div class="modal fade" id="reasonModal" tabindex="-1" role="dialog" aria-labelledby="reasonModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('add-reason') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="reasonModalLabel">Add Reason</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="disapprovalReason">Reason for Disapproval</label>
                                                            <textarea class="form-control" id="disapprovalReason" name="disapprovalReason" rows="4" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit Reason</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @elseif ($booking->status == 'Approved')
                                    <div class="text-center">
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#smsModal">
                                            <i class="fa-solid fa-comment-sms"></i>
                                        </button>
                                        <div class="modal fade" id="smsModal" tabindex="-1" role="dialog" aria-labelledby="smsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('send-sms') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="smsModalLabel">Send SMS</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="smsContent">SMS Content</label>
                                                                <textarea class="form-control" id="smsContent" name="smsContent" rows="4" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Send SMS</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success btn-sm" onclick="getWeather('{{ $booking->session_date }}', '{{ $booking->session_time }}', '{{ $booking->location }}', '{{ $booking->id }}')">
                                            <i class="fa-solid fa-cloud-sun"></i>
                                        </button>
                                        <form action="{{ route('update-booking-status') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                            <button type="submit" name="status" value="finish" class="btn btn-sm w-100 btn-primary mt-1">Done</button>
                                        </form>
                                    </div>
                                    </form>
                                    @elseif ($booking->status == 'Finish')
                                    @php
                                    $ratingFormExists = App\Models\RatingForm::where('bookingID', $booking->id)->exists();
                                    @endphp
                                    @if (!$ratingFormExists)
                                    <form action="{{ route('send-rating-form') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                        <button type="submit" class="btn btn-info btn-sm">Send Rating Form</button>
                                    </form>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Booking Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Client's Email:</strong> <span id="eventEmail"></span></p>
                    <p><strong>Package Availed:</strong> <span id="eventTitle"></span></p>
                    <p><strong>Session Date and Time:</strong> <span id="eventStart"></span></p>
                    <p><strong>Location:</strong> <span id="eventLocation"></span></p>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="weatherModal" tabindex="-1" role="dialog" aria-labelledby="weatherModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="weatherModalLabel">Weather Information</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="weatherInfo">
                        <p><strong>Temperature:</strong> <span id="temperature"></span>°C</p>
                        <p><strong>Weather:</strong> <span id="weatherDescription"></span></p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="userNote">Add your note:</label>
                        <textarea class="form-control" id="userNote" rows="4" placeholder="Write a note ..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="notifyUserButton" class="btn btn-primary">Notify User</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        function getWeather(sessionDate, sessionTime, location, bookingId) {
            const dateTime = sessionDate + ' ' + sessionTime;

            const timestamp = new Date(dateTime).getTime() / 1000;

            $.ajax({
                url: 'https://api.openweathermap.org/data/2.5/forecast',
                method: 'GET',
                data: {
                    q: location,
                    appid: '5e11be8c4280d91cb6eff44b07c62b93',
                    units: 'metric',
                },
                success: function(data) {
                    const forecasts = data.list;
                    let closestForecast = forecasts[0];
                    for (const forecast of forecasts) {
                        if (Math.abs(forecast.dt - timestamp) < Math.abs(closestForecast.dt - timestamp)) {
                            closestForecast = forecast;
                        }
                    }

                    const temperature = closestForecast.main.temp;
                    const weatherDescription = closestForecast.weather[0].description;

                    $('#weatherModal .modal-title').text(`Weather forecast on ${sessionDate} at ${sessionTime}`);
                    $('#temperature').text(temperature.toFixed(2));
                    $('#weatherDescription').text(weatherDescription);

                    $('#weatherModal').modal('show');

                    $('#notifyUserButton').on('click', function() {
                        $.ajax({
                            url: '/insert-weather',
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                booking_id: bookingId,
                                temperature: temperature,
                                weather_description: weatherDescription,
                                notes: $('#userNote').val(),
                            },
                            success: function(response) {
                                alert('User successfully notified');
                            },
                            error: function() {
                                alert('Failed to insert weather data into the database.');
                            },
                        });
                    });
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: "{{ route('events') }}",
                extraParams: {
                    _token: csrfToken
                },
                color: 'green',
                selectable: true,
                selectHelper: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },
                eventColor: '#378006',
                eventClick: function(info) {
                    $('#eventTitle').text(info.event.title);
                    const startDate = new Date(info.event.start);
                    const options = {
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit',
                        hour: '2-digit',
                        minute: '2-digit'
                    };
                    const formattedDate = startDate.toLocaleString('en-US', options);

                    $('#eventStart').text(formattedDate);

                    $('#eventLocation').text(info.event.extendedProps.location);
                    $('#eventEmail').text(info.event.extendedProps.email);

                    $('#eventModal').modal('show');
                },


            });

            calendar.render();
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.9/index.min.js" integrity="sha512-xCMh+IX6X2jqIgak2DBvsP6DNPne/t52lMbAUJSjr3+trFn14zlaryZlBcXbHKw8SbrpS0n3zlqSVmZPITRDSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.9/index.global.js" integrity="sha512-lU5sd0e7f59Jia30P5oEI5zC3BzVJ4ao+xRA70IIJ2UBzek4PCkPk+MTLIYwXTXGErOqjJ/rLdB3gLK0E5hD0w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.9/index.global.min.js" integrity="sha512-XcSx5820pzZbdZYdvoBBKzuOivQv7oQMd+7JuUHh0jhMwqsWHOf+yRfZRxCtV0ySEKWtKblijTdl9pvODcmD7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.9/index.js" integrity="sha512-bBl4oHIOeYj6jgOLtaYQO99mCTSIb1HD0ImeXHZKqxDNC7UPWTywN2OQRp+uGi0kLurzgaA3fm4PX6e2Lnz9jQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</x-admin-layout>