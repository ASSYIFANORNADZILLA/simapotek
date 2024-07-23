<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
    <div class="d-flex">
        @include('layouts.sidebar')

        <div class="flex-grow-1 d-flex flex-column min-vh-100 bg-gray-100">
            <!-- Page Heading -->
            <header class="bg-white shadow-sm">
                <div class="container py-3">
                    @yield('header')
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-grow-1">
                <div class="container py-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
