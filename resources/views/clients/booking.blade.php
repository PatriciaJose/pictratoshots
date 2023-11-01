<x-app-layout>
    <div class="container mt-5 pt-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <h1 class="title">{{ $package->package_name }}</h1>
                            <h3 class="price-value">Price: ${{ $package->price }}</h3>
                        </div>
                        @php
                        $inclusions = explode(',', $package->inclusions);
                        @endphp
                        <ul class=" text-center p-3">
                            @foreach ($inclusions as $inclusion)
                            <li>{{ $inclusion }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body ">
                            <h2 class="text-center">Photoshoot Booking</h2>
                            <p class="text-center text-muted small">You're about to schedule this session</p>
                            <hr>
                            <form action="{{ route('store.booking') }}" method="POST" id="booking-form">
                                @csrf
                                <input type="hidden" name="packageID" value="{{ $packageId }}">
                                <div class="form-group pb-2">
                                    <label for="session_date">Session Date</label>
                                    <input type="date" name="session_date" class="form-control">
                                </div>
                                <div class="form-group pb-2">
                                    <label for="session_time">Session Time</label>
                                    <input type="time" name="session_time" class="form-control">
                                </div>
                                <div class="form-group pb-2">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" class="form-control">
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary">Cancel</button>
                                    <button type="button" id="submit-button" class="btn btn-primary">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("booking-form");
            const submitButton = document.getElementById("submit-button");

            submitButton.addEventListener("click", function() {
                Swal.fire({
                    title: 'Confirm Booking',
                    text: 'Are you sure you want to book this photoshoot?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Book',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
    <style>
        .pricingTable,
        .pricingTable .pricingTable-header {
            position: relative
        }

        a {
            text-decoration: none;
        }

        .pricingTable {
            padding-bottom: 25px;
            margin: 0 20px;
            background: #fff;
            border-radius: 20px;
            border-bottom: 5px solid #9D0520;
            text-align: center;
            z-index: 1
        }

        .pricingTable .pricingTable-header:after,
        .pricingTable .pricingTable-header:before {
            content: "";
            border-top: 10px solid #48434a;
            border-left: 10px solid transparent;
            position: absolute;
            bottom: -10px;
            left: -10px
        }

        .pricingTable .pricingTable-header:after {
            border-left: none;
            border-right: 10px solid transparent;
            left: auto;
            right: -10px
        }

        .pricingTable .title {
            padding: 25px 5px;
            margin: 0;
            background: #030004;
            border-radius: 20px 20px 0 0;
            font-size: 26px;
            font-weight: 700;
            color: #fff;
            text-transform: uppercase;
            position: relative
        }

        .pricingTable .title:after,
        .pricingTable .title:before {
            content: "";
            border-left: 10px solid #c2c8c9;
            border-top: 37px solid transparent;
            border-bottom: 37px solid transparent;
            position: absolute;
            bottom: -114px;
            left: -30px
        }

        .pricingTable .title:after {
            border-left: none;
            border-right: 10px solid #c2c8c9;
            left: auto;
            right: -30px
        }

        .pricingTable .price-value {
            display: block;
            padding: 15px 5px;
            margin: 0 -10px;
            background: #9D0520;
            font-size: 36px;
            font-weight: 700;
            color: #fff;
            position: relative
        }

        .pricingTable .price-value:after,
        .pricingTable .price-value:before {
            content: "";
            width: 30px;
            height: 90%;
            background: #9D0520;
            position: absolute;
            top: 50%;
            left: -20px;
            z-index: -1
        }

        .pricingTable .price-value:after {
            left: auto;
            right: -20px
        }

        .pricingTable .month {
            font-size: 15px;
            font-weight: 700;
            margin-left: 3px;
            position: relative;
            top: -12px
        }

        .pricingTable .pricing-content {
            list-style: none;
            padding: 15px 0;
            margin: 0
        }

        .pricingTable .pricing-content li {
            padding: 8px 0;
            font-size: 15px;
            font-weight: 700;
            color: #b2bbc0;
            line-height: 30px;
            border-bottom: 2px dashed #e3e3e3;
            position: relative
        }

        .pricingTable .pricing-content li:last-child {
            border-bottom: none
        }

        .pricingTable .pricingTable-signup {
            display: inline-block;
            padding: 10px 30px;
            font-size: 16px;
            color: #fff;
            text-transform: uppercase;
            border: 2px solid #4fc2f8;
            box-shadow: 3px 3px 10px 0 rgba(0, 0, 0, .08);
            perspective: 300px;
            z-index: 1;
            position: relative;
            transition: all .3s ease 0s
        }

        .pricingTable .pricingTable-signup:hover {
            color: #4fc2f8
        }

        .pricingTable .pricingTable-signup:before {
            content: "";
            width: 100%;
            height: 100%;
            background: #4fc2f8;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            transform-origin: left center 0;
            transition: all .3s ease 0s
        }

        .pricingTable .pricingTable-signup:hover:before {
            transform: rotateY(90deg)
        }

        @media only screen and (max-width:990px) {
            .pricingTable {
                margin-bottom: 30px
            }
        }
    </style>
</x-app-layout>