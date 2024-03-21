<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   
    <title>QR Code Generation</title>
    <style>
        body {
            text-align: center;
            margin-top: 20px;
        }

        .down {
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .form-inline {
            justify-content: center;
        }
        .form-inline .input-group input {
            display: inline;
            margin-right:10px ;
        }
        .input-group {
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #4287f5;
            color: #fff;
            border-color: #4287f5;
        }

        a {
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        ul {
            align-items: center;
        }

        img {
            max-width: 100%;
            height: auto;
        }
        @media screen and (max-width: 576px) {
        /* Adjust input width */
        .form-inline .input-group input {
            display: inline;
            margin-right:10px ;
        }
    
        /* Adjust button width and font size */
        .form-inline button {
            width: auto;
            font-size: 12px;
        }
    }
    </style>
</head>

<body>
    @include('home.navbar')
    <div class="container">
        <div class="down">
            <h1>Download Barcode & Qrcode</h1>

            <form action="{{ route('pcregisters.searchBarcode') }}" method="post" class="form-inline">
    @csrf
    <div class="input-group">
        <input id="user_id" type="text" class="form-control form-control-sm @error('user_id') is-invalid @enderror"
            name="user_id" value="{{ old('user_id') }}" required autofocus placeholder="Search by user id">
        @error('user_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary btn-sm">
            search
            </button>
        </div>
    </div>
</form>
<br><br>

          
@foreach($pcregisters as $pcregister)
        <a href="{{ route('downloadQRCode', ['username' => $pcregister->username]) }}" download>
            {{ $pcregister->username }}:
            <img src="{{ asset('qrcode/'.$pcregister->username.'.png') }}" alt="QR Code">
        </a>
        <a href="{{ route('downloadBarCode', ['username' => $pcregister->username]) }}" download>
            <img src="{{ asset('barcode/'.$pcregister->username.'.png') }}" alt="Barcode">
        </a>
        <br><br>
        @endforeach
        </div>
    </div>

    <hr>
    @include('home.footer')

    <!-- Bootstrap scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>
