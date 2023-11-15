<x-admin-layout>
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h2>Photos in {{ $album->album_name }}</h2>
                    <button class="btn btn-outline-secondary btn-block btn-sm" data-bs-toggle="modal" data-bs-target="#uploadModal">
                        <i class="fa-solid fa-plus"></i> Add New Images
                    </button>
                </div>
                <nav class="bg-light p-2 mt-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.gallery') }}" class="text-decoration-none">Album</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $album->album_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Photos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="uploadForm" method="post" action="{{ route('upload-photos') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="album_id" value="{{ $album->id }}" class="form-label">
                            <input type="file" name="photos[]" id="photoUpload" multiple accept="image/*" class="form-control" />
                            <div class="card mt-3 pb-3">
                                <div class="card-body">
                                    <div id="photoPreviews" class="row">
                                        <div id="noImageChosen" class="h4 pt-3 col-md-12 text-center">No Image Preview</div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary  btn-block">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const photoInput = document.getElementById('photoUpload');
            const photoPreviews = document.getElementById('photoPreviews');
            const noImageChosen = document.getElementById('noImageChosen');
            let selectedFiles = [];

            photoInput.addEventListener('change', function(e) {
                const newFiles = Array.from(this.files);

                selectedFiles = selectedFiles.concat(newFiles);

                displayPreviews();

                const newFileList = new DataTransfer();
                selectedFiles.forEach((file) => newFileList.items.add(file));
                photoInput.files = newFileList.files;
            });

            function displayPreviews() {
                photoPreviews.innerHTML = '';

                if (selectedFiles.length > 0) {
                    noImageChosen.style.display = 'none';
                } else {
                    noImageChosen.style.display = 'block';
                }

                selectedFiles.forEach((file) => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const preview = document.createElement('div');
                        preview.classList.add('col-md-4', 'position-relative');
                        preview.style.marginTop = '20px';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-fluid');

                        const removeButton = document.createElement('button');
                        removeButton.innerText = 'X';
                        removeButton.classList.add('btn', 'btn-outline-danger', 'btn-sm', 'position-absolute', 'top-0', 'end-0');

                        removeButton.addEventListener('click', function() {
                            photoPreviews.removeChild(preview);

                            selectedFiles = selectedFiles.filter((selectedFile) => selectedFile !== file);

                            const newFileList = new DataTransfer();
                            selectedFiles.forEach((file) => newFileList.items.add(file));
                            photoInput.files = newFileList.files;

                            if (selectedFiles.length === 0) {
                                noImageChosen.style.display = 'block';
                            }
                        });

                        preview.appendChild(img);
                        preview.appendChild(removeButton);
                        photoPreviews.appendChild(preview);
                    };

                    reader.readAsDataURL(file);
                });
            }
        </script>


        <div class="card mt-3">
            <div class="card-body">
                <table id='table_id' class='display mx'>
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Uploaded_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                        <tr>
                            <td><a href="{{ asset('storage/images/photoshoots/' . $image->image_path) }}" target="_blank"><img src="{{ asset('storage/images/photoshoots/' . $image->image_path) }}" class="img-thumbnail" width="50"></a></td>
                            <td>{{ $image->image_path }}</td>
                            <td>{{ $album->created_at->format('F d, Y H:i A') }}</td>
                            <td>
                                <button class="btn btn-danger delete-image" data-image-id="{{ $image->id }}"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-image');
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const imageId = button.getAttribute('data-image-id');

                    Swal.fire({
                        title: 'Are you sure you want to delete this image?',
                        text: 'You won\'t be able to revert this!',
                        icon: 'warning',
                        confirmButtonColor: 'red',
                        cancelButtonColor: 'grey',
                        showCancelButton: true,
                        cancelButtonText: 'Cancel',
                        confirmButtonText: 'Delete',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.delete(`/delete-image/${imageId}`)
                                .then(function(response) {
                                    button.closest('tr').remove();
                                    toastr.options = {
                                        "progressBar": true,
                                        "closeButton": true,
                                    }
                                    toastr.success("Image was successfully deleted", "Success!", {
                                        timeOut: 3000
                                    });
                                })
                                .catch(function(error) {
                                    toastr.error('Error', 'An error occurred while deleting the image.', 'error');
                                });
                        }
                    });
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>


</x-admin-layout>