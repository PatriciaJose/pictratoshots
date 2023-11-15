<x-admin-layout>
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h2>Packages Management</h2>
                    <button class="btn btn-outline-secondary btn-block btn-sm" data-bs-toggle="modal" data-bs-target="#createPackageModal">
                        <i class="fa-solid fa-plus"></i> Create New Package
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createPackageModal" tabindex="-1" aria-labelledby="createPackageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPackageModalLabel">Create New Package</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('packages.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="package_name">Package Name</label>
                                <input type="text" class="form-control" id="package_name" name="package_name" required>
                            </div>
                            <div class="form-group">
                                <label for="typeID">Event Type</label>
                                <select class="form-control" id="typeID" name="typeID" required>
                                    @foreach($photoshootTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="package_desc">Description</label>
                                <textarea class="form-control" id="package_desc" name="package_desc" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="inclusions">Inclusions</label>
                                <input type="text" class="form-control" id="inclusions" name="inclusions" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Package</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#createPackageModal form').submit(function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You want to create this package',
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
                            <th>Name</th>
                            <th>Event Type</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Inclusions</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $package)
                        <tr>
                            <td>{{ $package->package_name }}</td>
                            <td>{{ $package->photoshootType->type_name }}</td>
                            <td>{{ $package->package_desc }}</td>
                            <td>{{ $package->price }}</td>
                            <td>{{ $package->inclusions }}</td>
                            <td>{{ $package->created_at->format('F d, Y H:i A') }}</td>
                            <td>{{ $package->updated_at->format('F d, Y H:i A') }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editPackageModal{{ $package->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn btn-danger btn-sm delete-package" data-package-id="{{ $package->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('delete-package')) {
                e.preventDefault();
                const packageId = e.target.getAttribute('data-package-id');
                confirmDelete(packageId);
            }
        });

        function confirmDelete(packageId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this package.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                confirmButtonColor: 'red',
                cancelButtonColor: 'grey',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '/packages/delete/' + packageId,
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE',
                        },
                        success: function() {
                            toastr.options = {
                                "progressBar": true,
                                "closeButton": true,
                            }
                            toastr.success('Package was deleted successfully.', "Success!", {
                                timeOut: 3000,
                                onHidden: function() {
                                    location.reload();
                                }
                            });
                        },
                        error: function() {
                            toastr.error('An error occurred while deleting the package.');
                        },
                    });
                }
            });
        }
    </script>


    @foreach($packages as $package)
    <div class="modal fade" id="editPackageModal{{ $package->id }}" tabindex="-1" aria-labelledby="editPackageModalLabel{{ $package->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPackageModalLabel{{ $package->id }}">Edit Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('packages.update', $package->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="package_name">Package Name</label>
                            <input type="text" class="form-control" id="package_name" name="package_name" value="{{ $package->package_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="typeID">Event Type</label>
                            <select class="form-control" id="typeID" name="typeID" required>
                                @foreach($photoshootTypes as $type)
                                <option value="{{ $type->id }}" {{ $type->id == $package->typeID ? 'selected' : '' }}>
                                    {{ $type->type_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="package_desc">Description</label>
                            <textarea class="form-control" id="package_desc" name="package_desc" required>{{ $package->package_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $package->price }}" required>
                        </div>
                        <div class="form-group">
                            <label for="inclusions">Inclusions</label>
                            <input type="text" class="form-control" id="inclusions" name="inclusions" value="{{ $package->inclusions }}" required>
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
        $(document).ready(function() {
            $('#editPackageModal{{ $package->id }} form').submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to save changes to this package',
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
    @endforeach
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