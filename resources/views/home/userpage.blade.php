<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>qrscanner</title>
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        .container {
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .result {
            background-color: green;
            color: #fff;
            padding: 20px;
        }

        #reader {
            background: black;
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        @media (max-width: 576px) {
            .container-fluid.header_se .row {
                flex-direction: column;
            }

            .container-fluid.header_se .col-12,
            .container-fluid.header_se .col-md-6 {
                padding: 10px;
            }
        }
    </style>
</head>

@include('home.header')
</head>
<body>
<!-- header start -->
@include('home.navbar')
  <!-- header end -->

  <section class="home">
    <h1>ASTU</h1>
  </section>

  <section class="content">
   </section>

   <div class="container">
    <!-- this function of java Script play Camera -->
    <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
    <!-- Header --> 
    <div style="height:150px;"></div>
    <div class="container-fluid header_se">
        <div class="row">
            <div class="col-12 col-md-6">
                <div id="reader"></div>
            </div>
            <div class="col-12 col-md-6" style="padding:30px;">
                
                <div id="result"><h2>pc owner information appear here!</h2></div>
            </div>
        </div>
        <script type="text/javascript">
            // after success to play camera Webcam Ajax paly to send data to Controller
            function onScanSuccess(data) {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "{{action('App\Http\Controllers\pcregisterController@qr_result')}}",
                    data: {"_token": "{{ csrf_token() }}",data:data},
                    success: function(data) {
                        // after success to get Answer from controller if User Registered login user by scanner
                        // and page change to Home blade
                        if (data==1) {
                            document.getElementById('result').innerHTML = '<span class="result">'+'Logged'+'</span>';
                            $(location).attr('href', '{{url('/home')}}');
                        }
                        else{
                            return confirm('There is no user with this qr code'); 
                        }
                    }
                })
            }
            var html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess);
        </script>
    </div>
</div>
<hr/>
<div class="container">
   
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<br>
    <hr>
@include('home.footer')
</body>
</html>