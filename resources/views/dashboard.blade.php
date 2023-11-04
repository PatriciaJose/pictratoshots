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
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anhchay mat tieu</div>
                    <a href="#contactUs"><button style="border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Contact Us</button></a>
                </div>
            </div>
            <div class="item" style="background-image: url('storage/images/studio.jpg');">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anh chay mat tieu</div>
                    <a href="{{ route('packages') }}"><button style="border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Book Now</button></a>
                </div>
            </div>

            <div class="item" style="background-image: url('storage/images/camera.jpg');">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anhchay mat tieu</div>
                    <a href="#contactUs"><button style="border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Contact Us</button></a>
                </div>
            </div>
            <div class="item" style="background-image: url('storage/images/studio.jpg');">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anh chay mat tieu</div>
                    <a href="{{ route('packages') }}"><button style="border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Book Now</button></a>
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
        <div class="container overflow-hidden">
            <div class="row gy-5">
                @php $counter = 1 @endphp
                @foreach ($photoshootTypes as $photoshootType)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="text-center px-xl-2">
                        <span class="h2 badge bg-primary rounded-circle">
                            <h5 class="pt-2 px-2">{{ $counter++ }}</h5>
                        </span>
                        <h5 class="m-2">{{ $photoshootType->type_name }}</h5>
                        <p class="m-0 text-secondary">{{ $photoshootType->type_desc }}</p>
                        <a href="{{ route('packages') }}" class="fw-bold text-decoration-none link-dark small">
                            Pricing & Packages &nbsp;<i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="gallery">
        <div class="container">
            <div class="row">
                <h5 class="text-center">Gallery</h5>
                <h1 class="text-center">Our Recent Works</h1>
                <div class="gallery-filter">
                    <span class="filter-item active" data-filter="all">All</span>
                    @foreach ($photoshootTypes as $photoshootType)
                    <span class="filter-item" data-filter="{{ $photoshootType->type_name }}">{{ $photoshootType->type_name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="row">
                @foreach ($photoshootTypes as $photoshootType)
                @foreach ($photoshootType->albums as $album)
                @foreach ($album->images as $image)
                <div class="gallery-item {{ $photoshootType->type_name }}">
                    <div class="gallery-item-inner">
                        <a href="{{ asset('storage/images/photoshoots/' . $image->image_path) }}"><img src="{{ asset('storage/images/photoshoots/' . $image->image_path) }}" alt="{{ $photoshootType->type_name }}"></a>
                    </div>
                </div>
                @endforeach
                @endforeach
                @endforeach
            </div>
            <div class="text-center my-3">
                <a href="{{ route('gallery') }}"><button class="btn">See All</button></a>
            </div>
        </div>

        <div class="testimonial-slider">
            <div id="carouselExampleControls" class="carousel carousel-dark" data-bs-ride="carousel">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="testimonial-title">
                                <i class="bi bi-quote display-2"></i>
                                <h2 class="fw-bold display-6 text-secondary">What our customers say</h2>
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
        <div class="container my-5">
            <main class="row">
                <section class="col left">
                    <div class="contactTitle">
                        <h2>Get In Touch</h2>
                        <p>Feel free to reach out to us anytime.We will get back to you as soon as possible.</p>
                    </div>
                    <div class="contactInfo">
                        <div class="iconGroup">
                            <div class="icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="details">
                                <span>Phone</span>
                                <span>+00 110 111 00</span>
                            </div>
                        </div>
                        <div class="iconGroup">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="details">
                                <span>Email</span>
                                <span>name.tutorial@gmail.com</span>
                            </div>
                        </div>

                        <div class="iconGroup">
                            <div class="icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="details">
                                <span>Location</span>
                                <span>X Street, Y Road, San Fransisco</span>
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
                    <form class="messageForm">
                        <div class="inputGroup halfWidth">
                            <input type="text" name="" required="required">
                            <label>Your Name</label>
                        </div>
                        <div class="inputGroup halfWidth">
                            <input type="email" name="" required="required">
                            <label>Email</label>
                        </div>
                        <div class="inputGroup fullWidth">
                            <input type="text" name="" required="required">
                            <label>Subject</label>
                        </div>
                        <div class="inputGroup fullWidth">
                            <textarea required="required"></textarea>
                            <label>Say Something</label>
                        </div>
                        <div class="inputGroup fullWidth">
                            <button>Send Message</button>
                        </div>

                    </form>
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