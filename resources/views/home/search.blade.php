<!-- <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search user by user ID</title>
    <link rel="stylesheet" href="{{ asset('home/css/security.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>

<body style="text-align:center;">
    @include('home.navbar')

    @include('sweetalert::alert')
<div style="height:150px;"></div>
    <form action="{{ route('pcregisters.searchUser') }}" method="post">
        @csrf
        <input type="text" name="user_id" placeholder="Search...">

        <button type="submit">Search</button>
    </form>

    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
</body> -->
