<x-app-layout>

    <div class="container mt-5">
        <section class="gallery p-5">
            <div class="row">
                <small>GALLERY</small>
                <h1>Our Works</h1>
                <hr>
                <div class="gallery-filter">
                    <span class="filter-item active" data-filter="all">All</span>
                    @foreach ($photoshootTypes as $photoshootType)
                    <span class="filter-item" data-filter="{{ $photoshootType->type_name }}">{{ $photoshootType->type_name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="row masonry-grid">
                @foreach ($images as $image)
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 gallery-item all" data-category="all">
                    <a href="{{ asset('storage/images/photoshoots/'.$image->image_path.'') }}" data-bs-toggle="modal" data-bs-target="#imageModal">
                        <img src="{{ asset('storage/images/photoshoots/'.$image->image_path.'') }}" alt="{{ $image->image_name }}" class="w-100 shadow-1-strong rounded mb-4">
                    </a>
                </div>
                @endforeach
            </div>

            @foreach ($photoshootTypes as $photoshootType)
            <div class="row">
                <ul class="list-group list-group-flush">
                    @foreach ($albums as $album)
                    @if ($album->photoshootType->id === $photoshootType->id)
                    <div class="gallery-item {{ $photoshootType->type_name }} hide" data-category="{{ $photoshootType->type_name }}">
                        <div class="gallery-item-inner">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">
                                        <h2>{{ $album->album_name }}</h2>
                                    </div>
                                    {{ $album->created_at->format('F d, Y H:i A') }}
                                </div>
                                <span class="mt-3"><a href="{{ route('images', ['id' => $album->id]) }}" class="btn btn-outline-secondary">View Album</a></span>
                            </li>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </ul>
            </div>
            @endforeach
        </section>
        <script>
            $(document).ready(function() {
                $('.filter-item').click(function() {
                    $('.filter-item').removeClass('active');
                    $(this).addClass('active');
                    var filterValue = $(this).data('filter');
                    $('.gallery-item').hide();
                    $('.gallery-item[data-category="' + filterValue + '"]').show();
                    initMasonry();
                });
            });
        </script>

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