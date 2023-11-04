<x-admin-layout>
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h2>Users Management</h2>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <table id='table_id' class='display mx'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->created_at->format('F d, Y H:i A') }}</td>
                            <td>{{ $user->updated_at->format('F d, Y H:i A') }}</td>
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