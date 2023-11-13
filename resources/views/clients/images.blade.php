<x-app-layout>
    <div class="container mt-5 p-5">
        <small class="mt-3 ms-1">PHOTOS</small>
        <h1>{{ $album->album_name }}</h1>
       
        <hr> <nav class="ms-1" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('gallery') }}" class="text-decoration-none">Gallery</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $album->album_name }}</li>
            </ol>
        </nav>
        <div class="row masonry-grid mt-5">
            @foreach ($album->images as $image)
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 gallery-item all" data-category="all">
                <a href="{{ asset('storage/images/photoshoots/'.$image->image_path.'') }}" data-bs-toggle="modal" data-bs-target="#imageModal">
                    <img src="{{ asset('storage/images/photoshoots/'.$image->image_path.'') }}" alt="{{ $image->image_name }}" class="w-100 shadow-1-strong rounded mb-4">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn btn-outline-danger close-button" data-bs-dismiss="modal">x</button>
                    <div class="position-relative">
                        <button type="button" class="btn btn-transparent position-absolute top-50 start-0 translate-middle-y" id="prevButton"><i class="fa-solid fa-chevron-left fa-2x"></i></button>
                        <button type="button" class="btn btn-transparent position-absolute top-50 end-0 translate-middle-y" id="nextButton"><i class="fa-solid fa-chevron-right fa-2x"></i></button>
                        <img src="" alt="" id="lightboxImage">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        .gallery .gallery-filter {
            padding: 0 5px;
            width: 100%;
            text-align: left;
            margin-bottom: 20px;
        }

        #imageModal.modal {
            overflow-y: hidden;
        }

        #imageModal .modal-dialog {
            margin: 0;
        }

        #imageModal .modal-content {
            height: 100vh;
            width: 100vw;
        }

        #imageModal .modal-body {
            height: calc(100% - 60px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #lightboxImage {
            max-width: 100vw;
            max-height: 100vh;
            width: auto;
            height: auto;
            transition: transform 0.3s ease-in-out;
            transform-origin: top left;
        }

        #lightboxImage.zoomed {
            transform: scale(2);
        }


        #imageModal .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>

    <script>
        $(document).ready(function() {
            var isZoomed = false;

            $('.gallery-item a').click(function() {
                var imageUrl = $(this).attr('href');
                $('#lightboxImage').attr('src', imageUrl).removeClass('zoomed');
            });

            var currentIndex = 0;
            var images = <?= json_encode($images); ?>;

            $('#nextButton').click(function() {
                currentIndex = (currentIndex + 1) % images.length;
                updateLightboxImage();
            });

            $('#prevButton').click(function() {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateLightboxImage();
            });

            $('#lightboxImage').click(function(e) {
                isZoomed = !isZoomed;
                $(this).toggleClass('zoomed', isZoomed);
                var x = e.pageX - $(this).offset().left;
                var y = e.pageY - $(this).offset().top;
                $(this).css('transform-origin', x + 'px ' + y + 'px');
            });

            function updateLightboxImage() {
                var imageUrl = '{{ asset("storage/images/photoshoots/") }}' + '/' + images[currentIndex].image_path;
                $('#lightboxImage').attr('src', imageUrl).removeClass('zoomed');
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <script>
        function initMasonry() {
            var masonry = new Masonry('.masonry-grid', {
                itemSelector: '.gallery-item',
                columnWidth: '.gallery-item',
                percentPosition: true
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            initMasonry();
        });
    </script>
</x-app-layout>