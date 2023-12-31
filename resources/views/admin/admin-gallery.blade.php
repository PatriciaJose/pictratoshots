<x-admin-layout>
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h2>Albums Management</h2>
                    <button class="btn btn-outline-secondary btn-block btn-sm" data-bs-toggle="modal" data-bs-target="#createAlbumModal">
                        <i class="fa-solid fa-plus"></i> Create New Album
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="createAlbumModal" tabindex="-1" aria-labelledby="createAlbumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="createAlbumForm" method="POST" action="{{ route('albums.store') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="createAlbumModalLabel">Create New Album</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="createAlbumName" class="form-label">Album Name</label>
                                <input type="text" class="form-control" id="createAlbumName" name="album_name">
                                <span id="createAlbumNameError" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="createAlbumType" class="form-label">Type</label>
                                <select class="form-select" id="createAlbumType" name="album_type">
                                    @foreach ($photoshootTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                                <span id="createAlbumTypeError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="confirmCreateAlbum()">Create Album</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function confirmCreateAlbum() {
                document.getElementById('createAlbumNameError').innerText = '';
                document.getElementById('createAlbumTypeError').innerText = '';

                var albumName = document.getElementById('createAlbumName').value;
                var albumType = document.getElementById('createAlbumType').value;

                if (!albumName) {
                    document.getElementById('createAlbumNameError').innerText = 'Please enter the album name.';
                    return;
                }

                if (!albumType) {
                    document.getElementById('createAlbumTypeError').innerText = 'Please select the album type.';
                    return;
                }

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to create the album?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: 'green',
                    cancelButtonColor: 'grey',
                    confirmButtonText: 'Create'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('createAlbumForm').submit();
                    }
                });
            }
        </script>

        <div class="card mt-3">
            <div class="card-body">
                <table id='table_id' class='display mx'>
                    <thead>
                        <div class="form-group mb-2">
                            <label for="filterType">Filter by Event Type:</label>
                            <select class="form-control" id="filterType">
                                <option value="">All</option>
                                @foreach ($photoshootTypes as $type)
                                <option value="{{ $type->type_name }}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <tr>
                            <th>Album Name</th>
                            <th>Type</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $album)
                        <tr>
                            <td>{{ $album->album_name }}</td>
                            <td>{{ $album->photoshootType->type_name }}</td>
                            <td>{{ $album->created_at->format('F d, Y H:i A') }}</td>
                            <td>{{ $album->updated_at->format('F d, Y H:i A') }}</td>
                            <td>
                                <a href="{{ route('albums.photos', ['id' => $album->id]) }}" class="btn btn-info">View Photos</a>
                                <button class="btn btn-primary edit-album-btn" data-album-id="{{ $album->id }}" data-album-name="{{ $album->album_name }}" data-album-type="{{ $album->photoshootType->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn btn-danger delete-album-btn" data-album-id="{{ $album->id }}"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editAlbumModal" tabindex="-1" aria-labelledby="editAlbumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="editAlbumForm" method="POST" action="{{ route('albums.update') }}">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAlbumModalLabel">Edit Album</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="album_id" id="editAlbumId">
                        <div class="mb-3">
                            <label for="editAlbumName" class="form-label">Album Name</label>
                            <input type="text" class="form-control" id="editAlbumName" name="album_name">
                        </div>
                        <div class="mb-3">
                            <label for="editAlbumType" class="form-label">Type</label>
                            <select class="form-select" id="editAlbumType" name="album_type">
                                @foreach ($photoshootTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.edit-album-btn').click(function() {
                const albumId = $(this).data('album-id');
                const albumName = $(this).data('album-name');
                const albumType = $(this).data('album-type');

                $('#editAlbumId').val(albumId);
                $('#editAlbumName').val(albumName);
                $('#editAlbumType').val(albumType);

                $('#editAlbumModal').modal('show');
            });

            $('#editAlbumForm').submit(function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You are about to submit the form',
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
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.delete-album-btn').click(function() {
                const albumId = $(this).data('album-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to delete this album',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'red',
                    cancelButtonColor: 'grey',
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            url: '/albums/' + albumId,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                toastr.options = {
                                    "progressBar": true,
                                    "closeButton": true,
                                }
                                toastr.success('Album deleted successfully.', "Success!", {
                                    timeOut: 3000,
                                    onHidden: function() {
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
        let dataTable
        $(document).ready(function() {
            dataTable = $('#table_id').DataTable();
            $('#filterType').on('change', function() {
                const selectedType = $(this).val();
                console.log('Selected Type:', selectedType);
                dataTable.column(1).search(selectedType).draw();
            });
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