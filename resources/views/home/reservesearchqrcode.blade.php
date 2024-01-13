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
        <div style="height:150px;"></div>
        <!-- this function of JavaScript plays Camera -->
        <div class="container-fluid header_se">
            <div class="col-md-8">
                <div class="row">
                    <div class="col">
                        <div id="reader"></div>
                    </div>
                    <div class="col" style="padding:30px;">
                        <h4>SCAN RESULT</h4>
                        <div id="result">user appear here</div>
                        <div id="userDetails"></div> <!-- New element to display user details -->
                    </div>
                </div>
                <script type="text/javascript">
                    // after success to play camera, AJAX request is made to send data to the controller
                    function onScanSuccess(data) {
                        $.ajax({
                            type: "POST",
                            cache: false,
                            url: "{{action('App\Http\Controllers\pcregisterController@qr_result')}}",
                            data: {"_token": "{{ csrf_token() }}", data: data},
                            success: function (response) {
                                if (response.userExists) {
                                    // display user details
                                    var userDetails = response.userDetails;
                                   // $(location).attr('href', '{{url('/qrcode_result')}}');
                                    document.getElementById('userDetails').innerHTML = '<table>' +
                                        '<thead>' +
                                        '<tr>' +
                                        '<th>User ID</th>' +
                                        '<th>Username</th>' +
                                        '<th>Description</th>' +
                                        '<th>PC Name</th>' +
                                        '<th>Serial Number</th>' +
                                        '<th>Photo</th>' +
                                        '</tr>' +
                                        '</thead>' +
                                        '<tbody>' +
                                        '<tr>' +
                                        '<td>' + userDetails.userid + '</td>' +
                                        '<td>' + userDetails.name + '</td>' +
                                        '<td>' + userDetails.description + '</td>' +
                                        '<td>' + userDetails.pc_name + '</td>' +
                                        '<td>' + userDetails.serial + '</td>' +
                                        '<td>' +
                                        '<td>' +
                                        (userDetails.photo ? '<img src="{{ asset('/') }}' + userDetails.photo + '" alt="Photo" style="width: 150px; height: 120px;">' : 'No photo available') +
                                        '</td>' +

                                        '</td>' +
                                        '</tr>' +
                                        '</tbody>' +
                                        '</table>';

                                      
                                } else {
                                    confirm('There is no user with this QR code');
                                }
                            }
                        })
                    }

                    var html5QrcodeScanner = new Html5QrcodeScanner(
                        "reader", {fps: 10, qrbox: 250});
                    html5QrcodeScanner.render(onScanSuccess);
                </script>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <style>
        .result{
            background-color: green;
            color:#fff;
            padding:20px;
        }
        .row{
            display:flex;
        }
        #reader {
            background: black;
            width:500px;
        }
        button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 6px;
        }
        a#reader__dashboard_section_swaplink {
            background-color: blue; /* Green */
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 6px;
        }
        span a{
            display:none
        }

        #reader__camera_selection{
            background: blueviolet;
            color: aliceblue;
        }
        #reader__dashboard_section_csr span{
            color:red
        }
    </style>
    @yield('scripts')
    <div style="height:250px;"></div>
    @include('home.footer')
</body>
</html>
