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

        <title>Taski API</title>
        <link rel="shortcut icon" href="{{ asset('/images/brand.png') }}" type="image/x-icon">

        <style>
            .welcome-container {
                position: relative;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                flex-direction: column;
                padding: 10px;
            }

            img {
                display: block;
                width: 100%;
                max-width: 250px;
            }

            h1 {
                display: block;
                margin: 0px;
                padding: 0px;
                font-weight: 400;
            }

            p {
                display: block;
                margin: 5px 0px;
            }
        </style>
    </head>
    <body>
        <div class="welcome-container">
            <img src="{{ asset('/images/logo.png') }}" alt="">
            <br>
            <h1>Welcome To Taski</h1>
            <p>Best open source task manager for daily agenda.</p>
        </div>
    </body>
</html>
