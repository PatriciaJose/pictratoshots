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
                            <td>{{ $bookings->session_date }}</td>
                            <td>{{ $bookings->session_time }}</td>
                            <td>{{ $bookings->location }}</td>
                            <td>{{ $bookings->disapproval_reason }}</td>
                            <td>{{ $bookings->status }}</td>
                            <td>{{ $bookings->created_at->format('F d, Y H:i A') }}</td>
                            <td>{{ $bookings->updated_at->format('F d, Y H:i A') }}</td>
                            <td>
                                @if ($bookings->status == 'Pending')
                                <button class="btn btn-outline-primary btn-sm w-100 mb-1"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
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