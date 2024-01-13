<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>qrscanner</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .containerb {
            height: 600px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            
        }

        .barcode-scanner {
            width: 150px;
            height: 150px;
            border: 3px solid #3498db;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: scan 2s infinite;
        }

        .barcode-scanner i {
            font-size: 36px;
            color: #3498db;
        }

        .message {
            font-size: 18px;
            margin-top: 20px;
        }

        @keyframes scan {
            0% {
                transform: translateY(-10px);
            }
            50% {
                transform: translateY(10px);
            }
            100% {
                transform: translateY(-10px);
            }
        }
    

            .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 50%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .container-fluid header_se{
            justify-self: start;
        }

        .home {
            text-align: center;
            margin-bottom: 30px;
        }

        .content {
            overflow-x: auto;
        }

        @media (max-width: 767px) {
            table {
                font-size: 14px;
            }
        }

    </style>
</head>
<body>
    @include('home.navbar')
    <div class="containerb">
        <div class="barcode-scanner">
            <i class="fas fa-barcode"></i>
        </div>
        <p class="message">Please scan the PC barcode.</p>
    </div>
    @yield('scripts')
    @include('home.footer')
</body>
</html>
