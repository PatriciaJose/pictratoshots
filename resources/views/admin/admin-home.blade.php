<x-admin-layout>
    <div class="dashboard-main">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="dashboard-title-text">
                        <h2>Pictratoshots Dashboard</h2>
                        <p class="text-grey">Storyteller Film Since 2015.</p>
                    </div>
                    <button type="button" class="fs-18 text-grey-blue">
                        <i class="fas fa-ellipsis-vertical"></i>
                    </button>
                </div>
            </div>

            <div class="overview-section p-4">
                <div class="row overview-section-title">
                    <h4>Bookings Overview</h4>
                    <p class="small text-grey">Check <span class="text-blue">bookings</span> history for detailed overview of your sessions</p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <a href="#" class="text-decoration-none">
                            <div class="card bg-white p-4">
                                <div class="card-body">
                                    <p class="h4 text-grey mb-2"><i class="fa-solid fa-triangle-exclamation"></i> Pending</p>
                                    <div class="fs-4 fw-6">
                                        <span class="text-danger">100</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <a href="#" class="text-decoration-none">
                            <div class="card bg-white p-4">
                                <div class=" card-body">
                                    <p class="h4 text-grey mb-0"><i class="fa-solid fa-thumbs-up"></i> Approved</p>
                                    <div class="fs-4 fw-bold">
                                        <span class="text-danger fs-4 fw-6">10</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <a href="#" class="text-decoration-none">
                            <div class=" card bg-white p-4">
                                <div class="card-body">
                                    <p class=" h4 text-grey mb-0"><i class="fa-solid fa-thumbs-down"></i> Rejected</p>
                                    <div class="fs-4 fw-bold">
                                        <span class="text-danger fs-4 fw-6">3</span>
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
                        <h5 class="card-title">Bookings</h5>
                        <div class="chart-container">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pie Chart Card -->
            <div class="col-md-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Shots</h5>
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
            labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
            datasets: [{
                label: 'Bar Chart',
                data: [12, 19, 3, 5, 2],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var pieData = {
            labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
            datasets: [{
                data: [12, 19, 3, 5, 2],
                backgroundColor: ['red', 'blue', 'green', 'yellow', 'purple']
            }]
        };

        var barChart = new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: barData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false,
            }
        });

        var pieChart = new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: pieData,
            options: {
                maintainAspectRatio: false,
            }
        });
    </script>
    <div class="container mt-5">
        <div class="row">
            <!-- Left Card for Packages -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="card-title">Packages</h5>
                    </div>
                    <div class="card-body">
                        <!-- Data Table for Packages -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Package A</td>
                                    <td>$100</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Package B</td>
                                    <td>$150</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Card for Event Types -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="card-title">Event Types</h5>
                    </div>
                    <div class="card-body">
                        <!-- Data Table for Event Types -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Conference</td>
                                    <td>Annual business conference</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Workshop</td>
                                    <td>Hands-on learning sessions</td>
                                </tr>
                                <!-- Add more rows as needed -->
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
            color: red;
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
                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="testimonial-wrapper">
                                                <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante, commodo iacul viverra.</div>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="overview">
                                                            <div class="name"><b>Paula Wilson</b></div>
                                                            <div class="star-rating">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="testimonial-wrapper">
                                                <div class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra. Quis quam ut magna consequat faucibus, metus id mi gravida.</div>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="overview">
                                                            <div class="name"><b>Antonio Moreno</b></div>
                                                            <div class="star-rating">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="testimonial-wrapper">
                                                <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante, commodo iacul viverra.</div>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="overview">
                                                            <div class="name"><b>Michael Holz</b></div>
                                                            <div class="star-rating">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="testimonial-wrapper">
                                                <div class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra. Quis quam ut magna consequat faucibus, metus id mi gravida.</div>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="overview">
                                                            <div class="name"><b>Mary Saveley</b></div>
                                                            <div class="star-rating">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="testimonial-wrapper">
                                                <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante, commodo iacul viverra.</div>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="overview">
                                                            <div class="name"><b>Martin Sommer</b></div>
                                                            <div class="star-rating">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="testimonial-wrapper">
                                                <div class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra. Quis quam ut magna consequat faucibus, metus id mi gravida.</div>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <div class="overview">
                                                            <div class="name"><b>John Williams</b></div>
                                                            <div class="star-rating">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>