<x-app-layout>
    <div class="container mt-5 pt-5">
        <h1>Photoshoot Packages</h1>
    </div>
    <div class="container-fluid">
        <div class="container p-5">
            <!-- Tab Navigation -->
            <ul class="nav nav-tabs nav-justified" id="packageTabs" role="tablist">
                @foreach ($photoshootTypes as $type)
                <li class="nav-item" role="presentation">
                    <a class="nav-link @if ($loop->first) active @endif" id="type-{{ $type->id }}-tab" data-bs-toggle="tab" href="#type-{{ $type->id }}" role="tab" aria-controls="type-{{ $type->id }}" aria-selected="@if ($loop->first) true @else false @endif">
                        {{ $type->type_name }}
                    </a>
                </li>
                @endforeach
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="packageTabContent">
                @foreach ($photoshootTypes as $type)
                <div class="tab-pane fade @if ($loop->first) show active @endif" id="type-{{ $type->id }}" role="tabpanel" aria-labelledby="type-{{ $type->id }}-tab">
                    <div class="row mt-5">
                        @foreach ($packages as $package)
                        @if ($package->typeID === $type->id)
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="pricingTable">
                                <div class="pricingTable-header">
                                    <h3 class="title">{{ $package->package_name }}</h3>
                                    <span class="price-value">
                                        Php {{ $package->price }}
                                    </span>
                                </div>
                                @php
                                $inclusions = explode(',', $package->inclusions);
                                @endphp
                                <ul class="p-3">
                                    @foreach ($inclusions as $inclusion)
                                    <li>{{ $inclusion }}</li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('booking.form', ['packageId' => $package->id]) }}">Schedule a Session</a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
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
    <script>
        var packageTabs = new bootstrap.Tab(document.getElementById("type-{{ $selectedType }}-tab"));
        packageTabs.show();
    </script>
    <style>
        .nav-link{
            color: #9D0520;
        }
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