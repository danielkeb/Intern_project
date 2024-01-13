<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('home.header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
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
    <div style="height:200px;"></div>
    <div class="container">
    <section class="home">
    <h1 style="color: #ff0000; font-size: 32px; text-align: center; text-transform: uppercase; letter-spacing: 2px;">User Not Found!!</h1>
</section>

    </div>

    
    <br>
    <br>
    <br>
    <br>
    <br>
    @include('home.footer')
</body>

</html>
