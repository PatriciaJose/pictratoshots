<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to Pictratoshots</title>
    <link rel="icon" type="text/css" href="{{ asset('images/Picture1.png') }}">

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
                    <a class="nav-link" href="/AwardsandRecognition"><i class="fa-brands fa-instagram text-white" style="font-size:20px;border: 1px solid white;padding-left:6px;padding-right:6px;padding-top:3px;padding-bottom:3px;border-radius:100%;"></i></a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="/AwardsandRecognition"><i class="fa-brands fa-x-twitter text-white" style="font-size:20px;border: 1px solid white;padding-left:5px;padding-right:5px;padding-top:3px;padding-bottom:3px;border-radius:100%;"></i></a>
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
            <div class="item" style="background-image: url('{{ asset('images/camera.jpg') }}');">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anhchay mat tieu</div>
                    <button style="border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Contact Us</button>
                </div>
            </div>
            <div class="item" style="background-image: url('{{ asset('images/studio.jpg') }}');">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anh chay mat tieu</div>
                    <button style="border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Book Now</button>
                </div>
            </div>

            <div class="item" style="background-image: url('{{ asset('images/camera.jpg') }}');">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anhchay mat tieu</div>
                    <button style="border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Contact Us</button>
                </div>
            </div>
            <div class="item" style="background-image: url('{{ asset('images/studio.jpg') }}');">
                <div class="content">
                    <div class="name">LUNDEV</div>
                    <div class="des">Tinh ru anh di chay pho, chua kip chay pho thi anh chay mat tieu</div>
                    <button style="border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Book Now</button>
                </div>
            </div>

        </div>
        <div class="buttons">
            <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button id="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>
    <!-- Service 5 - Bootstrap Brain Component -->
    <section class="bg-light py-3 py-md-5 py-xl-8">
        <div class="container overflow-hidden">
            <div class="row gy-4 gy-md-5 gy-lg-0 align-items-center">
                <div class="col-12 col-lg-5">
                    <div class="row">
                        <div class="col-12 col-xl-11">
                            <h3 class="fs-6 text-secondary mb-3 mb-xl-4 text-uppercase">What We Do?</h3>
                            <h2 class="display-5 mb-3 mb-xl-4" style="text-align: justify;">We captivate narratives through the art of film</h2>
                            <p class="mb-3 mb-xl-4" style="text-align: justify;">Pictratoshots, established in 2015, is a creative storyteller in film and photography. We craft compelling narratives through the lens, delivering timeless moments and powerful storytelling. Join us in capturing memories and emotions through our visual artistry.</p>
                            <button style="padding:8px;border-top-left-radius: 5px; border-bottom-right-radius: 5px;">Book Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 overflow-hidden">
                    <div class="row gy-4">
                        <div class="col-12 col-sm-4">
                            <div class="card border-0 border-bottom border-dark shadow-sm">
                                <div class="card-body text-center">
                                    <svg xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" width="70" height="70" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" version="1.1" x="0px" y="0px" viewBox="0 0 100 125">
                                        <g transform="translate(0,-952.36218)">
                                            <path style="baseline-shift:baseline;block-progression:tb;color:#000000;direction:ltr;text-indent:0;enable-background:accumulate;text-transform:none;" d="m62.62,955.35a0.60006,0.60006,0,0,0,-0.375,0.1562c-2.0461,1.8349-2.4373,4.6899-1.8437,6.5626a0.60006,0.60006,0,1,0,1.125,-0.375c-0.4282-1.3509-0.098-3.8209,1.5312-5.2813a0.60006,0.60006,0,0,0,-0.4375,-1.0625zm14.344,5.1875,0,0.031c-1.5481,0.051-3.0169,0.8633-3.9062,2.2812-1.0247,1.6333-0.964,3.6354,0,5.1562a0.60006,0.60006,0,0,1,0.031,0.063c0.029,0.043,0.064,0.083,0.094,0.125,0.01,0.012,0.021,0.019,0.031,0.031,0.1669,0.2343,0.3535,0.4546,0.5626,0.6562l0.031,0.031c0.1029,0.097,0.1989,0.1912,0.3125,0.2813,0.012,0.01,0.019,0.021,0.031,0.031,0.1276,0.099,0.2647,0.1923,0.4062,0.2812,0.1419,0.089,0.2907,0.177,0.4375,0.25,0.012,0.01,0.018,0.021,0.031,0.031,0.1352,0.065,0.2989,0.1043,0.4374,0.1563,0.021,0.01,0.041-0.01,0.063,0,2.0926,0.7523,4.4866-0.036,5.7187-2,1.4231-2.2685,0.7395-5.2318-1.5313-6.6563-0.8514-0.5341-1.821-0.781-2.75-0.75zm-27.937,0.9687c-0.2441,0.011-0.478,0.076-0.7188,0.125-0.6423,0.1297-1.2761,0.3993-1.8438,0.8126-1.8968,1.3811-2.5107,4.1171-1.0312,6.0624,1.1957,1.5726,3.5382,2.0626,5.1562,0.75,1.2468-1.0113,1.6574-2.9634,0.5-4.25-0.4141-0.4603-0.9861-0.7202-1.5937-0.7812-0.6075-0.061-1.2798,0.1403-1.75,0.6562-0.2994,0.3287-0.4648,0.7333-0.4687,1.1876,0,0.4542,0.2201,1.0214,0.7187,1.2812,0.3687,0.1921,0.6163,0.1201,0.9375,0,0.1604-0.06,0.3729-0.1562,0.5-0.4062,0.127-0.25,0.056-0.607-0.062-0.8126a0.60003,0.60009,0,0,0,-0.875,-0.1874c0.028-0.1086,0.072-0.223,0.125-0.2813,0.1976-0.2169,0.4521-0.28,0.75-0.25,0.2981,0.03,0.6418,0.182,0.8437,0.4063,0.6505,0.7229,0.4105,1.9196-0.3437,2.5312-1.0488,0.8507-2.659,0.4713-3.4687-0.5938-1.0445-1.3734-0.5975-3.3711,0.7812-4.375,1.6967-1.2355,4.1172-0.6947,5.3125,1,1.4247,2.0201,0.7618,4.896-1.25,6.2813-1.3512,0.9305-3.1196,1.1218-4.6563,0.5313a0.60329,0.60335,0,0,0,-0.4374,1.0937c1.9016,0.7308,4.0868,0.5419,5.7812-0.625,2.5442-1.7519,3.3923-5.3745,1.5625-7.9687-1.0279-1.4576-2.7601-2.2647-4.4687-2.1876zm26.156,2.0313a0.60006,0.60006,0,0,1,0.5312,0.9375c-0.4975,0.7932-0.263,1.8141,0.5313,2.3125a0.61121,0.61121,0,1,1,-0.6563,1.0313c-1.3432-0.8429-1.7486-2.6259-0.9062-3.9688a0.60006,0.60006,0,0,1,0.5,-0.3125zm-36.688,0.031a0.60006,0.60006,0,0,0,-0.4375,0.3437c-1.1921,2.214-2.0989,4.5069-2.125,6.9375-0.026,2.4307,0.85,4.9478,3.0938,7.5312a0.60006,0.60006,0,1,0,0.9062,-0.7812c-2.095-2.4119-2.8355-4.6119-2.8125-6.75,0.023-2.138,0.8523-4.2431,2-6.375a0.60006,0.60006,0,0,0,-0.625,-0.9062zm33.938,5.5937-12.188,7.7187c2.6795,2.1465,3.3238,5.999,1.5,8.9063-1.9832,3.1623-6.18,4.1101-9.3437,2.125-1.4976-0.9418-2.5553-2.4366-2.9688-4.1563l-27.281,17.281c-0.8144,1.3511-1.046,3.0106-0.6876,4.9374,0.366,1.9669,1.3348,4.1955,2.8438,6.5,3.0175,4.609,8.1734,9.5503,14.719,13.656,1.6489,1.0345,3.2929,1.9856,4.9374,2.8126,0.2533-0.7088,0.5979-1.3906,1-2.0313,2.2984-3.6636,6.5075-5.4302,10.531-4.7813,1.3415,0.2165,2.6531,0.7023,3.875,1.4688,3.3042,2.0772,5.1656,5.8432,4.875,9.6875,0.1863-0.041,0.3846-0.077,0.5625-0.125,1.894-0.5158,3.2948-1.424,4.1562-2.75l4.25-36.719-2.8124,1.7812a0.60006,0.60006,0,0,1,-0.9376,-0.5v-5.25l-4.0312-3.3438a0.60006,0.60006,0,0,1,0.1875,-1.0312l4.9687-1.625,1.9376-4.9062a0.60006,0.60006,0,0,1,0.4062,-0.37504,0.60006,0.60006,0,0,1,0.6562,0.25004l1.1876,1.5937,1.0312-9.0313c-0.6477-0.1456-1.2823-0.378-1.875-0.75-0.5875-0.3684-1.089-0.8298-1.5-1.3437zm14.344,5.25c-0.7539,0.01-1.5057,0.1321-2.2188,0.4063a0.60349,0.60355,0,1,0,0.4375,1.125c1.5366-0.5908,3.3049-0.3993,4.6563,0.5312,2.0117,1.3853,2.7058,4.23,1.2812,6.25-1.1953,1.6947-3.6469,2.2355-5.3438,1-1.3786-1.0038-1.8257-3.0016-0.7812-4.375,0.8097-1.0649,2.42-1.4132,3.4688-0.5625,0.7541,0.6116,0.9942,1.8081,0.3437,2.5313-0.2017,0.2242-0.5459,0.3762-0.8437,0.4062-0.2981,0.03-0.5525-0.033-0.75-0.25-0.046-0.051-0.038-0.1546-0.063-0.25a0.60003,0.60009,0,0,0,0.8438,-0.2188c0.1189-0.2055,0.1586-0.5624,0.031-0.8124-0.127-0.2501-0.3082-0.3463-0.4687-0.4063-0.3211-0.1199-0.6002-0.1607-0.9687,0.031-0.4989,0.2597-0.7188,0.7957-0.7188,1.25,0,0.4542,0.1694,0.8588,0.4688,1.1874,0.4701,0.5162,1.1425,0.7173,1.75,0.6563s1.1796-0.3209,1.5937-0.7813c1.1573-1.2864,0.778-3.2386-0.4687-4.25-1.618-1.3124-3.9918-0.8537-5.1876,0.71884-1.4793,1.9454-0.8654,4.7438,1.0313,6.125,0.5676,0.4132,1.2015,0.6829,1.8437,0.8125,1.9267,0.3885,4.0127-0.4593,5.1876-2.125,1.8297-2.5944,0.9816-6.1856-1.5626-7.9375-1.059-0.7293-2.306-1.0763-3.5624-1.0625zm-60.5,2.625c-0.3998,0.02-0.8258,0.04-1.25,0.094a0.60006,0.60006,0,1,0,0.1562,1.1876c3.1692-0.4026,5.391,0.2312,7.1562,1.4374,1.7654,1.2064,3.0831,3.0491,4.2188,5.1876a0.60113,0.60113,0,1,0,1.0625,-0.5626c-1.1792-2.2206-2.5869-4.2533-4.5937-5.625-1.7561-1.2001-3.9511-1.8578-6.75-1.7187zm33,0.4687-8.875,5.625a0.60006,0.60006,0,0,1,0.1874,0.3438c0.3405,1.4154,1.236,2.631,2.4688,3.4062,2.6145,1.6407,6.0178,0.8624,7.6562-1.75,1.5044-2.3981,0.9935-5.5403-1.2187-7.3124a0.60006,0.60006,0,0,1,-0.2187,-0.3126zm13.969,2.75-1.625,4.1563a0.60006,0.60006,0,0,1,-0.375,0.3437l-4.2187,1.4063,3.4062,2.8125a0.60006,0.60006,0,0,1,0.2188,0.4688v4.4374l2.4687-1.5937a0.61117,0.61117,0,0,1,0.25,-0.062l1.1875-10.219a0.60006,0.60006,0,0,1,-0.2188,-0.2812l-1.0937-1.4688zm-52.531,3.8438a0.59859,0.60153,0.020563,0,0,-0.4687,0.375l-2.5937,6.25a0.59859,0.60153,0.020563,0,0,0.3124,0.7812l5,2.0626a0.59859,0.60153,0.020563,0,0,0.7813,-0.3438l2.625-6.25a0.59859,0.60153,0.020563,0,0,-0.3437,-0.7812l-5-2.0313a0.59859,0.60153,0.020563,0,0,-0.063,-0.031,0.59859,0.60153,0.020563,0,0,-0.25,-0.031zm0.4376,1.4062,3.8437,1.5938-2.1563,5.125-3.8437-1.5625,2.1563-5.1563zm67.344,3.4063a0.60006,0.60006,0,0,0,-0.1563,0.031,0.60006,0.60006,0,0,0,-0.4062,0.4687c-0.5808,2.6863,0.7333,5.2378,2.3125,6.4063a0.60317,0.60317,0,0,0,0.7187,-0.9688c-1.1391-0.8428-2.3058-3.0495-1.8437-5.1875a0.60006,0.60006,0,0,0,-0.625,-0.75zm-49.812,3.594a0.60028,0.59984,0.009635,0,1,0.6562,0.25l4.8126,6.625,8.2187,0.5a0.60028,0.59984,0.009635,0,1,0.2187,0.031,0.60028,0.59984,0.009635,0,1,0.25,0.90625l-4.8124,6.6873,2.0624,7.9376a0.60028,0.59984,0.009635,0,1,-0.7812,0.7187l-7.8125-2.5313-6.9375,4.4063a0.60028,0.59984,0.009635,0,1,-0.9062,-0.5l-0.031-8.2187-6.3437-5.2188a0.60028,0.59984,0.009635,0,1,0.1874,-1.0312l7.8126-2.5625,3.0312-7.625a0.60028,0.59984,0.009635,0,1,0.375,-0.375zm0.3438,1.8126-2.75,6.9062a0.60028,0.59984,0.009635,0,1,-0.3438,0.3438l-7.0312,2.3123,5.6874,4.6876a0.60028,0.59984,0.009635,0,1,0.2188,0.5l0.031,7.4062,6.25-4a0.60028,0.59984,0.009635,0,1,0.5,-0.094l7.0626,2.3126-1.8438-7.1876a0.60028,0.59984,0.009635,0,1,0.062,-0.5l4.3437-5.9999-7.4062-0.4687a0.60028,0.59984,0.009635,0,1,-0.4375,-0.25l-4.3437-5.9686zm41.375,1.4062a0.59859,0.60153,0.020563,0,0,-0.5,0.375l-2.5938,6.25a0.59859,0.60153,0.020563,0,0,0.3125,0.7811l5,2.0626a0.59859,0.60153,0.020563,0,0,0.7813,-0.3126l2.5937-6.2498a0.59859,0.60153,0.020563,0,0,-0.3125,-0.7812l-5-2.0625a0.59859,0.60153,0.020563,0,0,-0.125,-0.031,0.59859,0.60153,0.020563,0,0,-0.1562,0v-0.031zm0.375,1.375,3.875,1.5938-2.1563,5.1248-3.8437-1.5937,2.125-5.125zm-70.281,1.7188a0.60006,0.60006,0,0,0,-0.4063,0.4687c-0.5808,2.6864,0.7334,5.2376,2.3126,6.4062a0.60314,0.60314,0,0,0,0.7187,-0.9688c-1.1391-0.8428-2.3372-3.0493-1.875-5.1874a0.60006,0.60006,0,0,0,-0.75,-0.7187zm51.312,2.4374c1.2418-0.039,2.5264,0.26,3.6562,0.9688,3.0129,1.8899,3.9205,5.8636,2.0313,8.8749-1.8889,3.0113-5.8933,3.9525-8.9063,2.0625-3.0128-1.8901-3.9202-5.8949-2.0312-8.9063,1.1806-1.8818,3.1801-2.9348,5.25-2.9999zm0.031,1.1876c-1.6879,0.051-3.3162,0.899-4.2812,2.4373-1.5442,2.4616-0.7764,5.7357,1.6875,7.2813,2.4639,1.5457,5.7058,0.774,7.25-1.6875,1.5443-2.4615,0.8077-5.673-1.6563-7.2188-0.9239-0.5793-1.9872-0.8434-3-0.8123zm24.875,7.7499c-0.5678,0.018-1.1249,0.1118-1.6562,0.3124-1.4169,0.5355-2.6428,1.7174-4.2188,3.7188a0.60033,0.60033,0,1,0,0.9376,0.75c1.5271-1.9397,2.6441-2.9375,3.7187-3.3438,1.0749-0.4061,2.2122-0.2951,4,0.2188a0.60312,0.60312,0,0,0,0.3437,-1.1562c-0.9374-0.2696-1.7813-0.452-2.5624-0.5-0.1954-0.012-0.3732-0.01-0.5626,0zm-73.594,4c-0.5678,0.018-1.125,0.1118-1.6563,0.3124-1.4167,0.5355-2.6427,1.7174-4.2187,3.7188a0.60033,0.60033,0,0,0,0.9375,0.75c1.5271-1.9396,2.644-2.9688,3.7188-3.375,1.0748-0.4061,2.2121-0.264,4,0.25a0.6031,0.6031,0,0,0,0.3437,-1.1562c-0.9374-0.2696-1.7813-0.452-2.5625-0.5-0.1954-0.012-0.3732-0.01-0.5625,0zm68.75,3.9374c-0.2441,0.011-0.478,0.014-0.7187,0.063-0.6423,0.1296-1.2763,0.4305-1.8438,0.8437-1.8968,1.3812-2.4794,4.1484-1,6.0937,1.1957,1.5726,3.5383,2.0626,5.1562,0.75,1.2468-1.0113,1.626-2.9634,0.4688-4.25-0.4142-0.4603-0.9862-0.7514-1.5938-0.8124-0.6074-0.061-1.2798,0.1402-1.75,0.6562-0.2994,0.3286-0.4646,0.7332-0.4687,1.1875,0,0.4542,0.22,0.9902,0.7187,1.25,0.3687,0.1921,0.6476,0.1829,0.9688,0.062,0.1604-0.06,0.3417-0.1874,0.4688-0.4375,0.127-0.25,0.088-0.5756-0.031-0.7813a0.60003,0.60009,0,0,0,-0.875,-0.1874c0.028-0.1086,0.04-0.2543,0.094-0.3126,0.1976-0.2168,0.4521-0.28,0.75-0.25,0.2981,0.03,0.6419,0.182,0.8438,0.4063,0.6504,0.7231,0.4104,1.9195-0.3438,2.5313-1.0488,0.8507-2.6589,0.5024-3.4687-0.5626-1.0444-1.3734-0.5974-3.3711,0.7813-4.375,1.6967-1.2355,4.1485-0.6947,5.3437,1,1.4247,2.0201,0.7618,4.896-1.25,6.2813-1.3512,0.9305-3.1509,1.0906-4.6875,0.5a0.60351,0.60356,0,0,0,-0.4375,1.125c1.9017,0.7308,4.0868,0.5107,5.7813-0.6563,2.5442-1.7518,3.3922-5.3431,1.5624-7.9374-1.0279-1.4576-2.7599-2.2647-4.4687-2.1876zm-62.281,2.8126c-1.6617,0-3.3141,0.7121-4.4062,2.125-1.2465,1.6126-1.4382,3.8665-0.5,5.5937,0.3126,0.5757,0.7819,1.0791,1.3438,1.5,1.8778,1.4068,4.7007,1.1736,6.125-0.8125,1.1512-1.6054,0.9176-3.9957-0.8126-5.1562-1.3333-0.8943-3.3296-0.6721-4.2187,0.8124-0.3181,0.5312-0.4015,1.1515-0.2813,1.75,0.1202,0.5986,0.4936,1.1711,1.125,1.4688,0.4022,0.1895,0.846,0.2234,1.2813,0.094,0.4355-0.1299,0.8984-0.5095,1-1.0626,0.075-0.4089-0.041-0.6345-0.25-0.9062-0.1044-0.1358-0.255-0.2958-0.5313-0.3438s-0.5884,0.1076-0.75,0.2813a0.60002,0.6001,0.022771,0,0,0.063,0.9063c-0.112,0.01-0.2411,0.031-0.3126,0-0.2653-0.1251-0.3785-0.3938-0.4374-0.6876-0.059-0.2936-0.03-0.6162,0.125-0.875,0.4998-0.8343,1.7247-0.947,2.5312-0.4062,1.1214,0.7523,1.2484,2.3816,0.4688,3.4688-1.0055,1.4022-3.0413,1.5535-4.4063,0.5312-1.6799-1.2585-1.8932-3.7344-0.625-5.375,1.5118-1.9558,4.4593-2.1717,6.375-0.6562,1.2869,1.0177,1.9875,2.67,1.875,4.3124a0.60327,0.60334,0.022771,0,0,1.1875,0.094c0.1393-2.0325-0.6989-4.0673-2.3125-5.3438-1.0599-0.8384-2.3638-1.2797-3.6563-1.2812v-0.031zm33.938,2.2812c-2.9658,0.095-5.8314,1.6031-7.5313,4.3125-0.3762,0.5997-0.6742,1.2624-0.9063,1.9375,4.4874,2.1342,8.8546,3.4755,12.625,3.9688,1.9483,0.2543,3.7418,0.2654,5.3126,0.062,0.396-3.5195-1.2585-6.9745-4.2813-8.875-1.6271-1.0205-3.4394-1.4632-5.2187-1.4062zm-20.656,8.4062a0.60006,0.60006,0,0,0,-0.4063,0.2813c-1.6893,2.7115-3.5746,4.0808-5.625,4.6875-2.0503,0.6068-4.3122,0.4385-6.6874-0.031a0.60374,0.60374,0,1,0,-0.2188,1.1874c2.4666,0.4882,4.9191,0.6899,7.25,0,2.3307-0.6898,4.4719-2.2831,6.2812-5.1874a0.60006,0.60006,0,0,0,-0.5937,-0.9376zm7.0313,0.3438a0.60006,0.60006,0,0,0,-0.2813,0.1875c-1.7757,1.7801-3.3106,3.7096-4.0313,6.0313-0.7207,2.3215-0.598,5.0074,0.8126,8.125a0.60129,0.60129,0,1,0,1.0937,-0.5c-1.3169-2.9106-1.3839-5.2394-0.75-7.2813,0.6341-2.042,2.0087-3.817,3.7187-5.5313a0.60006,0.60006,0,0,0,-0.5624,-1.0312zm32.844,1.9688a0.60064,0.59948,0,0,0,-0.4063,0.8124l3.1876,8.3438a0.60064,0.59948,0,0,0,1.0312,0.1562l5.6562-6.9687a0.60064,0.59948,0,0,0,-0.375,-0.9687l-8.8437-1.375a0.60064,0.59948,0,0,0,-0.1875,0,0.60064,0.59948,0,0,0,-0.062,0zm1.0625,1.3437,6.8125,1.0937-4.3437,5.3126-2.4688-6.4063zm-10.719,4.7187a0.60006,0.60006,0,0,0,-0.4687,0.4688c-0.5807,2.6864,0.7645,5.2377,2.3437,6.4062a0.60313,0.60313,0,1,0,0.7188,-0.9687c-1.1394-0.8431-2.3374-3.0494-1.875-5.1875a0.60006,0.60006,0,0,0,-0.7188,-0.7188zm-17.844,2.1563a0.60153,0.5986,0.015353,0,0,-0.4687,0.5313l-0.5,5.375a0.60153,0.5986,0.015353,0,0,-0.031,0.094,0.60153,0.5986,0.015353,0,0,0.5625,0.5625l6.75,0.6562a0.60153,0.5986,0.015353,0,0,0.6562,-0.5312l0.4688-5.375a0.60153,0.5986,0.015353,0,0,-0.5312,-0.6562l-6.75-0.6563a0.60153,0.5986,0.015353,0,0,-0.1563,0zm0.6563,1.25,5.5624,0.5313-0.375,4.1562-5.5937-0.5312,0.4063-4.1563z" fill-rule="nonzero" fill="#000" />
                                        </g>
                                    </svg>
                                    <h5 class="mb-3">Birthdays</h5>
                                    <p class="mb-3 text-secondary small">Preserve Your Special Day Forever!</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-dark small">
                                        Pricing & Packages
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.h5.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="card border-0 border-bottom border-dark shadow-sm">
                                <div class="card-body text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 96 120" style="enable-background:new 0 0 96 96;" xml:space="preserve">
                                        <g>
                                            <path d="M93.1,68l-0.3-1.6c-0.1-0.8-3.5-20.7-5.5-27.7c-3.2-11-9.5-16.1-19.9-16.1s-16.6,5.1-19.9,16.1c-0.9,3-2,8.2-3,13.4   c-2.9-0.8-5.8-1.3-6.2-1.3h-1.1L37,51.9c-0.5,2.5-4.7,16.5-6.9,23.7c-2.2-7.2-6.4-21.2-6.9-23.7L23,50.8h-1.1   c-0.8,0-11,1.9-12.2,4.2C8.8,56.7,6,72.5,4.9,79h40.5h1.4h8.6c0,0,0,0,0-0.1h25.6c0.3,0,5.1,0.1,7.1,0.1h1.4v-1.4   c0-3.7-0.3-6.9-0.8-9.6H93.1z M57.2,76.2c0-2.2,1.8-4.1,4.1-4.1c2.2,0,4.7,1.8,4.8,4.1H57.2z M69.5,76.2c0-2.1,2.2-4.1,4.6-4.1   c2.2,0,4.1,1.8,4.1,4.1H69.5z M82,76.2l-2.2-9.3l-0.4,5c-1.3-1.6-3.2-2.5-5.3-2.5c-2.6,0-5,1.4-6.3,3.5c-1.3-2-3.6-3.5-6.5-3.5   c-2.5,0-4.6,1.3-5.8,3.3l-0.6-5.7L54,71c-0.7-4-1.5-8.3-2.2-11.4c0-0.1,0.1-0.1,0.1-0.2c0.9-0.8,6.1-2.6,8.3-2.9   c1.9,1.7,4.3,2.5,7.2,2.5s5.3-0.8,7.2-2.5c2.2,0.3,7.4,2.1,8.3,2.9c1.1,2.2,3.5,7.9,3.7,16.9C85.1,76.2,83.2,76.2,82,76.2z    M55.7,43.4c0.1-0.2,3.8-0.2,3.8-0.2l0.4-3.4c1.4-2.1,2.1-2.7,3.4-6.2c3.4,2.7,7.6,4.1,11.7,4.8c0,1.4,0.4,4.7,0.4,4.7   s3.6,0,3.8,0.2c0,0.1,0.1,0.3,0,1c-0.2,1.1-0.6,1.9-1.1,2.1c-0.4,0.2-1,0.1-1.8-0.3l-1.3-0.7l-0.6,1.4c-1.5,3.8-2.7,6.3-6.1,6.6   c-0.1,0-0.7,0-0.9,0c-0.2,0-0.8,0-0.9,0c-3.4-0.3-4.6-2.8-6.1-6.6l-0.6-1.4l-1.3,0.7c-0.8,0.4-1.4,0.5-1.8,0.3   c-0.5-0.2-0.8-1-1.1-2.1C55.6,43.7,55.6,43.4,55.7,43.4z M88,65.3c-0.9-3.6-2-6-2.6-7.3v0c-0.4-0.9-2.2-1.8-4.2-2.5   c2-12.3-3.4-24.6-3.5-25c-0.7-2-3-4.4-10.2-4.4c-7.3,0-9.6,2.4-10.2,4.4C57,30.9,52.3,46,53,55.6c0,0,0.1,0,0.1,0   c-0.7,0.3-1.4,0.6-2,0.9c-0.2-0.8-0.4-1.3-0.5-1.6c-0.4-0.8-1.8-1.5-3.4-2.1c1-5.2,2.1-10.5,3-13.4c2.9-9.8,8.2-14.1,17.2-14.1   c9,0,14.4,4.4,17.2,14.1c1.7,5.7,4.3,20.8,5.2,25.7H88z" />
                                            <path d="M18.3,44.2c0.8,0.4,1.8,0.5,2.8,0.2c1.5,3.6,3.5,7.1,9,7.1s7.5-3.6,9-7.1c1,0.3,2,0.2,2.8-0.2c1.3-0.6,2.1-2,2.5-4.1   c0.3-1.4,0.1-2.5-0.6-3.3s-1.6-1-2.5-1.1c0.6-3.6,1.1-8.5,0.3-10.7c-0.8-2.5-4.6-3.7-11.6-3.7S19.4,22.5,18.5,25   c-0.8,2.3-0.3,7.1,0.3,10.7c-0.8,0.1-1.8,0.3-2.5,1.1c-0.7,0.8-0.9,1.9-0.6,3.3C16.2,42.2,17,43.5,18.3,44.2z M18.5,38.6   c0.1-0.1,0.6-0.2,1.5-0.1c0.3,0,0.5,0,0.6,0h1.6l-0.3-1.6C21.1,33,26,28.2,26,28.2s3.4,2.7,7.6,4.1c2.9,1,5.1,0.7,4.8,4.5L38,38.4   l1.6,0.1c0.2,0,0.3,0,0.6,0c0.9-0.1,1.4,0,1.5,0.1c0.1,0.1,0.1,0.3,0,1c-0.2,1.2-0.5,1.9-1,2.1c-0.3,0.1-1,0.1-1.8-0.3l-1.3-0.7   l-0.5,1.4c-1.6,4.1-2.8,6.7-6.9,6.7c-4.1,0-5.3-2.5-6.9-6.7l-0.5-1.4l-1.4,0.7c-0.8,0.4-1.4,0.5-1.8,0.3c-0.4-0.2-0.8-1-1-2.1   C18.3,38.9,18.4,38.7,18.5,38.6z" />
                                            <path d="M34.5,57.3c0.3,0.2,0.7,0,0.7-0.4v-5.1c0-0.3-0.4-0.6-0.7-0.4l-2.3,1.5c-0.1,0.1-0.3,0.1-0.5,0c-0.4-0.2-1-0.3-1.5-0.3   s-1.1,0.1-1.5,0.3c-0.1,0.1-0.3,0.1-0.5,0l-2.3-1.5c-0.3-0.2-0.7,0-0.7,0.4v5.1c0,0.3,0.4,0.6,0.7,0.4l2.5-1.6v-0.1   c0.5,0.3,1.1,0.5,1.8,0.5s1.3-0.2,1.8-0.5v0.1L34.5,57.3z" />
                                        </g>
                                    </svg>
                                    <h5 class="mb-3">Weddings</h5>
                                    <p class="mb-3 text-secondary small">Seal Your Love Story in Timeless Elegance</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-dark small">
                                        Pricing & Packages
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="card border-0 border-bottom border-dark shadow-sm">
                                <div class="card-body text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" data-name="Layer 1" viewBox="0 0 100 125" x="0px" y="0px">
                                        <path d="M72.112,28.043a22.754,22.754,0,0,0,0-9.567,4.784,4.784,0,1,1,0,9.567ZM50,45.88a22.594,22.594,0,0,1-18.71-9.906,40.926,40.926,0,0,0-6.3,15.406c.88,1.273,6.141,8.443,17.566,15.46C61.506,60.524,70.6,45.1,72.167,42.2a37.092,37.092,0,0,0-3.456-6.227A22.6,22.6,0,0,1,50,45.88ZM24.417,55.074a49.634,49.634,0,0,0-.328,5.705c0,19.805,11.6,35.86,25.911,35.86,8.871,0,16.7-6.171,21.37-15.579C43.246,74.814,29.108,60.712,24.417,55.074Zm21.2,13.554a97.524,97.524,0,0,0,26.9,9.907,46.714,46.714,0,0,0,3.395-17.756,47.467,47.467,0,0,0-2.492-15.361C70.2,50.6,61.382,62.591,45.616,68.628ZM27.888,28.043a22.754,22.754,0,0,1,0-9.567,4.784,4.784,0,1,0,0,9.567ZM30.1,23.26a19.9,19.9,0,0,1,19.865-19.9,3.67,3.67,0,1,1-1.92,6.781,3.7,3.7,0,0,1-1.362-1.525,1.355,1.355,0,1,0-2.444,1.169A6.389,6.389,0,1,0,55.73,4.2,19.9,19.9,0,1,1,30.1,23.26Zm24.3,1.477a1.361,1.361,0,0,0,2.721,0,1.594,1.594,0,0,1,3.187,0,1.361,1.361,0,0,0,2.721,0,4.315,4.315,0,0,0-8.629,0Zm-8.49,9.372a3.892,3.892,0,0,1-1.545-2.99,1.361,1.361,0,0,0-2.721,0A6.582,6.582,0,0,0,44.2,36.214a9.486,9.486,0,0,0,11.606,0,6.582,6.582,0,0,0,2.554-5.095,1.361,1.361,0,0,0-2.721,0,3.892,3.892,0,0,1-1.545,2.99,6.805,6.805,0,0,1-8.182,0Zm-8.937-9.372a1.361,1.361,0,0,0,2.721,0,1.594,1.594,0,0,1,3.187,0,1.361,1.361,0,0,0,2.721,0,4.315,4.315,0,0,0-8.629,0Z" />
                                    </svg>
                                    <h5 class="mb-3">Christening</h5>
                                    <p class="mb-3 text-secondary small">Baptism Moments Frozen in Time.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-dark small">
                                        Pricing & Packages
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="card border-0 border-bottom border-dark shadow-sm">
                                <div class="card-body text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve">
                                        <path d="M29.681,41.185c0.212,0.287,0.653,0.357,0.944,0.144L49.91,27.137L69.195,41.33c0.117,0.085,0.255,0.131,0.398,0.131  c0.215,0,0.418-0.104,0.545-0.275l1.534-2.085c0.22-0.301,0.155-0.723-0.146-0.942L52.145,23.895v-8.613h5.363  c0.248,0,0.447-0.2,0.447-0.447v-3.576c0.001-0.248-0.199-0.447-0.446-0.447h-5.364V5.446C52.145,5.2,51.945,5,51.698,5h-3.577  c-0.248,0-0.446,0.2-0.446,0.446v5.365h-5.364c-0.248,0-0.448,0.199-0.448,0.447v3.576c0,0.247,0.2,0.447,0.448,0.447h5.364v8.614  L28.292,38.158c-0.3,0.22-0.365,0.642-0.144,0.942L29.681,41.185z" />
                                        <path d="M94.768,60.271L83.908,44.768c-0.225-0.319-0.721-0.577-1.11-0.577H71.08v19.76h-3.059V43.354L49.91,30.024l-18.112,13.33  V63.95H28.74V44.19H17.203c-0.39,0-0.886,0.258-1.11,0.577L5.232,60.271C5.121,60.43,5.03,60.718,5.03,60.913v2.951  c0,0.194,0.158,0.354,0.353,0.354h2.999v30.075c0,0.391,0.316,0.706,0.707,0.706H41.21c0.195,0,0.352-0.159,0.352-0.354v-16  c0-3.1,2.194-6.926,8.348-6.926s8.348,3.826,8.348,6.926v16c0,0.195,0.157,0.354,0.352,0.354h32.303c0.39,0,0.707-0.315,0.707-0.706  V64.219h2.999c0.194,0,0.353-0.158,0.353-0.354v-2.951C94.971,60.718,94.879,60.43,94.768,60.271z M29.742,85.355  c0,0.195-0.158,0.354-0.353,0.354h-8.821c-0.195,0-0.353-0.157-0.353-0.354v-9.685c0-1.769,1.252-3.952,4.763-3.952  c3.512,0,4.764,2.184,4.764,3.952V85.355z M54.093,58.563h-8.187c-0.194,0-0.352-0.158-0.352-0.353v-9.063  c0-1.65,1.168-3.688,4.445-3.688c3.276,0,4.444,2.038,4.444,3.688v9.063h0.002C54.445,58.404,54.287,58.563,54.093,58.563z   M79.785,85.355c0,0.195-0.158,0.354-0.354,0.354h-8.82c-0.195,0-0.354-0.157-0.354-0.354v-9.685c0-1.769,1.252-3.952,4.764-3.952  s4.764,2.184,4.764,3.952V85.355z" />
                                    </svg>
                                    <h5 class="mb-3">Interments</h5>
                                    <p class="mb-3 text-secondary small">Capture Farewell with Dignity.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-dark small">
                                        Pricing & Packages
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="card border-0 border-bottom border-dark shadow-sm">
                                <div class="card-body text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" data-name="Layer 1" viewBox="0 0 48 60" x="0px" y="0px">
                                        <path d="M33,14.69a6.56,6.56,0,1,0,6.61,6.56A6.59,6.59,0,0,0,33,14.69Zm0,10.12a3.56,3.56,0,1,1,3.61-3.56A3.59,3.59,0,0,1,33,24.81Z" />
                                        <path d="M25.37,26.68l-3,3a1.5,1.5,0,0,0,1.05,2.56,1.52,1.52,0,0,0,1.06-.43l3-3a1.5,1.5,0,1,0-2.12-2.13Z" />
                                        <path d="M39.56,16.25a1.52,1.52,0,0,0,1-.43l3-3a1.5,1.5,0,1,0-2.11-2.13l-3,2.95a1.5,1.5,0,0,0,0,2.12A1.48,1.48,0,0,0,39.56,16.25Z" />
                                        <path d="M19.49,22.75h4.22a1.5,1.5,0,0,0,0-3H19.49a1.5,1.5,0,1,0,0,3Z" />
                                        <path d="M46.5,19.75H42.27a1.5,1.5,0,0,0,0,3H46.5a1.5,1.5,0,0,0,0-3Z" />
                                        <path d="M25.37,15.82a1.56,1.56,0,0,0,1.06.43,1.5,1.5,0,0,0,1.06-2.57l-3-2.95a1.5,1.5,0,1,0-2.11,2.13Z" />
                                        <path d="M40.61,26.68a1.5,1.5,0,0,0-2.11,2.13l3,3a1.48,1.48,0,0,0,1,.43,1.5,1.5,0,0,0,1.06-2.56Z" />
                                        <path d="M33,13.56a1.5,1.5,0,0,0,1.5-1.5V7.87a1.5,1.5,0,0,0-3,0v4.19A1.5,1.5,0,0,0,33,13.56Z" />
                                        <path d="M33,28.93a1.51,1.51,0,0,0-1.5,1.5v4.19a1.5,1.5,0,1,0,3,0V30.43A1.5,1.5,0,0,0,33,28.93Z" />
                                        <path d="M26.25,35a1.5,1.5,0,0,0-1.81,1.1,3.38,3.38,0,0,1-3.29,2.56H6.88a3.83,3.83,0,1,1,0-7.65,3.25,3.25,0,0,1,.44,0A1.5,1.5,0,0,0,9,29.74,4.08,4.08,0,0,1,15.28,27,1.5,1.5,0,0,0,17,24.51,7.11,7.11,0,0,0,6.33,28a6.82,6.82,0,0,0,.55,13.63H21.15a6.35,6.35,0,0,0,6.2-4.85A1.48,1.48,0,0,0,26.25,35Z" />
                                    </svg>
                                    <h5 class="mb-3">Outdoor</h5>
                                    <p class="mb-3 text-secondary small">Unveil Outdoors, Discover You.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-dark small">
                                        Pricing & Packages
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="card border-0 border-bottom border-dark shadow-sm">
                                <div class="card-body text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 64 80" enable-background="new 0 0 64 64" xml:space="preserve">
                                        <path d="M11,55H8V35.2099609H6V55H3c-0.5499878,0-1,0.4500122-1,1v4c0,0.5499878,0.4500122,1,1,1s1-0.4500122,1-1v-3h2v3  c0,0.5499878,0.4500122,1,1,1s1-0.4500122,1-1v-3h2v3c0,0.5499878,0.4500122,1,1,1s1-0.4500122,1-1v-4  C12,55.4500122,11.5499878,55,11,55z M8,33H6v-6h2V33z M12,5h40v4H12V5z M12.5300293,35.6099854L10,31.3900146v-2.7800293  l2.5300293-4.2199707c0.3099976-0.5100098,0.6999512-1,1.1599731-1.4500122C15,21.6900024,16.7199707,21,18.5300293,21H24v18  h-5.4699707c-0.4500122,0-0.9000244-0.0400391-1.3400269-0.1300049c-0.289978-0.0499878-0.5800171-0.1400146-0.8599854-0.2299805  c-0.9800415-0.3200073-1.8800049-0.8500366-2.6400146-1.5800171C13.2299805,36.6099854,12.8400269,36.1199951,12.5300293,35.6099854  z M50,51H14V39.7799683c0.0499878,0.0300293,0.0999756,0.0499878,0.1400146,0.0700073  c0.2600098,0.1400146,0.5100098,0.2700195,0.7799683,0.3900146c0.0599976,0.0299683,0.1199951,0.0599976,0.1799927,0.0800171  c0.3300171,0.1399536,0.6600342,0.25,1,0.3399658c0.0800171,0.0300293,0.1600342,0.0400391,0.2400513,0.0599976  c0.2699585,0.0700073,0.539978,0.1199951,0.8199463,0.1700439c0.1000366,0.0099487,0.2000122,0.0299683,0.3000488,0.039978  C17.8099976,40.9699707,18.1699829,41,18.5300293,41H25c0.5499878,0,1-0.4500122,1-1V20c0-0.5499878-0.4500122-1-1-1h-6.4699707  c-0.3600464,0-0.7200317,0.0299683-1.0700073,0.0700073c-0.1000366,0.0099487-0.2000122,0.0299683-0.3000488,0.039978  c-0.2699585,0.0499878-0.5499878,0.0999756-0.8199463,0.1699829c-0.0800171,0.0200195-0.1600342,0.0300293-0.2400513,0.0599976  c-0.3399658,0.0900269-0.6699829,0.2000122-1,0.3400269c-0.0599976,0.0200195-0.1199951,0.0599976-0.1900024,0.0800171  c-0.2599487,0.1199951-0.5099487,0.25-0.7699585,0.3899536C14.0999756,20.1699829,14.0499878,20.1900024,14,20.2199707V11h36  v9.2199707c-0.0499878-0.0299683-0.0999756-0.0499878-0.1400146-0.0700073  c-0.2600098-0.1399536-0.5100098-0.2699585-0.7799683-0.3899536c-0.0599976-0.0200195-0.1199951-0.0599976-0.1799927-0.0800171  c-0.3300171-0.1400146-0.6600342-0.25-1-0.3400269c-0.0800171-0.0299683-0.1600342-0.039978-0.2400513-0.0599976  c-0.2699585-0.0700073-0.539978-0.1199951-0.8199463-0.1699829c-0.1000366-0.0100098-0.2000122-0.0300293-0.3000488-0.039978  C46.1900024,19.0299683,45.8300171,19,45.4699707,19H39c-0.5499878,0-1,0.4500122-1,1v20c0,0.5499878,0.4500122,1,1,1h6.4699707  c0.3600464,0,0.7200317-0.0300293,1.0700073-0.0700073c0.1000366-0.0100098,0.2000122-0.0300293,0.3000488-0.039978  c0.2799683-0.0500488,0.5499878-0.1000366,0.8199463-0.1700439c0.0800171-0.0199585,0.1600342-0.0299683,0.2400513-0.0599976  c0.3399658-0.0899658,0.6699829-0.2000122,1-0.3399658c0.0599976-0.0200195,0.1199951-0.0599976,0.1799927-0.0800171  c0.2699585-0.1199951,0.5199585-0.25,0.7799683-0.3900146C49.9000244,39.8299561,49.9500122,39.8099976,50,39.7799683V51z   M54,31.3900146l-2.5300293,4.2199707c-0.3099976,0.5100098-0.6999512,1-1.1599731,1.4500122  C49,38.3099976,47.2800293,39,45.4699707,39H40V21h5.4699707c0.4500122,0,0.9000244,0.039978,1.3400269,0.1300049  c1.3099976,0.25,2.5200195,0.8699951,3.5,1.8099976c0.460022,0.4500122,0.8499756,0.9400024,1.1599731,1.4500122L54,28.6099854  V31.3900146z M58,33h-2v-6h2V33z M61,55h-3V35.2099609h-2V55h-3c-0.5499878,0-1,0.4500122-1,1v4c0,0.5499878,0.4500122,1,1,1  s1-0.4500122,1-1v-3h2v3c0,0.5499878,0.4500122,1,1,1s1-0.4500122,1-1v-3h2v3c0,0.5499878,0.4500122,1,1,1s1-0.4500122,1-1v-4  C62,55.4500122,61.5499878,55,61,55z" />
                                    </svg>
                                    <h5 class="mb-3">Studio</h5>
                                    <p class="mb-3 text-secondary small">Step Inside Our Studio, Pose Perfectly.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-dark small">
                                        Pricing & Packages
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <span class="filter-item" data-filter="shoe">Birthday</span>
                    <span class="filter-item" data-filter="headphone">Wedding</span>
                    <span class="filter-item" data-filter="camera">Christening</span>
                    <span class="filter-item" data-filter="camera">Interments</span>
                    <span class="filter-item" data-filter="camera">Outdoor</span>
                    <span class="filter-item" data-filter="camera">Studio</span>
                </div>
            </div>
            <div class="row">
                <div class="gallery-item shoe">
                    <div class="gallery-item-inner">
                        <img src="{{ asset('images/camera.jpg')}}" alt="shoe">
                    </div>
                </div>
                <div class="gallery-item headphone">
                    <div class="gallery-item-inner">
                        <img src="{{ asset('images/camera.jpg')}}" alt="headphone">
                    </div>
                </div>
                <div class="gallery-item camera">
                    <div class="gallery-item-inner">
                        <img src="{{ asset('images/camera.jpg')}}" alt="camera">
                    </div>
                </div>
                <div class="gallery-item headphone">
                    <div class="gallery-item-inner">
                        <img src="{{ asset('images/camera.jpg')}}" alt="headphone">
                    </div>
                </div>
                <div class="gallery-item camera">
                    <div class="gallery-item-inner">
                        <img src="{{ asset('images/camera.jpg')}}" alt="camera">
                    </div>
                </div>
                <div class="gallery-item headphone">
                    <div class="gallery-item-inner">
                        <img src="{{ asset('images/camera.jpg')}}" alt="headphone">
                    </div>
                </div>
            </div>
            <div class="text-center my-3">
                <button class="btn">See All</button>
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
                        <button id="next" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="col-md-8">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card">
                                    <div class="img-wrapper"><img src="{{ asset('images/camera.jpg')}}" class="d-block w-100" alt="{{ asset('images/camera.jpg')}}"> </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 1</h5>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <p class="card-text">"Some dummy text you don't need to read. Since you have decided to read, do like, share, comment and subscribe to Coding Yaar."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card">
                                    <div class="img-wrapper"><img src="{{ asset('images/camera.jpg')}}" class="d-block w-100" alt="{{ asset('images/camera.jpg')}}"> </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 2</h5>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <p class="card-text">"Some dummy text you don't need to read. Since you have decided to read, do like, share, comment and subscribe to Coding Yaar."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card">
                                    <div class="img-wrapper"><img src="{{ asset('images/camera.jpg')}}" class="d-block w-100" alt="{{ asset('images/camera.jpg')}}"> </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 3</h5>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <p class="card-text">"Some dummy text you don't need to read. Since you have decided to read, do like, share, comment and subscribe to Coding Yaar."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card">
                                    <div class="img-wrapper"><img src="{{ asset('images/camera.jpg')}}" class="d-block w-100" alt="{{ asset('images/camera.jpg')}}"> </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 4</h5>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <p class="card-text">"Some dummy text you don't need to read. Since you have decided to read, do like, share, comment and subscribe to Coding Yaar."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card">
                                    <div class="img-wrapper"><img src="{{ asset('images/camera.jpg')}}" class="d-block w-100" alt="{{ asset('images/camera.jpg')}}"> </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 5</h5>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <p class="card-text">"Some dummy text you don't need to read. Since you have decided to read, do like, share, comment and subscribe to Coding Yaar."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card">
                                    <div class="img-wrapper"><img src="{{ asset('images/camera.jpg')}}" class="d-block w-100" alt="{{ asset('images/camera.jpg')}}"> </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Card title 6</h5>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <i class="fa-solid fa-star text-warning pe-1"></i>
                                        <p class="card-text">"Some dummy text you don't need to read. Since you have decided to read, do like, share, comment and subscribe to Coding Yaar."</p>
                                    </div>
                                </div>
                            </div>
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