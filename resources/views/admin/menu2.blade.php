<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/men.css">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/889b4f6c92.js" crossorigin="anonymous"></script>
    @yield('head')
</head>

<body class="">
    <div class='dashboard'x-data="{ open: true }">
        <div class='dashboard-app'>
            <div class="dashboard-nav" x-show="open">
                <header><a href="#!" id="sidebarBtn" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#"
                        class="brand-logo"><i class="fas fa-anchor"></i> <span>BRAND</span></a></header>
                <nav class="dashboard-nav-list" ><a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i>
                        Home </a><a href="#" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i>
                        dashboard
                    </a><a href="#" class="dashboard-nav-item"><i class="fas fa-file-upload"></i> Upload </a>
                    <div class='dashboard-nav-dropdown'><a href="#!"
                            class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-photo-video"></i>
                            Media </a>
                        <div class='dashboard-nav-dropdown-menu'><a href="#"
                                class="dashboard-nav-dropdown-item">All</a><a href="#"
                                class="dashboard-nav-dropdown-item">Recent</a><a href="#"
                                class="dashboard-nav-dropdown-item">Images</a><a href="#"
                                class="dashboard-nav-dropdown-item">Video</a></div>
                    </div>
                    <div class='dashboard-nav-dropdown'><a href="#!"
                            class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users"></i> Users </a>
                        <div class='dashboard-nav-dropdown-menu'><a href="#"
                                class="dashboard-nav-dropdown-item">All</a><a href="#"
                                class="dashboard-nav-dropdown-item">Subscribed</a><a href="#"
                                class="dashboard-nav-dropdown-item">Non-subscribed</a><a href="#"
                                class="dashboard-nav-dropdown-item">Banned</a><a href="#"
                                class="dashboard-nav-dropdown-item">New</a></div>
                    </div>
                    <div class='dashboard-nav-dropdown'><a href="#!"
                            class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-money-check-alt"></i>
                            Payments </a>
                        <div class='dashboard-nav-dropdown-menu'><a href="#"
                                class="dashboard-nav-dropdown-item">All</a><a href="#"
                                class="dashboard-nav-dropdown-item">Recent</a><a href="#"
                                class="dashboard-nav-dropdown-item"> Projections</a>
                        </div>
                    </div>
                    <a href="#" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Settings </a><a href="#"
                        class="dashboard-nav-item"><i class="fas fa-user"></i> Profile </a>
                    <div class="nav-item-divider"></div>
                    <a href="#" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
                </nav>
            </div>
            <header class='dashboard-toolbar d-flex flex-row'><a href="#!" x-on:click="open= !open"  class="menu-toggle"><i class="fas fa-bars"></i></a>
            </header>
            <div class='dashboard-content d-flex flex-row'>
                <div class='container'>
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Welcome back Jim</h1>
                        </div>
                        <div class='card-body'>
                            <p>Your account type is: Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="{{ asset('js/sid.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        Livewire.on('alert', function(message) {
            Swal.fire(
                'Bien hecho!',
                message,
                'success'
            )
        })

        Livewire.on('alert2', function(message) {
            Swal.fire(message)
        })
    </script>
    <script>
        const mobileScreen = window.matchMedia("(max-width: 990px )");
        $(document).ready(function() {
            $(".dashboard-nav-dropdown-toggle").click(function() {
                $(this).closest(".dashboard-nav-dropdown")
                    .toggleClass("show")
                    .find(".dashboard-nav-dropdown")
                    .removeClass("show");
                $(this).parent()
                    .siblings()
                    .removeClass("show");
            });
            $(".menu-toggle").click(function() {
                if (mobileScreen.matches) {
                    $(".dashboard-nav").toggleClass("mobile-show");
                } else {
                    $(".dashboard").toggleClass("dashboard-compact");
                }
            });
        });
    </script>
    @yield('js')
</body>

</html>
