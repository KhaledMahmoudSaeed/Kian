<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <title>@lang('messages.SITE_TITLE')</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>

<style>
    /* Customize dropdown */
    .custom-dropdown {
        background-color: #343a40;
        /* Dark background */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Style each item in the dropdown */
    .custom-item {
        color: #f8f9fa;
        /* Light text color */
        transition: background-color 0.3s ease;
    }

    /* Add hover effect */
    .custom-item:hover {
        background-color: #495057;
        /* Darker on hover */
        color: #f51020;
        /* Custom text color on hover */
    }

    /* Icon color */
    .custom-item i {
        color: #ffcc00;
        /* Icon color */
    }
</style>
<nav class="navbar navbar-expand-lg">
    <div class="container">

        @can('admin')
            <a class="navbar-brand mr-5" href="{{ route('AdminHome') }}">
                <h2>Sixteen <em>Clothing</em></h2>
            </a>
        @else
            <a class="navbar-brand mr-5" href="{{ route('home') }}">
                <h2>Sixteen <em>Clothing</em></h2>
            </a>
        @endcan

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            @auth
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #f8f9fa;">
                            {{ strtok(Auth::user()->name, ' ') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right custom-dropdown" aria-labelledby="userDropdown">
                            @can('admin')
                                <a class="dropdown-item custom-item" href="{{ route('userdashboard.index') }}">
                                    <i class="fas fa-tachometer-alt mr-2"></i> @lang('messages.DASHBOARD')
                                </a>
                            @endcan
                            <a class="dropdown-item custom-item" href="{{ route('profile', Auth::user()->id) }}">
                                <i class="fas fa-user-circle mr-2"></i> @lang('messages.PROFILE')
                            </a>
                            <a class="dropdown-item custom-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-tachometer-alt mr-2"></i> @lang('messages.LOGOUT')
                            </a>
                        </div>
                    </li>

                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        @can('admin')
                            <a class="nav-link" href="{{ route('AdminHome') }}">@lang('messages.HOME')</a>
                        @else
                            <a class="nav-link" href="{{ route('home') }}">@lang('messages.HOME')</a>
                        @endcan
                    </li>
                    <li class="nav-item {{ request()->routeIs('products') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('our.products') }}">@lang('messages.OUR_PRODUCTS')</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about') }}">@lang('messages.ABOUT_US')</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact') }}">@lang('messages.CONTACT_US')</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" id="userDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #f8f9fa;">
                            @lang('messages.LANGUAGES')
                        </a>
                        <div class="dropdown-menu dropdown-menu-right custom-dropdown" aria-labelledby="userDropdown">
                            <a href="locale/ar" class="dropdown-item custom-item"><i
                                    class="fas fa-tachometer-alt mr-2"></i>ar<img src="icons/english.jpg"
                                    alt=""></a>
                            <a href="locale/en" class="dropdown-item custom-item"><i
                                    class="fas fa-tachometer-alt mr-2"></i>en<img src="icons/english.jpg"
                                    alt=""></a>
                        </div>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            @endauth
        </div>
    </div>
</nav>
