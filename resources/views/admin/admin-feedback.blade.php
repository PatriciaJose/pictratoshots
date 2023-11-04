<x-admin-layout>
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h2>Feedback & Ratings Overview</h2>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <table id='table_id' class='display mx'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Event</th>
                            <th>Package</th>
                            <th>Feedback</th>
                            <th>Rating</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbackData as $data)
                        <tr>
                            <td> {{ $data['user']->name }}</td>
                            <td> {{ $data['photoshootType']->type_name }}</td>
                            <td>{{ $data['package']->package_name }}</td>
                            <td> {{$data['feedback']->rating}}</td>
                            <td> {{ $data['feedback']->message }}</td>
                            <td>{{ $data['feedback']->created_at->format('F d, Y H:i A') }}</td>
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

</x-admin-layout>