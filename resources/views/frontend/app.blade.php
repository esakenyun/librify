<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Librify'))</title>

    <link rel="icon" href="{{ asset('assets/icon.svg') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>

    <!-- Scripts -->
    @notifyCss
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    @include('frontend.body.nav')
    <x-notify::notify />
    @notifyJs

    @yield('content')


    @include('frontend.body.footer')

</body>

</html>
