<x-app-layout>
    <style>
        /* Gallery */

        .gallery .gallery-item {
            width: calc(100% / 3);
            padding: 15px;
        }

        .gallery .gallery-item-inner img {
            width: 100%;
        }

        /* End Gallery */
    </style>
    <div class="container-fluid banner">
        <div id="slide">
            <div class="item" style="background-image: url('storage/images/camera.jpg');">
                <div class="content">
                    <div class="name text-white"><span class="text-dark">Step</span> into the <span class="text-dark">Spotlight</span></div>
                    <div class="des text-white"> Explore, Experience, and Embrace the Art of Photography. Your Journey Begins Here!</div>
                    <a href="#contactUs" class="text-decoration-none text-dark"><button style="background-color:white;border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Contact Us</button></a>
                </div>
            </div>
            <div class="item" style="background-image: url('storage/images/studio.jpg');">
                <div class="content">
                    <div class="name"><span class="text-dark">Welcome to PictratoShots Studio!</span></div>
                    <div class="des text-white">Collaborate with us in capturing the best memories of your lifetime.</div>
                    <a href="{{route('packages')}}" class="text-decoration-none text-dark"><button style="background-color:white;border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Book Now</button></a>
                </div>
            </div>

            <div class="item" style="background-image: url('storage/images/camera.jpg');">
                <div class="content">
                    <div class="name text-white"><span class="text-dark">Step</span> into the <span class="text-dark">Spotlight</span></div>
                    <div class="des text-white"> Explore, Experience, and Embrace the Art of Photography. Your Journey Begins Here!</div>
                    <a href="#contactUs" class="text-decoration-none text-dark"><button style="background-color:white;border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Contact Us</button></a>
                </div>
            </div>
            <div class="item" style="background-image: url('storage/images/studio.jpg');">
                <div class="content">
                    <div class="name"><span class="text-dark">Welcome to PictratoShots Studio!</span></div>
                    <div class="des text-white">Collaborate with us in capturing the best memories of your lifetime.</div>
                    <a href="{{route('packages')}}" class="text-decoration-none text-dark"><button style="background-color:white;border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Book Now</button></a>
                </div>
            </div>
        </div>
        <div class="buttons">
            <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button id="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>
    <section class="py-5 py-xl-8 bg-light">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">What we do?</h2>
                    <p class="text-secondary mb-5 text-center">We craft compelling narratives through the lens, delivering timeless moments and powerful storytelling.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row gy-5">
                @php $counter = 1 @endphp
                @foreach ($photoshootTypes as $photoshootType)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="text-center px-xl-2">
                        <span class="h3 rounded-circle d-inline-block text-white" style="background-color: #9D0520; line-height: 50px; width: 50px; height: 50px;">
                            {{ $counter++ }}
                        </span>
                        <h5 class="m-2">{{ $photoshootType->type_name }}</h5>
                        <p class="m-0 text-secondary">{{ $photoshootType->type_desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>
    <section class="gallery">
        <div class="container">
            <div class="row">
                <small class="text-center">GALLERY</small>
                <h1 class="text-center">Our Recent Works</h1>
                <div class="gallery-filter">
                    <span class="filter-item active" data-filter="all">All</span>
                    @foreach ($photoshootTypes as $photoshootType)
                    <span class="filter-item" data-filter="{{ $photoshootType->type_name }}">{{ $photoshootType->type_name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="row masonry-grid">
                @foreach ($photoshootTypes as $photoshootType)
                @foreach ($photoshootType->albums as $album)
                @foreach ($album->images as $images)
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 gallery-item {{ $photoshootType->type_name }}">
                    <a href="{{ asset('storage/images/photoshoots/'.$images->image_path.'') }}" data-bs-toggle="modal" data-bs-target="#imageModal">
                        <img src="{{ asset('storage/images/photoshoots/'.$images->image_path.'') }}" alt="{{ $images->image_name }}" class="w-100 shadow-1-strong rounded mb-4">
                    </a>
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
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        initMasonry();
                    });

                    function initMasonry() {
                        var masonry = new Masonry('.masonry-grid', {
                            itemSelector: '.gallery-item',
                            columnWidth: '.gallery-item',
                            percentPosition: true
                        });
                    }

                    $(document).ready(function() {
                        var isZoomed = false;
                        var currentIndex = 0;
                        var totalImages = <?= count($album->images); ?>;

                        $('.gallery-item a').click(function() {
                            var imageUrl = $(this).attr('href');
                            $('#lightboxImage').attr('src', imageUrl).removeClass('zoomed');
                            currentIndex = $(this).parent().index();
                        });

                        $('#nextButton').click(function() {
                            currentIndex = (currentIndex + 1) % totalImages;
                            updateLightboxImage();
                        });

                        $('#prevButton').click(function() {
                            currentIndex = (currentIndex - 1 + totalImages) % totalImages;
                            updateLightboxImage();
                        });

                        function updateLightboxImage() {
                            var imageUrl = $('.gallery-item').eq(currentIndex).find('a').attr('href');
                            $('#lightboxImage').attr('src', imageUrl).removeClass('zoomed');
                        }

                        $('#lightboxImage').click(function(e) {
                            isZoomed = !isZoomed;
                            $(this).toggleClass('zoomed', isZoomed);
                            var x = e.pageX - $(this).offset().left;
                            var y = e.pageY - $(this).offset().top;
                            $(this).css('transform-origin', x + 'px ' + y + 'px');
                        });
                    });
                </script>
                @endforeach
                @endforeach
                @endforeach
            </div>
            <div class="text-center my-3">
                <a href="{{ route('gallery') }}"><button class="px-5 py-2" style="background-color:black;color:white;border-top-right-radius: 18px;border-bottom-left-radius:18px">See All</button></a>
            </div>
        </div>

        <div class="testimonial-slider py-5 my-5">
            <div id="carouselExampleControls" class="carousel carousel-dark" data-bs-ride="carousel">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="testimonial-title">
                                <i class="bi bi-quote display-2"></i>
                                <h2 class="fw-bold display-6 text-dark">What our customers say</h2>
                            </div>
                            <button id="prev" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button id="next" class="carousel-control-next" type a boldof="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="col-md-8">
                            <div class="carousel-inner">
                                @foreach ($feedbackData as $data)
                                <div class="carousel-item">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $data['user']->name }}</h3>
                                            <p class="card-text text-muted">Photoshoot Type: {{ $data['photoshootType']->type_name }}</p>
                                            @for ($i = 0; $i < $data['feedback']->rating; $i++)
                                                <i class="fa-solid fa-star text-warning pe-1 pb-3"></i>
                                                @endfor
                                                <p class="card-text"><i class="fa-solid fa-quote-left"></i> {{ $data['feedback']->message }} <i class="fa-solid fa-quote-right"></i></p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 pt-5" id="contactUs">
            <main class="row">
                <section class="col left">
                    <div class="contactTitle">
                        <h2>Contact Us</h2>
                        <p>Feel free to reach out to us anytime.We will get back to you as soon as possible.</p>
                    </div>
                    <div class="contactInfo">
                        <div class="iconGroup">
                            <div class="icon p-4">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="details">
                                <span>Phone</span>
                                <span>0905 264 9919</span>
                            </div>
                        </div>
                        <div class="iconGroup">
                            <div class="icon p-4">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="details">
                                <span>Email</span>
                                <span>pictratoshots@gmail.com</span>
                            </div>
                        </div>

                        <div class="iconGroup">
                            <div class="icon p-4">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="details">
                                <span>Location</span>
                                <span>SPA 2nd flor Diocese Bldg. Penoy Street, Poblacion District III, Pozorrubio, Pangasinan, PH</span>
                            </div>
                        </div>

                    </div>
                    <div class="socialMedia">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    </div>
                </section>
                <section class="col right">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1916.5594563545606!2d120.54257590323688!3d16.111148387545043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391136116e86e5f%3A0x95a4c2c68dfc97aa!2sPictratoshots%20Studio%20-%20Pozorrubio!5e0!3m2!1sen!2sph!4v1699778716477!5m2!1sen!2sph" width="600" height="450" style="border:0;border-radius:15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </section>
            </main>
        </div>
        <script>
            document.getElementById('next').onclick = function() {
                let lists = document.querySelectorAll('.item');
                document.getElementById('slide').appendChild(lists[0]);
            }
            document.getElementById('prev').onclick = function() {
                let lists = document.querySelectorAll('.item');
                document.getElementById('slide').prepend(lists[lists.length - 1]);
            }
            const filterContainer = document.querySelector(".gallery-filter"),
                galleryItems = document.querySelectorAll(".gallery-item");

            filterContainer.addEventListener("click", (event) => {
                if (event.target.classList.contains("filter-item")) {
                    // deactivate existing active 'filter-item'
                    filterContainer.querySelector(".active").classList.remove("active");
                    // activate new 'filter-item'
                    event.target.classList.add("active");
                    const filterValue = event.target.getAttribute("data-filter");
                    galleryItems.forEach((item) => {
                        if (item.classList.contains(filterValue) || filterValue === 'all') {
                            item.classList.remove("hide");
                            item.classList.add("show");
                        } else {
                            item.classList.remove("show");
                            item.classList.add("hide");
                        }
                    });
                }
            });

            $(document).ready(function() {
                var multipleCardCarousel = document.querySelector("#carouselExampleControls");
                if (window.matchMedia("(min-width: 576px)").matches) {
                    var carousel = new bootstrap.Carousel(multipleCardCarousel, {
                        interval: false,
                        wrap: false
                    });
                    var carouselWidth = $(".carousel-inner")[0].scrollWidth;
                    var cardWidth = $(".carousel-item").width();
                    var scrollPosition = 0;
                    $("#carouselExampleControls .carousel-control-next").on("click", function() {
                        if (scrollPosition < carouselWidth - cardWidth * 3) {
                            scrollPosition += cardWidth;
                            $("#carouselExampleControls .carousel-inner").animate({
                                scrollLeft: scrollPosition
                            }, 600);
                        }
                    });
                    $("#carouselExampleControls .carousel-control-prev").on("click", function() {
                        if (scrollPosition > 0) {
                            scrollPosition -= cardWidth;
                            $("#carouselExampleControls .carousel-inner").animate({
                                scrollLeft: scrollPosition
                            }, 600);
                        }
                    });
                } else {
                    $(multipleCardCarousel).addClass("slide");
                }
            });
        </script>
</x-app-layout>