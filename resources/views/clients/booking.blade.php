<x-app-layout>
    <div class="container mt-5 p-5">
        <small class="text-muted">SCHEDULE</small>
        <h2>Photoshoot Booking</h2>
        <hr>
        <nav class="ms-1" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('packages') }}" class="text-decoration-none">Services</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $package->package_name }}</li>
            </ol>
        </nav>
        <hr>
        <div class="row mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <small>About the Package:</small>
                        <h2>{{ $package->package_name }}</h2>
                        <h4>Price: ${{ $package->price }}</h4>
                        <hr>
                        <small>Inclusions:</small>
                        @php
                        $inclusions = explode(',', $package->inclusions);
                        @endphp
                        <ul class="p-3">
                            @foreach ($inclusions as $inclusion)
                            <li>{{ $inclusion }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('store.booking') }}" method="POST" id="booking-form">
                            @csrf
                            <input type="hidden" name="packageID" value="{{ $packageId }}">
                            <div class="form-group pb-2">
                                <label for="session_date">Session Date</label>
                                <input type="date" name="session_date" class="form-control" required>
                            </div>
                            <div class="form-group pb-2">
                                <label for="session_time">Session Time</label>
                                <input type="time" name="session_time" class="form-control" required>
                            </div>
                            <div class="form-group pb-2">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" required>
                            </div>
                            <div class="text-end mt-3">
                                <button type="button" class="btn btn-secondary">Cancel</button>
                                <button type="button" id="submit-button" class="btn btn-success">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const form = document.getElementById("booking-form");
                const submitButton = document.getElementById("submit-button");

                submitButton.addEventListener("click", function() {
                    removeErrorMessages();

                    if (form.checkValidity()) {
                        Swal.fire({
                            title: 'Confirm Booking',
                            text: 'Are you sure you want to book this photoshoot?',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonText: 'Book',
                            cancelButtonText: 'Cancel',
                            confirmButtonColor: 'green',
                            cancelButtonColor: 'grey',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    } else {
                        displayErrorMessages();
                    }
                });

                function displayErrorMessages() {
                    Array.from(form.elements).forEach(function(element) {
                        if (element.nodeName !== 'BUTTON' && !element.checkValidity()) {
                            const errorMessage = document.createElement('div');
                            errorMessage.className = 'text-danger';
                            errorMessage.textContent = element.validationMessage;

                            element.parentNode.insertBefore(errorMessage, element.nextSibling);
                        }
                    });
                }

                function removeErrorMessages() {
                    const errorMessages = document.querySelectorAll('.text-danger');
                    errorMessages.forEach(function(errorMessage) {
                        errorMessage.parentNode.removeChild(errorMessage);
                    });
                }
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


            .pricingTable .price-value {
                display: block;
                padding: 15px 5px;
                background: #9D0520;
                font-size: 36px;
                font-weight: 700;
                color: #fff;
                position: relative
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
        @if (Session::has('message'))
        <script>
            console.log("Toastr code is executing.");
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ Session::get('message') }}", "Success!", {
                timeOut: 3000
            });
        </script>
        @endif
</x-app-layout>