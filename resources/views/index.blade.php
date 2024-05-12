<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config("app.name") }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        /* Style for the header */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        body {
            margin: 0px;
        }

        /* Style for the left menu */
        .left-menu {
            position: fixed;
            left: 0;
            top: 0px;
            /* Adjust the top margin to accommodate the header */
            bottom: 0;
            width: 200px;
            background-color: #f0f0f0;
            padding: 20px;
            box-sizing: border-box;
        }

        .left-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .left-menu li {
            margin-bottom: 10px;
        }

        .left-menu li a {
            text-decoration: none;
            color: #333;
            display: block;
            font-size: 18px;
        }

        .left-menu li a.active {
            color: #121574;
            font-weight: 700;
        }

        /* Style for content sections */
        .content-section {
            /* display: none; */
            padding-left: 200px;
        }

        .option2 h2 {
            height: 20px;
        }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
                'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue',
                sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        #option1{
            padding: 20px;
            padding-left: 220px;
        }
    </style>
</head>

<body>
    <div class="left-menu">
        <ul>
            <?php

            use Illuminate\Support\Facades\Request;

            $curretnPage = Request::path();
            ?>
            <li><a href="{{ route('defaultblade') }}" class="menu-link {{$curretnPage != 'chat' ? 'active' : ''}}">Welcome</a></li>
            <li><a href="{{ route('sceytchat') }}" class="menu-link {{$curretnPage == 'chat' ? 'active' : ''}}">Chat</a></li>
        </ul>
    </div>

    <div class="content-section">
        @yield('content')
    </div>
</body>

</html>