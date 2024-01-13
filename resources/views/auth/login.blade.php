<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous">

    <style>
        /* Custom Login Page Styles */
               body {
            font-family: Arial, sans-serif;
            background: url('images/barcodescanner.jpg') no-repeat center center fixed;
            background-size: cover;
        }


        .input-group {
            position: relative;
        }

        .login-container {
            max-width: 500px;
            height: 600px;
            margin: 0 auto;
            margin-top:50px;
            align-self:center;
            align-items:center;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .login-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        img{
            width:200px;
            height: 200px;
            border-radius:100px;
        }
        .form-control {
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 20px;
            margin-bottom: 20px;
            width: 100%;
            position: relative;
        }
        

        .form-control i {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .forgot-password-link {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
            display: block;
            text-align: right;
        }

        .forgot-password-link a {
            color: #007bff; /* Blue color for the link */
            text-decoration: none;
        }

        .forgot-password-link a:hover {
            text-decoration: underline; /* Underline on hover */
        }

        .submit-button {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
        }

        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    

    <div class="text-center">
        <div class="login-container">
        <a href="#" class="navbar-brand">
        <img src="{{ asset('images/getpcms.png') }}" alt="Logo" class="logo-img">
    </a>
            <!-- <h1 style="text-align:center"><span style="color:green;">DBU-GET-</span><span style="color:yellow">PC</span><span style="color:red;">MS</span></h1> -->
            <div class="login-title">Login</div>

            <form method="POST" action="{{ route('login') }}">
    @csrf
    @include('sweetalert::alert')
    <div class="mb-3 input-group">
        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3 input-group">
        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="forgot-password-link">
        <a href="{{ route('password.request') }}">Forgot Password?</a>
    </div>

    <button class="submit-button" type="submit">
        {{ __('Log in') }}
    </button>
</form>

        </div>
    </div>
</body>
</html>
