<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ASTU</title>
    <link rel="icon" href="images/ASTU.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        .logo {
            animation: moveUpDown 2s infinite;
            width: 200px;
            height: auto;
        }
        .login-register {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .login-register a {
            margin: 0 10px;
            color: #7A3E3E;
            text-decoration: none;
            font-weight: 600;
        }
        body {
            background-color: #F8E8EE;
            padding: 20px;
        }

        @keyframes moveUpDown {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="antialiased">
    <div style="text-align: center;">
        <h1 style="color:#47A992">Welcome to Our Website!</h1>
        <h2 style="color:#47A992">ASTU</h2>
        <img src="images/ASTU.png" alt="ASTU Logo" class="logo">
        <br>
        <div class="login-register">
            <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/redirect') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <br>
                <a href="{{ url('/pcregister/searchbyqr') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="padding: 10%;">SCAN PC</a>
            </div>
        </div>
    </div>
</body>
</html>
