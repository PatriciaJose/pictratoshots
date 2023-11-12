<x-admin-layout>
    <div class="dashboard-main">
        <div class="container">
            <div class="card my-3">
                <div class="card-body">
                    <h2>Pictratoshots Dashboard</h2>
                    <p class="text-grey">Storyteller Film Since 2015.</p>
                </div>
            </div>

            <div class="overview-section p-4">
                <div class="row overview-section-title">
                    <h4>Bookings Overview</h4>
                    <p class="small text-grey">Check <a class="text-decoration-none text-primary" href="{{ route('booking-management') }}">bookings</a> section for detailed overview of your sessions</p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <a href="#" class="text-decoration-none">
                            <div class="card bg-white p-4">
                                <div class="card-body">
                                    <p class="h4 text-grey mb-2"><i class="fa-solid fa-triangle-exclamation"></i> Pending</p>
                                    <div class="fs-4 fw-6">
                                        <span class="text-danger">{{ $pendingBookings }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <a href="#" class="text-decoration-none">
                            <div class="card bg-white p-4">
                                <div class=" card-body">
                                    <p class="h4 text-grey mb-0"><i class="fa-solid fa-thumbs-up"></i> Approved</p>
                                    <div class="fs-4 fw-bold">
                                        <span class="text-danger fs-4 fw-6">{{ $approvedBookings }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <a href="#" class="text-decoration-none">
                            <div class=" card bg-white p-4">
                                <div class="card-body">
                                    <p class=" h4 text-grey mb-0"><i class="fa-solid fa-thumbs-down"></i> Rejected</p>
                                    <div class="fs-4 fw-bold">
                                        <span class="text-danger fs-4 fw-6">{{ $rejectedBookings }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <a href="#" class="text-decoration-none">
                            <div class=" card bg-white p-4">
                                <div class="card-body">
                                    <p class=" h4 text-grey mb-0"><i class="fa-solid fa-thumbs-down"></i> Finished</p>
                                    <div class="fs-4 fw-bold">
                                        <span class="text-danger fs-4 fw-6">{{ $finishedBookings }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .chart-container {
            height: 300px;
        }

        canvas {
            max-width: 100%;
            height: auto;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container mt-5">
        <div class="row">
            <!-- Bar Chart Card -->
            <div class="col-md-7">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Completed Photoshoot Session</h5>
                        <div class="chart-container">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total of Images Uploaded</h5>
                        <div class="chart-container">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var barData = {
            labels: <?= json_encode($data['labels']) ?>,
            datasets: [{
                label: 'Completed Photoshoot Session',
                data: <?= json_encode($data['data']) ?>,
                backgroundColor: '#9D052080',
                borderColor: '#9D0520',
                borderWidth: 1
            }]
        };


        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: barData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    maintainAspectRatio: false,
                    plugins: {
                        legend: false,
                    }
                }
            });
        });


        var labels = <?= json_encode($labels, JSON_HEX_TAG); ?>;
        var counts = <?= json_encode($counts, JSON_HEX_TAG); ?>;


        var alternateColors = ['#9D052080', '#9D0520'];

        var backgroundColors = counts.map(function(_, index) {
            return alternateColors[index % alternateColors.length];
        });

        var pieData = {
            labels: labels,
            datasets: [{
                data: counts,
                backgroundColor: backgroundColors
            }]
        };

        var pieChart = new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: pieData,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: false,
                }
            }
        });
    </script>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card h-100">
                    <div class="card-header bg-white">
                        <h5 class="card-title">Packages Created</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Event type</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packageDetails as $package)
                                <tr>
                                    <td>{{ $package['package_name'] }}</td>
                                    <td>{{ $package['event_name'] }}</td>
                                    <td>{{ $package['package_price'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-white h-100">
                        <h5 class="card-title">Event Types</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($photoshootTypes as $type)
                                <tr>
                                    <td>{{ $type['type_name'] }}</td>
                                    <td>{{ $type['type_desc'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .carousel .carousel-item {
            color: #999;
            overflow: hidden;
            min-height: 120px;
            font-size: 13px;
        }

        .carousel .testimonial-wrapper {
            padding: 0 10px;
        }

        .carousel .testimonial {
            color: #808080;
            position: relative;
            padding: 15px;
            background: #f1f1f1;
            border: 1px solid #efefef;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        .carousel .testimonial::after {
            content: "";
            width: 15px;
            height: 15px;
            display: block;
            background: #f1f1f1;
            border: 1px solid #efefef;
            border-width: 0 0 1px 1px;
            position: absolute;
            bottom: -8px;
            left: 46px;
            transform: rotateZ(-46deg);
        }

        .carousel .star-rating li {
            padding: 0 2px;
        }

        .carousel .star-rating i {
            font-size: 16px;
            color: #ffdc12;
        }

        .carousel .overview {
            padding: 3px 0 0 15px;
        }

        .carousel .overview .details {
            padding: 5px 0 8px;
        }

        .carousel .overview b {
            text-transform: uppercase;
            color: #9D0520;
        }

        .carousel .carousel-indicators {
            bottom: -30px;
        }

        .carousel-indicators li,
        .carousel-indicators li.active {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin: 1px 2px;
            box-sizing: border-box;
        }

        .carousel-indicators li {
            background: red;
            border: 4px solid black;
        }

        .carousel-indicators li.active {
            color: red;
            background: white;
            border: 5px double;
        }
    </style>
    <div class="container-lg mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-center mb-4">Feedbacks and Ratings</h2>
                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($feedbacks as $key => $feedback)
                                <li data-bs-target="#myCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @for($i = 0; $i < count($feedbacks); $i+=2) <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                    <div class="row">
                                        @foreach([$feedbacks[$i], $feedbacks[$i+1]] as $feedback)
                                        @if($feedback)
                                        <div class="col-6">
                                            <div class="testimonial-wrapper">
                                                <div class="testimonial">{{ $feedback->message }}</div>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="overview">
                                                            <div class="name"><b>{{ $userNames[$feedback->bookingID] }}</b></div>
                                                            <div class="star-rating">
                                                                <ul class="list-inline">
                                                                    @for($j = 0; $j < $feedback->rating; $j++)
                                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                        @endfor
                                                                        @for($j = 0; $j < 5 - $feedback->rating; $j++)
                                                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                            @endfor
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</x-admin-layout>