<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pictratoshots</title>
    <link rel="icon" type="text/css" href="{{ asset('images/Picture1.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    <!-- Toastr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Data Table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

</head>
<style>
    * {
        scrollbar-width: thin;
        scrollbar-color: rgb(92, 73, 255) rgb(255, 255, 255);
    }

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

    :root {
        --blue-color: #289adc;
        --cyan-color: #00c9ac;
        --grey-blue-color: #334962;
        --grey-color: #9ea4ac;
        --light-blue-color: #7b92ad;
        --light-grey-color: #f4f6fa;
        --white-color: #fff;
        --trans: all 300ms ease-in-out;
    }

    button {
        background-color: transparent;
        border: none;
        outline: none;
    }

    a {
        color: unset !important;
    }

    .bg-blue {
        background-color: var(--blue-color);
    }

    .bg-grey {
        background-color: var(--grey-color);
    }

    .bg-light-grey {
        background-color: var(--light-grey-color);
    }

    .text-blue {
        color: var(--blue-color);
    }

    .text-cyan {
        color: var(--cyan-color);
    }

    .text-grey-blue {
        color: var(--grey-blue-color);
    }

    .text-grey {
        color: var(--grey-color);
    }

    .text-light-blue {
        color: var(--light-blue-color);
    }

    .fs-8 {
        font-size: 8px;
    }

    .fs-12 {
        font-size: 12px;
    }

    .fs-13 {
        font-size: 13px;
    }

    .fs-14 {
        font-size: 14px;
    }

    .fs-15 {
        font-size: 15px;
    }

    .fs-18 {
        font-size: 18px;
    }

    .fs-20 {
        font-size: 20px;
    }

    .fw-2 {
        font-weight: 200;
    }

    .fw-3 {
        font-weight: 300;
    }

    .fw-4 {
        font-weight: 400;
    }

    .fw-5 {
        font-weight: 500;
    }

    .fw-6 {
        font-weight: 600;
    }

    .fw-7 {
        font-weight: 700;
    }

    /* letter spacing */
    .ls-1 {
        letter-spacing: 1px;
    }

    .badge {
        background-color: #dfeeff;
    }

    /* navigation  */
    .navigation-overlay {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10;
        display: none;
        background-color: rgba(0, 0, 0, 0.01);
    }

    .navbar-open-btn {
        font-size: 23px;
        padding-top: 2px;
    }

    .navbar-logo img {
        width: 60px;
    }

    .navigation-bar {
        height: 80px;
        border-bottom: 1.5px solid rgba(158, 164, 172, 0.3);
    }

    .notification-btn {
        font-size: 19px;
    }

    .info-icon {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        transition: var(--trans);
    }


    .navigation-sidebar {
        z-index: 999;
        position: fixed;
        left: 0;
        top: 0;
        width: 280px;
        height: 100%;
        box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
        transform: translateX(-100%);
        transition: all 200ms ease-in-out;
        overflow-y: scroll;
    }

    /* js related */
    .show-navigation-sidebar {
        transform: translateX(0) !important;
    }

    .navigation-sidebar::-webkit-scrollbar {
        width: 3.5px;
    }

    .navigation-sidebar::-webkit-scrollbar-track {
        background-color: transparent;
    }

    .navigation-sidebar::-webkit-scrollbar-thumb {
        border-radius: 6px;
        background-color: rgba(0, 0, 0, 0.19);
    }

    .navigation-sidebar .navbar-sb-head {
        border-bottom: 1.5px solid rgba(158, 164, 172, 0.3);
        padding: 8px 0;
    }

    .navigation-sidebar .navbar-sb-links {
        padding-left: 5px !important;
    }

    .navigation-sidebar .navbar-sb-link {
        padding: 3px 0;
    }

    .navigation-sidebar .navbar-sb-link * {
        transition: all 300ms ease-in-out;
    }

    .navigation-sidebar .navbar-sb-link:hover * {
        color: #9D0520;
    }

    .navigation-sidebar .navbar-sb-text {
        letter-spacing: 0.6px;
    }

    .navbar-close-btn {
        font-size: 20px;
    }


    .overview-section {
        border: 2px solid rgba(158, 164, 172, 0.3);
        border-radius: 6px;
    }

    .overview-section-list a {
        color: unset;
    }

    .overview-section-item {
        background-color: var(--white-color);
        border-radius: 6px;
        margin: 5px 0;
        min-height: 170px;
        border: 2px solid var(--blue-color);
        transition: var(--trans);
    }

    .overview-section-item:hover {
        background-color: var(--blue-color) !important;
    }

    .overview-section-item:hover * {
        color: var(--white-color) !important;
    }

    .overview-section-item:hover .info-icon {
        background-color: var(--white-color);
    }

    .overview-section-item:hover .info-icon i {
        color: var(--blue-color) !important;
    }

    .btn-outline-sm {
        font-family: inherit;
        background-color: transparent;
        border: 2px solid var(--blue-color);
        border-radius: 2px;
        padding: 4px;
        font-weight: 500;
        transition: var(--trans);
    }

    .btn-outline-sm:hover {
        background-color: var(--white-color);
        color: var(--blue-color) !important;
    }

    .overview-section-item:hover .btn-outline-sm {
        border-color: var(--white-color);
    }


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

<body>
    @include('layouts.admin-navigation')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    @include('layouts.footer')
    <script>
        $(document).ready(function() {
            $('.navbar-open-btn').click(function() {
                $('.navigation-sidebar').addClass('show-navigation-sidebar');
                $('.navigation-overlay').css('display', 'block');
            })

            $('.navbar-close-btn').click(function() {
                $('.navigation-sidebar').removeClass('show-navigation-sidebar');
                $('.navigation-overlay').css('display', 'none');
            })

            $(window).click(function(e) {
                if ($(e.target).hasClass('navigation-overlay')) {
                    $('.navigation-sidebar').removeClass('show-navigation-sidebar');
                    $('.navigation-overlay').css('display', 'none');
                }
            })
        })
    </script>
</body>

</html>