<x-admin-layout>
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h2>Event Type Management</h2>
                    <button class="btn btn-outline-secondary btn-block btn-sm" data-bs-toggle="modal" data-bs-target="#createEventModal">
                        <i class="fa-solid fa-plus"></i> Create New Event Type
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="createEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createEventModalLabel">Create New Package</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('event.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="type_name">Package Name</label>
                                <input type="text" class="form-control" id="type_name" name="type_name" required>
                            </div>
                            <div class="form-group">
                                <label for="type_desc">Description</label>
                                <textarea class="form-control" id="type_desc" name="type_desc" required></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Event Type</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#createEventModal form').submit(function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You want to create this event type',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: 'green',
                        cancelButtonColor: 'grey',
                        confirmButtonText: 'Create'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).off('submit').submit();
                        }
                    });
                });
            });
        </script>
        <div class="card mt-3">
            <div class="card-body">
                <table id='table_id' class='display mx'>
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Description</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($photoshootTypes as $types)
                        <tr>
                            <td>{{ $types->type_name }}</td>
                            <td>{{ $types->type_desc }}</td>
                            <td>{{ $types->created_at->format('F d, Y H:i A') }}</td>
                            <td>{{ $types->updated_at->format('F d, Y H:i A') }}</td>
                            <td>
                                <button class="btn btn-primary edit-types-btn btn-sm" data-types-id="{{ $types->id }}" data-types-name="{{ $types->type_name }}" data-types-desc="{{ $types->type_desc }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn btn-danger delete-types-btn" data-types-id="{{ $types->id }}"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventModalLabel">Edit Event Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('event.update') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="event_type_id" id="event_type_id" value="">
                        <div class="form-group">
                            <label for="edit_type_name">Package Name</label>
                            <input type="text" class="form-control" id="edit_type_name" name="type_name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_type_desc">Description</label>
                            <textarea class="form-control" id="edit_type_desc" name="type_desc" required></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button> </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#editEventModal form').submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to save changes to this event type',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'blue',
                    cancelButtonColor: 'grey',
                    confirmButtonText: 'Save'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).off('submit').submit();
                    }
                });
            });

            $('.edit-types-btn').click(function() {
                var typeId = $(this).data('types-id');
                var typeName = $(this).data('types-name');
                var typeDesc = $(this).data('types-desc');

                $('#event_type_id').val(typeId);
                $('#edit_type_name').val(typeName);
                $('#edit_type_desc').val(typeDesc);

                $('#editEventModal').modal('show');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.delete-types-btn').click(function() {
                const typeId = $(this).data('types-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to delete this event type',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'red',
                    cancelButtonColor: 'grey',
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: '/event/' + typeId,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                toastr.options = {
                                    "progressBar": true,
                                    "closeButton": true,
                                };
                                toastr.success('Event type deleted successfully.', "Success!", {
                                    timeOut: 3000,
                                    onHidden: function() {
                                        $('.delete-types-btn[data-types-id="' + typeId + '"]').closest('.event-type-container').remove();
                                        location.reload();
                                    }
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
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
</x-admin-layout>