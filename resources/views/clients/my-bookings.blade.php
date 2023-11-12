<x-app-layout>
    <div class="container mt-5 pt-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h2>My Bookings</h2>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
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
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editbookingsModalLabel{{ $bookings->id }}">EditBooking</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('bookings.update', $bookings->id) }}">
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
                                <form action="{{ route('update-booking-status') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="booking_id" value="{{ $bookings->id }}">
                                    <button type="submit" name="status" value="Canceled" class="btn btn-sm w-100 btn-outline-danger mt-1">Cancel</button>
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
            $('#table_id').DataTable();
        });
    </script>

</x-app-layout>