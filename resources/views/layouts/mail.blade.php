<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Taski">
    <meta name="description" content="Taski is an Open Source agenda">
    <meta name="author" content="Jose Francisco Paredes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('/css/mail.css') }}">

    @yield('styles')
</head>

<body>
    @yield('content')

    @yield('scripts')
</body>

</html>