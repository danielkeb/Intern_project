<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if(session('userDetails'))
    @php
        $userDetails = session('userDetails');
    @endphp
    <p>User ID: {{ $userDetails['userid'] }}</p>
    <p>Name: {{ $userDetails['name'] }}</p>
    <p>Serial: {{ $userDetails['serial'] }}</p>
@endif

</body>
</html>