<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">Sixteen Clothing</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav mx-auto">
        @can('admin')
            <div class="collapse navbar-collapse" id="navbarNav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('AdminHome') }}"> @lang('messages.HOME') |</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dashboardDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('messages.DASHBOARDS')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dashboardDropdown">
                        <a class="dropdown-item" href="{{ route('userdashboard.index') }}">@lang('messages.USER_DASHBOARD')</a>
                        <a class="dropdown-item" href="{{ route('productdashboard.index') }}">@lang('messages.PRODUCT_DASHBOARD')</a>
                        <a class="dropdown-item" href="{{ route('shipperdashboard.index') }}">@lang('messages.SHIPPER_DASHBOARD')</a>
                        <a class="dropdown-item" href="{{ route('messagedashboard.index') }}">@lang('messages.MESSAGE_DASHBOARD')</a>
                    </div>
                </li>



                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" role="button" id="userDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #f8f9fa;">
                        @lang('messages.LANGUAGES')
                    </a>
                    <div class="dropdown-menu dropdown-menu-right custom-dropdown" aria-labelledby="userDropdown">
                        <a href="locale/ar" class="dropdown-item custom-item"><i
                                class="fas fa-tachometer-alt mr-2"></i>ar<img src="icons/english.jpg" alt=""></a>
                        <a href="locale/en" class="dropdown-item custom-item"><i
                                class="fas fa-tachometer-alt mr-2"></i>en<img src="icons/english.jpg" alt=""></a>
                        <a href="locale/de" class="dropdown-item custom-item"><i
                                class="fas fa-tachometer-alt mr-2"></i>de<img src="icons/english.jpg" alt=""></a>
                    </div>
                </li>
            @endcan

            @guest
                <a href="locale/ar" class="nav-link">العربية<img src="icons/english.jpg" alt=""></a>
                <a href="locale/en" class="nav-link">English<img src="icons/english.jpg" alt=""></a>
                <a href="locale/de" class="nav-link">Deutsch<img src="icons/english.jpg" alt=""></a>
            @endguest

    </ul>

    <ul class="navbar-nav">
        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('messages.LOGOUT')</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">@lang('messages.LOGIN')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">@lang('messages.REGISTER')</a>
            </li>
        @endauth
    </ul>
    </div>
</nav>
