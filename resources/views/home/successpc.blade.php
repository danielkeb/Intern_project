<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <title>QR Code Generation</title>
    <style>
        body {
            text-align: center;
        }
        .down{
            text-align:center;
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
            display: flex;
            justify-content: center;
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

        img {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>

<body>
    @include('home.navbar')
    <div style="height: 150px;"></div>
    <div class="down">
        <h1>Download Barcode & Qrcode</h1>

        <form action="{{ route('pcregisters.searchBarcode') }}" method="post" class="form-inline">
            @csrf
            <div class="input-group">
                <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror"
                    name="user_id" value="{{ old('user_id') }}" required autofocus placeholder="Search by user id">
                @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                search
            </button>
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

    <div style="height: 200px;"></div>
    <br>
    <hr>
    @include('home.footer')
</body>

</html>
