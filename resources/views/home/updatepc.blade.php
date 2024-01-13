<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search user by user ID</title>
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <style>
       
       body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            text-align:center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        #f{
            text-align:center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

     
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 30%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        } */

        .error {
            color: red;
        }
    </style>
</head>

<body>
    @include('home.navbar')

    <div style="height: 150px;"></div>
    <h1>Update PC Register</h1>
    @include('sweetalert::alert')

    <form id="f" method="POST" action="/edit" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $user['id'] }}"><br>

        <label for="user_id">User Id:</label><br><br>
        <input type="text" name="user_id" id="user_id" value="{{ $user->user_id }}" readonly><br><br>
        

        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" value="{{ $user->username }}"><br><br>
        

        <label for="description">Description:</label><br>
                <select class="" id="description" name="description"><br><br>
                    <option value="">Select Description</option>
                    <option value="staff" {{ $user->description === 'staff' ? 'selected' : '' }}>Staff</option>
                    <option value="student" {{ $user->description === 'student' ? 'selected' : '' }}>Student</option>
                    <option value="guest" {{ $user->description === 'guest' ? 'selected' : '' }}>Guest</option>
                    <!-- Add more options as needed -->
                </select>
        

        <br><br><label for="pc_name">PC Name:</label><br>
        <input type="text" name="pc_name" id="pc_name" value="{{ $user['pc_name'] }}"><br><br>

        <label for="serial_number">Serial Number:</label><br>
        <input type="text" name="serial_number" id="serial_number" value="{{ $user['serial_number'] }}"><br><br>

        <label for="photo">Photo:</label><br>
        <input type="file" name="photo" id="photo" value="{{ $user['photo'] }}"><br><br>

        <button style="padding:5px; border-radius:10px;hover:blue;" type="submit">Update</button>
    </form>
    <br>
    <hr>
    @include('home.footer')
</body>

</html>
