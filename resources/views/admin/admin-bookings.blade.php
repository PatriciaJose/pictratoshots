<x-admin-layout>
    <div class="dashboard-main">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="dashboard-title-text">
                        <h2>Booking Management</h2>
                        <p class="text-grey">ksjkaskhjahjdfjashfjsaj</p>
                    </div>
                </div>
            </div>
            <div class="card">
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
                                    <button class="btn btn-primary">Accept</button>
                                    <button class="btn btn-danger">Reject</button>
                                    @elseif ($booking->status == 'Accepted')
                                    Scheduled
                                    @elseif ($booking->status == 'Rejected')
                                    <button class="btn btn-info">Add Reason</button>
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
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</x-admin-layout>