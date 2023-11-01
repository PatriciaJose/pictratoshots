<x-admin-layout>
    <div class="dashboard-main">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="dashboard-title-text">
                        <h2>Booking Management</h2>
                    </div>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->package->package_name }}</td>
                                <td>{{ $booking->client->email }}</td>
                                <td>{{ $booking->session_date }}</td>
                                <td>{{ $booking->session_time }}</td>
                                <td>{{ $booking->location }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>
                                    @if ($booking->status == 'Pending')
                                    <button class="btn btn-primary btn-sm">Accept</button>
                                    <button class="btn btn-danger btn-sm">Reject</button>
                                    @elseif ($booking->status == 'Approved')
                                    <div class="text-center">
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#smsModal">
                                            <i class="fa-solid fa-comment-sms"></i>
                                        </button>
                                        <button class="btn btn-success btn-sm"><i class="fa-solid fa-cloud-sun"></i></button>
                                        <button class="btn btn-info btn-sm mt-2" style="width:100%">Done</button>
                                    </div>
                                    @elseif ($booking->status == 'Disapproved')
                                    <button class="btn btn-info btn-sm">Add Reason</button>
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
                    <!-- Add more event details here -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="smsModal" tabindex="-1" role="dialog" aria-labelledby="smsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('send-sms') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="smsModalLabel">Send SMS to Client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                        <label for="smsContent">SMS Content:</label>
                        <textarea class="form-control" name="smsContent" id="smsContent" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send SMS</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

                    // Format the start date and time in October date format
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