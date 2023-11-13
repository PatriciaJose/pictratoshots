<x-app-layout>
    <div class="container mt-5 p-5">
        <h2>My Bookings</h2>
        <small>Browse through the chronological list of your photoshoot bookings. Each entry contains valuable details of your bookings.</small>
        <hr>
        <div class="card mt-3">
            <div class="card-body">
                <div class="mb-3">
                    <label for="statusFilter" class="form-label">Filter by Status:</label>
                    <select class="form-select" id="statusFilter">
                        <option value="">All</option>
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                        <option value="Canceled">Canceled</option>
                        <option value="Finish">Finished</option>
                    </select>
                </div>

                <table id='table_id' class='display mx'>
                    <thead>
                        <tr>
                            <th>Package</th>
                            <th>Session Date</th>
                            <th>Session Time</th>
                            <th>Location</th>
                            <th>Disapproval Reason</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $bookings)
                        <tr>
                            <td>{{ $bookings->package->package_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($bookings->session_date)->format('F d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($bookings->session_time)->format('h:i A') }}</td>
                            <td>{{ $bookings->location }}</td>
                            <td>{{ $bookings->disapproval_reason }}</td>
                            <td>{{ $bookings->status }}</td>
                            <td>{{ $bookings->created_at->format('F d, Y H:i A') }}</td>
                            <td>{{ $bookings->updated_at->format('F d, Y H:i A') }}</td>
                            <td>
                                @if ($bookings->status == 'Pending')
                                <button class="btn btn-outline-primary btn-sm w-100 mb-1" data-bs-toggle="modal" data-bs-target="#editbookingsModal{{ $bookings->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                                <div class="modal fade" id="editbookingsModal{{ $bookings->id }}" tabindex="-1" aria-labelledby="editbookingsModalLabel{{ $bookings->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editbookingsModalLabel{{ $bookings->id }}">Edit Booking</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('bookings.update', $bookings->id) }}" id="editForm{{ $bookings->id }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="session_date">Session Date</label>
                                                        <input type="date" class="form-control" id="session_date" name="session_date" value="{{ $bookings->session_date }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="session_time">Session Time</label>
                                                        <input type="time" class="form-control" id="session_time" name="session_time" value="{{ $bookings->session_time }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="location">Location</label>
                                                        <textarea class="form-control" id="location" name="location" required>{{ $bookings->location }}</textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var form = document.getElementById('editForm{{ $bookings->id }}');

                                        form.addEventListener('submit', function(event) {
                                            event.preventDefault();

                                            Swal.fire({
                                                title: 'Are you sure?',
                                                text: 'You are about to update the details of your bookings.',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonText: 'Submit',
                                                cancelButtonText: 'Cancel',
                                                confirmButtonColor: 'green',
                                                cancelButtonColor: 'grey',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    form.submit();
                                                }
                                            });
                                        });
                                    });
                                </script>


                                <form action="{{ route('update-booking-status') }}" method="post" id="cancelBookingForm{{ $bookings->id }}">
                                    @csrf
                                    <input type="hidden" name="booking_id" value="{{ $bookings->id }}">
                                    <input type="hidden" name="status" value="Canceled">
                                    <button type="button" class="btn btn-sm w-100 btn-outline-danger mt-1" onclick="confirmCancellation('{{ $bookings->id }}')">Cancel</button>
                                </form>

                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('#table_id').DataTable();

            $('#statusFilter').on('change', function() {
                var status = $(this).val();
                table.column(5).search(status).draw();
            });


            window.confirmCancellation = function(bookingId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You are about to cancel this booking!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'green',
                    cancelButtonColor: 'grey',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#cancelBookingForm' + bookingId).submit();
                    }
                });
            };
        });
    </script>
    @if (Session::has('message'))
    <script>
        console.log("Toastr code is executing.");
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.success("{{ Session::get('message') }}", "Success!", {
            timeOut: 3000
        });
    </script>
    @endif
</x-app-layout>