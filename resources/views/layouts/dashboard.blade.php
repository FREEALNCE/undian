<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <meta name="theme-color" content="#ffffff">
    <title>
        Lorem Ipsum
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('styles/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('styles/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    @stack('css-internal')
    @stack('css-external')
    <!-- my-dashboard -->
    <link rel="stylesheet" href="{{ asset('vendor/my-dashboard/css/dashboard.css') }}">

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('styles/material-dashboard.css?v=3.0.2') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('styles/slim.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/styles.css') }}">
</head>

<body class="g-sidenav-show  bg-gray-200">
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-main sidebar" id="sidenav-main">
        {{-- <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                target="_blank">
                <!-- <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span> -->
                <span class="logo-navbar">LOGO</span>
            </a>
        </div> --}}
        <div class="sidenav-profile">
            <div class="box-inside">
                <div class="image-profile">
                    <img src="{{ Auth::user()->image }}" alt="">
                </div>
                <a href="{{ route('profile.edit') }}">
                    <i class='bx bxs-edit'></i>
                </a>

            </div>

            <h4>{{ Auth::user()->name }}</h4>
            <p>{{ Auth::user()->roles->first()->name }}</p>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['dashboard.index']) }}" href="{{ route('dashboard.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bxs-dashboard icon-dash'></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['daytime.edit']) }}" href="{{url('dashboard/edit-day-time/1')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bxs-dashboard icon-dash'></i>
                        </div>
                        <span class="nav-link-text ms-1">Day Time</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['nighttime.edit']) }}" href="{{url('dashboard/edit-night-time/1')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bxs-dashboard icon-dash'></i>
                        </div>
                        <span class="nav-link-text ms-1">Night Time</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Content
                    </h6>
                </li>

                @can('Manage Partner Regions')
                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['days.index', 'days.show', 'days.edit', 'days.create']) }}" href="{{ route('days.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bx-sun icon-dash'></i>
                        </div>
                        <span class="nav-link-text ms-1">Day Generator</span>
                    </a>
                </li>
                @endcan

                @can('Manage Partner Regions')
                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['nights.index', 'nights.show', 'nights.edit', 'nights.create']) }}" href="{{ route('nights.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bx-moon icon-dash' ></i>
                        </div>
                        <span class="nav-link-text ms-1">Night Generator</span>
                    </a>
                </li>
                @endcan

                @can('Manage Partner Regions')
                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['first-page.index', 'first-page.show', 'first-page.edit', 'first-page.create']) }}" href="{{ route('first-page.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bx-book icon-dash'></i>
                        </div>
                        <span class="nav-link-text ms-1">First Page</span>
                    </a>
                </li>
                @endcan

                @can('Manage Partner Regions')
                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['second-page.index', 'second-page.show', 'second-page.edit', 'second-page.create']) }}" href="{{ route('second-page.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bx-book icon-dash'></i>
                        </div>
                        <span class="nav-link-text ms-1">Second Page</span>
                    </a>
                </li>
                @endcan

                @can('Manage Partner Regions')
                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['third-page.index', 'third-page.show', 'third-page.edit', 'third-page.create']) }}" href="{{ route('third-page.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bx-book icon-dash'></i>
                        </div>
                        <span class="nav-link-text ms-1">Third Page</span>
                    </a>
                </li>
                @endcan

                @can('Manage Partner Regions')
                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['website-lov.index', 'website-lov.show', 'website-lov.edit', 'website-lov.create']) }}" href="{{ route('website-lov.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bx-globe icon-dash' ></i>
                        </div>
                        <span class="nav-link-text ms-1">Settings</span>
                    </a>
                </li>
                @endcan

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                        User Settings
                    </h6>
                </li>

                @can('Manage Roles')
                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['roles.index', 'roles.show', 'roles.edit', 'roles.create']) }}" href="{{ route('roles.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bxs-user-rectangle icon-dash'></i>
                        </div>
                        <span class="nav-link-text ms-1">Roles</span>
                    </a>
                </li>
                @endcan

                @can('Manage Users')
                <li class="nav-item">
                    <a class="nav-link text-white {{ set_active(['users.index', 'users.show', 'users.edit', 'users.create']) }}" href="{{ route('users.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='bx bx-user icon-dash'></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
                @endcan

            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <!-- <div class="mx-3">
                            <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
                        </div> -->
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @yield('navbar')
        <!-- End Navbar -->

        <!-- Section Content -->
        <div class="container-fluid py-4">

            @yield('content')

            <!-- Footer Section -->
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">

                        </div>
                        <div class="col-lg-6">
                            <div class="copyright text-center text-sm text-muted text-lg-end">
                                All Right Reserved ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                Designed & Develop by
                                <a href="#" class="font-weight-bold" target="_blank">Firqy Sutan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer Section -->

        </div>
        <!-- End Section Content -->


    </main>

    <!--   Core JS Files   -->
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "rgba(255, 255, 255, .8)",
                    data: [50, 20, 10, 22, 50, 10, 40],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>


    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-dashboard.min.js?v=3.0.2"></script>
    <!-- jquery -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- bootstrap bundle -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- my-dashboard -->
    <script src="{{ asset('vendor/my-dashboard/js/dashboard.js') }}"></script>

    @include('sweetalert::alert')
    @stack('javascript-external')
    @stack('javascript-internal')
</body>

</html>