<footer class="footer-distributed bg-dark">
    <div class="footer-left">
        <div class="d-flex">
            <img class="" src="{{ asset('storage/images/Picture1.png') }}" width="100">
            <h3 class="text-white ms-3 pt-3">Pictratoshots Studio</h3>
        </div>
        <p class="footer-company-name mt-4">Copyright © 2023 <strong>Pictratoshots Developer</strong> All rights reserved</p>
    </div>
    <div class="footer-center text-white ms-5">
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
    <div class="footer-right pt-3">
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
<style>
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
        padding: 30px;
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
        margin-left: 10px;
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