<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme='dark'>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="icon" href="{{ asset('shipers/img/shipper.png') }}" type="image/x-icon"> --}}
    <link rel="icon" href="{{ Vite::asset('resources/images/logo.svg') }}" />
    {{-- <link type="image/png" sizes="16x16" rel="icon" href="resources/images/logo.png"> --}}
    <title>Sixteen Clothing</title>
    {{-- <link rel="icon" href=
"https://media.geeksforgeeks.org/wp-content/cdn-uploads/gfg_200X200.png"
        type="image/x-icon" /> --}}
    <style>
        /* Custom styles for dark theme */
        body {
            background-color: #1a1a1a;
            /* Dark background */
            color: #e0e0e0;
            /* Light text color */
        }
    </style>
</head>

<body>

    @yield('content')

</body>

</html>
