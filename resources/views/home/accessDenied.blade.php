<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;

        }

        .container {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            padding: 40px;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .emoji {
            font-size: 60px;
            margin-bottom: 30px;
        }
    </style>
    <title>Access Denied</title>
</head>
<body>
    <div class="container">
        <h1>Access Denied</h1>
        <p>We're sorry, but you don't have permission to access this page.</p>
        <div class="emoji">🚫</div>
        <div> <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">LOGOUT</button>
        </form></div>
    </div>
</body>
</html>
