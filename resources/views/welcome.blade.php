<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to Pictratoshots</title>
    <link rel="icon" type="text/css" href="{{ asset('storage/images/Picture1.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5a10e0b94b.js" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        * {
            scrollbar-width: thin;
            scrollbar-color: rgb(92, 73, 255) rgb(255, 255, 255);
        }

        /* Works on Chrome, Edge, and Safari */
        *::-webkit-scrollbar {
            width: 8px;
        }

        *::-webkit-scrollbar-track {
            background: #fffaf1;
        }

        *::-webkit-scrollbar-thumb {
            background-color: #D4D4D4;
            border-radius: 20px;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Orbitron', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar-nav a.nav-link {
            transition: color 0.3s ease;
        }

        .navbar-nav a.hoverable:hover {
            color: red;
        }

        #headerNav {
            background: transparent;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            transition: background 0.5s;
        }

        /* End Navbar */

        /* Slider */
        .banner {
            position: relative;
            height: 740px;
            background-color: #f5f5f5;
        }

        #slide {
            width: max-content;
        }

        .item {
            width: 200px;
            height: 300px;
            background-position: 50% 50%;
            display: inline-block;
            transition: 0.5s;
            background-size: cover;
            position: absolute;
            z-index: 1;
            top: 50%;
            transform: translate(0, -50%);
            border-radius: 20px;
            box-shadow: 0 30px 50px #505050;
        }

        .item:nth-child(1),
        .item:nth-child(2) {
            left: 0;
            top: 0;
            transform: translate(0, 0);
            border-radius: 0;
            width: 100%;
            height: 100%;
            box-shadow: none;
        }

        .item:nth-child(3) {
            left: 50%;
        }

        .item:nth-child(4) {
            left: calc(50% + 220px);
        }

        .item:nth-child(5) {
            left: calc(50% + 440px);
        }

        .item:nth-child(n+6) {
            left: calc(50% + 660px);
            opacity: 0;
        }

        .item .content {
            position: absolute;
            top: 50%;
            left: 100px;
            width: 300px;
            text-align: left;
            padding: 0;
            color: black;
            transform: translate(0, -50%);
            display: none;
        }

        .item:nth-child(2) .content {
            display: block;
            z-index: 11111;
        }

        .item .name {
            font-size: 40px;
            font-weight: bold;
            opacity: 0;
            animation: showcontent 1s ease-in-out 1 forwards
        }

        .item .des {
            margin: 20px 0;
            opacity: 0;
            animation: showcontent 1s ease-in-out 0.3s 1 forwards
        }

        .item button {
            border-top-left-radius: 5px;
            border-bottom-right-radius: 5px;
            padding: 10px 20px;
            border: none;
            opacity: 0;
            animation: showcontent 1s ease-in-out 0.6s 1 forwards
        }

        @keyframes showcontent {
            from {
                opacity: 0;
                transform: translate(0, 100px);
                filter: blur(33px);
            }

            to {
                opacity: 1;
                transform: translate(0, 0);
                filter: blur(0);
            }
        }

        .buttons {
            position: absolute;
            bottom: 30px;
            z-index: 222222;
            text-align: center;
            width: 100%;
        }

        .buttons button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #555;
            transition: 0.5s;
        }

        /* End Slider */

        /* Gallery */
        .gallery {
            width: 100%;
            display: block;
            min-height: 100vh;
            padding: 30px 0;
        }

        .gallery .gallery-filter {
            padding: 0 5px;
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .gallery .gallery-filter .filter-item {
            color: black;
            font-size: 18px;
            text-transform: uppercase;
            display: inline-block;
            margin: 0 10px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            line-height: 1.2;
            transition: all 0.3s ease;
        }

        .gallery .gallery-filter .filter-item.active {
            color: grey;
            border-color: grey;
        }

        .gallery .gallery-item {
            width: calc(100% / 3);
            padding: 15px;
        }

        .gallery .gallery-item-inner img {
            width: 100%;
        }

        .gallery .gallery-item.show {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .gallery .gallery-item.hide {
            display: none;
        }

        @media(max-width: 991px) {
            .gallery .gallery-item {
                width: 50%;
            }
        }

        @media(max-width: 767px) {
            .gallery .gallery-item {
                width: 100%;
            }

            .gallery .gallery-filter .filter-item {
                margin-bottom: 10px;
            }
        }

        /* End Gallery */

        /* Testimonial */
        .testimonial-slider {
            background-color: #f5f5f5;
            padding: 3em 2em;
        }

        .testimonial-title {
            color: black;
        }

        .testimonial-title h2 {
            padding-left: 0.2em;
        }

        .card {
            margin: 0 0.5em;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            border: none;
            height: 100%;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: lightgrey;
            width: 3em;
            height: 3em;
            border-radius: 50%;
            top: 60%;
            transform: translateY(-50%);
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
        }

        @media (min-width: 576px) {
            .carousel-item {
                margin-right: 0;
                flex: 0 0 50%;
                display: block;
            }

            .carousel-inner {
                display: flex;
            }
        }

        @media (min-width: 768px) {
            .carousel-inner {
                padding: 1em;
            }

            .carousel-control-prev,
            .carousel-control-next {
                width: 3em;
                height: 3em;
                position: absolute;
                left: 1em;
                top: 90%;
                opacity: 1;
            }

            .carousel-control-next {
                left: 4.5em;
            }
        }

        /* End Testimonial */

        /* Get In Touch */
        section.left .contactTitle h2 {
            position: relative;
            font-size: 28px;
            color: black;
            display: inline-block;
            margin-bottom: 25px;
        }

        section.left .contactTitle h2::before {
            content: '';
            position: absolute;
            width: 50%;
            height: 1px;
            background-color: black;
            top: 120%;
            left: 0;
        }

        section.left .contactTitle h2::after {
            content: '';
            position: absolute;
            width: 25%;
            height: 3px;
            background-color: black;
            top: calc(120% - 1px);
            left: 0;
        }

        section.left .contactTitle p {
            font-size: 17px;
            color: black;
            letter-spacing: 1px;
            line-height: 1.2;
            padding-bottom: 22px;
        }

        section.left .contactInfo {
            margin-bottom: 16px;
        }

        .contactInfo .iconGroup {
            display: flex;
            align-items: center;
            margin: 25px 0px;
        }

        .iconGroup .icon {
            width: 45px;
            height: 45px;
            border: 2px solid black;
            border-radius: 50%;
            margin-right: 20px;
            position: relative;
        }

        .iconGroup .icon i {
            font-size: 20px;
            color: black;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .iconGroup .details span {
            display: block;
            color: black;
            font-size: 18px;
        }

        .iconGroup .details span:nth-child(1) {
            text-transform: uppercase;
            color: black;
        }

        section.left .socialMedia {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: wrap;
            margin: 22px 0px 20px;
        }

        .socialMedia a {
            width: 35px;
            height: 35px;
            text-decoration: none;
            text-align: center;
            margin-right: 15px;
            border-radius: 5px;
            background-color: black;
            transition: 0.4s;
        }

        .socialMedia a i {
            color: white;
            font-size: 18px;
            line-height: 35px;
            border: 1px solid transparent;
            transition-delay: 0.4s;
        }

        .socialMedia a:hover {
            transform: translateY(-5px);
            background-color: #2e2e2e;
            color: white;
            border: 1px solid black;
        }

        .socialMedia a:hover i {
            color: white;
        }

        /* Code for the right section (column) */

        .row section.right .messageForm {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding-top: 30px;
        }

        .row section.right .inputGroup {
            margin: 18px 0px;
            position: relative;
        }

        .messageForm .halfWidth {
            flex-basis: 48%;
        }

        .messageForm .fullWidth {
            flex-basis: 100%;
        }

        .messageForm input,
        .messageForm textarea {
            width: 100%;
            font-size: 18px;
            padding: 2px 0px;
            color: black;
            border: none;
            border-bottom: 2px solid #666;
            outline: none;
        }

        .messageForm textarea {
            resize: none;
            height: 220px;
            display: block;
        }

        textarea::-webkit-scrollbar {
            width: 5px;
        }

        textarea::-webkit-scrollbar-track {
            background-color: #1e1e1e;
            border-radius: 15px;
        }

        textarea::-webkit-scrollbar-thumb {
            background-color: black;
            border-radius: 15px;
        }

        .inputGroup label {
            position: absolute;
            left: 0;
            bottom: 4px;
            color: black;
            font-size: 18px;
            transition: 0.4s;
            pointer-events: none;
        }

        .inputGroup:nth-child(4) label {
            top: 2px;
        }

        .inputGroup input:focus~label,
        .inputGroup textarea:focus~label,
        .inputGroup input:valid~label,
        .inputGroup textarea:valid~label {
            transform: translateY(-30px);
            font-size: 16px;
        }

        .inputGroup button {
            padding: 8px 16px;
            font-size: 18px;
            background-color: black;
            color: white;
            border: 1px solid transparent;
            border-top-left-radius: 5px;
            border-bottom-right-radius: 5px;
            outline: none;
            cursor: pointer;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
            transition: 0.4s;
        }

        .inputGroup button:hover {
            color: white;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
            border: 1px solid black;
        }

        @media(max-width: 1100px) {
            .messageForm .halfWidth {
                flex-basis: 100%;
            }
        }

        @media(max-width: 900px) {
            .container .row {
                flex-wrap: wrap;
            }

            .row section.left,
            .row section.right {
                flex-basis: 100%;
                margin: 0px;
            }
        }

        /* End Get In Touch */

        /* Footer */
        footer {
            position: fixed;
            bottom: 0;
        }

        @media (max-height:800px) {
            footer {
                position: static;
            }
        }

        .footer-distributed {
            box-sizing: border-box;
            width: 100%;
            text-align: left;
            font: bold 16px;
            padding: 50px 50px 60px 50px;
            margin-top: 80px;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right {
            display: inline-block;
            vertical-align: top;
        }

        /* Footer left */

        .footer-distributed .footer-left {
            width: 30%;
        }

        .footer-distributed h3 {
            color: black;
            margin: 0;
        }


        .footer-distributed h3 span {
            color: black;
        }

        /* Footer links */

        .footer-distributed .footer-links {
            color: black;
            margin: 20px 0 12px;
        }

        .footer-distributed .footer-links a {
            display: inline-block;
            line-height: 1.8;
            text-decoration: none;
            color: inherit;
        }

        .footer-distributed .footer-company-name {
            color: #8f9296;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
        }

        /* Footer Center */

        .footer-distributed .footer-center {
            width: 35%;
        }

        .footer-distributed .footer-center i {
            background-color: #33383b;
            color: white;
            font-size: 25px;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            text-align: center;
            line-height: 42px;
            margin: 10px 15px;
            vertical-align: middle;
        }

        .footer-distributed .footer-center i.fa-envelope {
            font-size: 17px;
            line-height: 38px;
        }

        .footer-distributed .footer-center p {
            display: inline-block;
            color: black;
            vertical-align: middle;
            margin: 0;
        }

        .footer-distributed .footer-center p span {
            display: block;
            font-weight: normal;
            font-size: 14px;
            line-height: 2;
        }

        .footer-distributed .footer-center p a {
            color: white;
            text-decoration: none;
            ;
        }

        /* Footer Right */

        .footer-distributed .footer-right {
            width: 30%;
        }

        .footer-distributed .footer-company-about {
            line-height: 20px;
            color: #92999f;
            font-size: 13px;
            font-weight: normal;
            margin: 0;
        }

        .footer-distributed .footer-company-about span {
            display: block;
            color: black;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-distributed .footer-icons {
            margin-top: 25px;
        }

        .footer-distributed .footer-icons a {
            display: inline-block;
            width: 35px;
            height: 35px;
            cursor: pointer;
            background-color: #33383b;
            border-radius: 2px;
            font-size: 20px;
            color: white;
            text-align: center;
            line-height: 35px;
            margin-right: 3px;
            margin-bottom: 5px;
        }

        .footer-distributed .footer-icons a:hover {
            background-color: #3F71EA;
        }

        .footer-links a:hover {
            color: #3F71EA;
        }

        @media (max-width: 880px) {

            .footer-distributed .footer-left,
            .footer-distributed .footer-center,
            .footer-distributed .footer-right {
                display: block;
                width: 100%;
                margin-bottom: 40px;
                text-align: center;
            }

            .footer-distributed .footer-center i {
                margin-left: 0;
            }
        }

        /* End Footer */
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg " id="headerNav">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-lg-none" href="/">
                <h2 class="text-center"><b>Pictratoshots</b></h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav collapse navbar-collapse" id="navbarNavDropdown">
                <li class="nav-item mb-3">
                    <a class="nav-link" href="/"><i class="fa-brands fa-facebook-f text-white" style="font-size:20px;border: 1px solid white;padding-left:6px;padding-right:6px;padding-top:3px;padding-bottom:3px;border-radius:100%;"></i></a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="/"><i class="fa-brands fa-instagram text-white" style="font-size:20px;border: 1px solid white;padding-left:6px;padding-right:6px;padding-top:3px;padding-bottom:3px;border-radius:100%;"></i></a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="/"><i class="fa-brands fa-x-twitter text-white" style="font-size:20px;border: 1px solid white;padding-left:5px;padding-right:5px;padding-top:3px;padding-bottom:3px;border-radius:100%;"></i></a>
                </li>
            </ul>

            <a class="navbar-brand d-none d-lg-block collapse navbar-collapse justify-content-center" href="/">
                <h2 class="text-center text-white"><b>Pictratoshots</b></h2>
            </a>

            <ul class="navbar-nav collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link hoverable text-white" href="{{ url('/home') }}">Home</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link hoverable text-white" href="{{ route('login') }}">Login</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link hoverable text-white" style="border: 1px solid white;border-top-left-radius: 5px; border-bottom-right-radius: 5px;" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @endauth
                @endif
            </ul>
        </div>
    </nav>

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
                    <a href="{{ route('login') }}"><button style="border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Book Now</button></a>
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
                    <a href="{{ route('login') }}"><button style="border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Book Now</button></a>
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
                        <a href="{{ route('login') }}" class="fw-bold text-decoration-none link-dark small">
                            Pricing & Packages
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                            </svg>
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
            <a href="{{ route('login') }}"><button class="btn">See All</button></a>
            </div>
        </div>
    </section>

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

    <div class="container my-5" id="contactUs">
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
    <footer class="footer-distributed bg-dark">
        <div class="footer-left">
            <h3 class="text-white">Pictratoshots</h3>
            <p class="footer-links text-white">
                <a href="#">Home</a>
                |
                <a href="#">Services</a>
                |
                <a href="#">Gallery</a>
                |
                <a href="#">Contact Us</a>
            </p>
            <p class="footer-company-name">Copyright © 2023 <strong>Pictratoshots Developer</strong> All rights reserved</p>
        </div>
        <div class="footer-center text-white">
            <div>
                <i class="fa fa-map-marker"></i>
                <p class="text-white">Pozorrubio,
                    Pangasinan</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p class="text-white">09123456789</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p class="text-white"><a href="/">pictratoshots@gmail.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span class="text-white">About the company</span>
                <strong>Pictratroshots</strong> is a creative storytelling company specializing in film and photography. We capture and share captivating narratives through the art of visual storytelling, delivering memorable and emotive content.
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
        </div>
    </footer>
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
</body>

</html>