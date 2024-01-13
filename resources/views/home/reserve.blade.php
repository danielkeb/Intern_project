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

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
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
    <div class="container">
        <!-- Header -->
        <div style="height: 150px;"></div>
        <!-- Scanner container and result section -->
        <div id="scanner-container"></div>
        <div id="result">Result Here</div>

    </div>
    <script type="text/javascript">
        // Specify the scanner container and result element
        var scannerContainer = document.getElementById('scanner-container');
        var resultElement = document.getElementById('result');

        // Initialize the barcode scanner
        var scanner = new YourBarcodeScanner(); // Replace with the appropriate barcode scanner library object

        // Register a callback for when a barcode is scanned
        scanner.onScan(function(barcodeData) {
            $.ajax({
                type: "POST",
                cache: false,
                url: "{{ route('barcode.handle') }}",
                data: { "_token": "{{ csrf_token() }}", data: barcodeData },
                success: function(response) {
                    if (response.userExists) {
                        var userDetails = response.userDetails;
                        resultElement.innerHTML = JSON.stringify(userDetails);
                    } else {
                        resultElement.innerHTML = "There is no user with this barcode";
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    resultElement.innerHTML = "Error occurred while processing barcode";
                }
            });
        });

        // Attach the barcode scanner to the scanner container
        scanner.attachTo(scannerContainer);

        // Start scanning
        scanner.start();
    </script>
  @include('home.footer')
</body>
</html>
